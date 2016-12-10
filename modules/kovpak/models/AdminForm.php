<?php

namespace app\modules\kovpak\models;

use Yii;
use yii\base\Model;
use app\models\User;
use yii\base\Security;

class AdminForm extends Model
{
    public $username;
    public $password;
    public $newusername;
    public $newpassword1;
    public $newpassword2;
    public $rememberMe = false;

    private $_user = false;

    public function rules()
    {
        return [
            ['password', 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
            [['newpassword2', 'newpassword1'], 'validateNewPassword'],
            [['newusername', 'newpassword1', 'newpassword2', 'password'], 'string', 'max' => 255]
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'newusername' => 'Новый логин',
            'password' => 'Старый пароль',
            'newpassword1' => 'Введите новый пароль',
            'newpassword2' => 'Повторите новый пароль',
            'rememberMe' => 'Запомнить',
        ];
    }
    
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $this->username=Yii::$app->user->identity['login'];
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Логин или пароль введены неверно.');
            }
        }
    }
    
    public function validateNewPassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $this->username=Yii::$app->user->identity['login'];
            $user = $this->getUser();
            
            if(!empty($this->newpassword1)||!empty($this->newpassword2)){
                if($this->newpassword1!==$this->newpassword2){
                    $this->addError($attribute, 'Пароли не совпадают.');
                }
            }
        }
    }

    public function update()
    {
        if ($this->validate()) {
            $user = $this->getUser();
            if(!empty($this->newusername)) $this->username = $this->newusername;
            if(!empty($this->newpassword1)) $this->password = $this->newpassword1;
            $this->password = $this->generatePassword($this->password);       
            if($user->UpdateUser($this->username, $this->password)){
                return Yii::$app->user->login($this->getUser());
            }
        }
        return false;
    }
    
    public function generatePassword($password)
    {
        return Yii::$app->security->generatePasswordHash($password);
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
