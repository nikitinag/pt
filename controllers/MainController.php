<?php
namespace app\controllers;

use Yii;
use app\models\Info;
use app\models\Contact;
use app\models\Employees;

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
       $this->view->title='ТООИН | Вакансии';
       $head='На данный момент предприятию не требуются сотрудники.';
       $list=null;
       if(Yii::$app->request->get()){
        $emp=Yii::$app->request->get();
        $emp=(int)$emp['id'];        
        $employ=Employees::find()->asArray()->where(['id'=>$emp,'watch'=>'1'])->limit(1)->one();
        if(!empty($employ)) {return $this->render('employ',compact('employ'));}
       }
       $employees=Employees::find()->asArray()->where('watch="1"')->all();
       if(!empty($employees)) {
          $head=null;
          $list=$employees; 
       }
       return $this->render('employees',compact('head','list'));
    }
    
    public function actionCallback()
    {
       return $this->render('callback',compact('text')); 
    }

}
