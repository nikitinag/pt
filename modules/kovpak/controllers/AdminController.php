<?php

namespace app\modules\kovpak\controllers;

use yii\web\Controller;
use Yii;
use app\models\UpdateForm;

/**
 * Default controller for the `kovpak` module
 */
class AdminController extends AppAdminController
{
       
    public function actionIndex(){
        
        //require_once('../vendor/simple-html-dom/simple-html-dom/simple_html_dom.php');
        $arrayRemoteUrl=Yii::$app->params['remoteUrl'];
        $remoteUrl=$arrayRemoteUrl['трубы'];
        //$data=file_get_html($remoteUrl);
        //debug($data);
        $model=new UpdateForm;
        if ($model->load(Yii::$app->request->post())){
            if($model->validate()){
                
                Yii::$app->session->setFlash('success','Обновление прошло успешно');
                return $this->refresh();
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
