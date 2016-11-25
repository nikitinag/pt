<?php

namespace app\controllers;

use app\models\LoginForm;
use yii\helpers\Url;
use Yii;

class IntoController extends \yii\web\Controller
{
    public function beforeAction()
    {
        $this->view->title='ТООИН | Вход в админка';
        return true;
    }
    
    /*public function actionIndex()
    {
        return $this->render('index');
    }*/
    
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}