<?php
namespace app\controllers;

use Yii;
use yii\helpers\Html;
use app\models\Info;
use app\models\Contact;
use app\models\Employees;
use app\models\FeedbackForm;
use app\models\Message;

class MainController extends AppController
{
    
    public function actionIndex()
    {
        $info=Info::find()->asArray()->all();
        $text=$info[0][text];
        return $this->render('index',compact('text'));
    }
    
    public function actionContact()
    {
       $this->view->title.=' | Контакты';
       $contacts=Contact::find()->asArray()->all();
       $text=arrayContacts($contacts);
       return $this->render('contact',compact('text')); 
    }
    
    public function actionEmployees()
    {
       $this->view->title.=' | Вакансии';
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
       $this->view->title.=' | Обратная связь';
       $feedback=new FeedbackForm();
       if ($feedback->load(Yii::$app->request->post())){
            if($feedback->validate()){
                
                $name=Html::encode($feedback->name);
                $textmessage=Html::encode($feedback->text);
                $email=Yii::$app->params['adminEmail'];
                //в БД   
                $message=new Message();
                $message->name=$name;
                $message->email=$feedback->email;
                $message->text=$textmessage;
                $message->date=date("Y-m-d H:i:s");
                $trowdb=$message->save(false);
                //на почту администратору
                $trowadmin=Yii::$app->mailer->compose()
                    ->setFrom([$feedback->email => $name])
                    ->setTo($email)
                    ->setSubject('Theme message')
                    ->setTextBody($textmessage)
                    ->send();
                //на почту клиенту  
                $trowuser=Yii::$app->mailer->compose()
                    ->setFrom([$email => 'TOOIN'])
                    ->setTo($feedback->email)
                    ->setSubject('Вы отправили сообщение в компанию ТООИН с текстом')
                    ->setHtmlBody($textmessage)
                    ->send();
                
                if($trowadmin&&$trowuser&&$trowdb){
                    Yii::$app->session->setFlash('success','Сообщение отправлено');
                    return $this->refresh();
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
