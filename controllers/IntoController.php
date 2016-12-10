<?php

namespace app\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use Yii;

class IntoController extends \yii\web\Controller
{
    public $layout = 'into';
        
    public function beforeAction()
    {
        $this->view->title = 'ТООИН | Вход в админку';
        return true;
    }
    
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->cache->delete('menu');
            return $this->goBack();
        }
        
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}