<?php

namespace app\controllers;

class MainController extends \yii\web\Controller
{
    
    public function actionIndex()
    {
        $this->view->title='ТООИН | Главная';
        return $this->render('index');
    }

}
