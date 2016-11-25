<?php

namespace app\controllers;

class AppController extends \yii\web\Controller
{
   public function beforeAction(){
    $this->view->title='ТООИН';
    return true;
   }
}