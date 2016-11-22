<?php

namespace app\controllers;

use app\models\Contact;
use app\models\Info;

class MainController extends AppController
{
    
    public function actionIndex()
    {
        $this->view->title='ТООИН | Главная';
        $info=Info::find()->asArray()->all();
        
        $above=$info[0][text_above];
        $text=$info[0][text];
        return $this->render('index',compact('text'));
    }
    
    public function actionContact()
    {
       $this->view->title='ТООИН | Контакты';
       $contacts=Contact::find()->asArray()->all();
       $text=arrayContacts($contacts);
       return $this->render('contact',compact('text')); 
    }
    
    public function actionEmployees()
    {
       return $this->render('employees',compact('text')); 
    }
    
    public function actionCallback()
    {
       return $this->render('callback',compact('text')); 
    }

}
