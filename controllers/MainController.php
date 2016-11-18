<?php

namespace app\controllers;

use app\models\Info;

class MainController extends AppController
{
    
    public function actionIndex()
    {
        $this->view->title='ТООИН | Главная';
        $info=Info::find()->asArray()->all();
        
        $above=$info[0][text_above];
        $text=$info[0][text];
        //debug($text);
        return $this->render('index',compact('text'));
    }

}
