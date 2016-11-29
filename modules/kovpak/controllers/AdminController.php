<?php

namespace app\modules\kovpak\controllers;

use yii\web\Controller;
use Yii;
use app\models\UpdateForm;
use app\models\ListUrl;
use yii\base\ErrorException;

/**
 * Default controller for the `kovpak` module
 */
class AdminController extends AppAdminController
{
       
    public function actionIndex(){
        $model=new UpdateForm;
        if ($model->load(Yii::$app->request->post())){
            if($model->validate()){
                $listUrls=ListUrl::find()->all();
                foreach($listUrls as $listUrl){
                    try{
                        $result=parseHTML($model->coefficient,$listUrl->url_remote,$listUrl->id);
                    }catch(ErrorException $e){
                        $result=false;
                    }
                }
                if($result){
                    Yii::$app->session->setFlash('success','Обновление прошло успешно');
                    return $this->refresh();
                }else{
                    Yii::$app->session->setFlash('error','Ошибка обновления');
                }
            }else{
                Yii::$app->session->setFlash('error','Неверно введены данные');
                }
        }
        return $this->render('index',compact('model'));
    }
    
    public function actionText(){
        return $this->render('text');
    }
}
