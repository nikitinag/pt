<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'kovpak';
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        
    }

    public static function findByUsername($username)
    {
        return static::findOne(['login' => $username]);
    }
    
    public function UpdateUser($username,$password)
    {
        $this->login = $username;
        $this->password = $password;
        return $this->save();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->login_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->login_key === $authKey;
    }
    
    public function generateKey()
    {
        return $this->login_key = Yii::$app->getSecurity()->generateRandomString();
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}
