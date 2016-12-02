<?php

namespace app\controllers;

use app\models\Info;

class AppController extends \yii\web\Controller
{
      
   public function beforeAction(){
    $info=Info::find()->one();
    $this->view->title='ТООИН';
    $this->view->registerMetaTag([
        'name' => 'keywords',
        'content' => "$info->keywords"
    ]);
    $this->view->registerMetaTag([
        'name' => 'description',
        'content' => "$info->description"
    ]);
    return true;
   }
}