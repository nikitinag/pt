<?php

namespace app\modules\kovpak\controllers;

use yii\web\Controller;
use Yii;
use app\models\UpdateForm;
use app\models\ListUrl;
use app\models\System;
use yii\base\ErrorException;

/**
 * Default controller for the `kovpak` module
 */
class AdminController extends AppAdminController
{   
    public function actionIndex(){
        $model=new UpdateForm;
        $system=System::find()->where(['id' => 1])->one();
        $date=$system->date_update;
        $backup=$system->backup;
        if ($model->load(Yii::$app->request->post())){
            if($model->validate()){
                $listUrls=ListUrl::find()->all();
                if(UpDownDeleteData('delete')){
                    foreach($listUrls as $listUrl){
                        try{
                            $result=parseHTML($model->coefficient,$listUrl->url_remote,$listUrl->id);
                        }catch(ErrorException $e){
                            $result=false;
                        }
                    }
                }
                if($result){
                    $system->backup='1';
                    $system->save();
                    $coefficient=' с коэффициентом '.$model->coefficient;
                    Yii::$app->session->setFlash('success','Обновление прошло успешно'.$coefficient);
                    return $this->refresh();
                }else{
                    Yii::$app->session->setFlash('error','Ошибка обновления');
                }
            }else{
                Yii::$app->session->setFlash('error','Неверно введены данные');
                }
        }
        if($get=Yii::$app->request->get()){
            $resultBackup=false;
            if($get['backup']=='up'){
                if(UpDownDeleteData('up')){
                    $resultBackup='Новая база данных утверждена';
                    $date=date("Y-m-d");
                    $system->date_update=$date;
                }
            }
            if($get['backup']=='down'){
                if(UpDownDeleteData('down')){
                    $resultBackup='База данных восстановлена';
                }
            }
            if($resultBackup){
                $backup='0';
                $system->backup='0';
                $system->save();
                Yii::$app->session->setFlash('success',$resultBackup);
                return Yii::$app->response->redirect(['/kovpak']);
            }else{
                Yii::$app->session->setFlash('error','Ошибка операции');
                return Yii::$app->response->redirect(['/kovpak']);
            }
        }
        return $this->render('index',compact('model','date','backup'));
    }
    
    public function actionText(){
        return $this->render('text');
    }
    
    public function actionLogin(){
        return $this->render('login');
    }
}
