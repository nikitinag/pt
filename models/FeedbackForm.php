<?php
namespace app\models;

use Yii;
use yii\base\Model;

class FeedbackForm extends Model
{
    public $name;
    public $email;
    public $text;
    public $verifyCode;

    public function rules()
    {
        return [
            [['name', 'email', 'text'], 'required','message' => 'необходимо заполнить'],
            ['email', 'email','message' => 'неверный адрес электронной почты'],
            ['name', 'string', 'max' => 15, 'tooLong' => 'максимальная длинна 15 символов'],
            ['verifyCode', 'captcha'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
           'name'  => 'Ваше имя *',
           'email' => 'Email *',
           'text'  => 'Текст сообщения *',
           'verifyCode' => 'Проверочный код',
        ];
    }
}