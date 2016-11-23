<?php
namespace app\controllers;

use Yii;
use app\models\Info;
use app\models\Contact;
use app\models\Employees;
use app\models\FeedbackForm;

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
    
    public function actionFeedback()
    {
       $this->view->title='ТООИН | Обратная связь';
       $feedback=new FeedbackForm();
       if ($feedback->load(Yii::$app->request->post())){
            if($feedback->validate()){
                $trowadmin=Yii::$app->mailer->compose()
                    ->setFrom([$feedback->email => $feedback->name])
                    ->setTo('tooin@tooin.by')
                    ->setSubject('Theme message')
                    ->setTextBody($feedback->text.'. phone '.$feedback->phone)
                    ->send();
                $trowuser=Yii::$app->mailer->compose()
                    ->setFrom(['tooin@tooin.by' => 'TOOIN'])
                    ->setTo($feedback->email)
                    ->setSubject('Theme message')
                    ->setTextBody($feedback->text)
                    ->send();
                    
                $trowdb=1;
                
                
                if($trowadmin&&$trowuser&&$trowdb){
                    Yii::$app->session->setFlash('success','Сообщение отправлено');
                    //return $this->refresh();
                }else{
                    Yii::$app->session->setFlash('error','Произошла ошибка обработки данных');
                }
            
            }else{
                Yii::$app->session->setFlash('error','Неверно введены данные');
            }
            
       }
       return $this->render('feedback',compact('feedback')); 
    }

}
