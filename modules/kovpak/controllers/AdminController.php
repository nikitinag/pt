<?php

namespace app\modules\kovpak\controllers;

use yii\web\Controller;
use Yii;
use app\models\UpdateForm;
use app\models\ListUrl;
use app\models\System;
use app\models\Info;
use app\modules\kovpak\models\AdminForm;

class AdminController extends AppAdminController
{
    public function actionIndex()
    {
        $model = new UpdateForm;
        $system = System::find()->where(['id' => 1])->one();
        $date = $system->date_update;
        $backup = $system->backup;
        if ($model->load(Yii::$app->request->post())){
            if($model->validate()){
                $listUrls = ListUrl::find()->all();
                if(empty($listUrls)){
                    Yii::$app->session->setFlash('error', 'Ошибка базы данных');
                    return Yii::$app->response->redirect(['/kovpak']);
                }
                if(UpDownDeleteData('delete')){
                    foreach($listUrls as $listUrl){
                        $system->backup = '1';
                        $system->save();
                        $result = parseHTML($model->coefficient, $listUrl->url_remote, $listUrl->id);
                    }
                }
                if($result){
                    $coefficient = ' с коэффициентом ' . $model->coefficient;
                    Yii::$app->session->setFlash('success', 'Обновление прошло успешно' . $coefficient);
                    return $this->refresh();
                }else{
                    Yii::$app->session->setFlash('error', 'Ошибка обновления');
                    return Yii::$app->response->redirect(['/kovpak']);
                }
            }else{
                Yii::$app->session->setFlash('error', 'Неверно введены данные');
                }
        }
        if($get=Yii::$app->request->get()){
            $resultBackup = false;
            if($get['backup'] == 'up'){
                if(UpDownDeleteData('up')){
                    $resultBackup = 'Новая база данных утверждена';
                    $date = date("Y-m-d");
                    $system->date_update = $date;
                }
            }
            if($get['backup'] == 'down'){
                if(UpDownDeleteData('down')){
                    $resultBackup = 'База данных восстановлена';
                }
            }
            if($resultBackup){
                $backup = '0';
                $system->backup = '0';
                $system->save();
                Yii::$app->session->setFlash('success', $resultBackup);
                return Yii::$app->response->redirect(['/kovpak']);
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка операции');
                return Yii::$app->response->redirect(['/kovpak']);
            }
        }
        return $this->render('index', compact('model','date','backup'));
    }
    
    public function actionText()
    {
        $model = Info::find()->one();

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                Yii::$app->session->setFlash('success', 'Обновление прошло успешно');
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка обновления');
            }
        }    
        return $this->render('text', compact('model'));
    }
    
    public function actionLogin()
    {
        $model = new AdminForm();
        if($model->load(Yii::$app->request->post())) {
            if($model->update()){
                Yii::$app->session->setFlash('success', 'Обновление прошло успешно');
                return $this->refresh();
            }else{
            Yii::$app->session->setFlash('error', 'Ошибка операции');
            }
        }       
        return $this->render('login', compact('model'));
    }
}
