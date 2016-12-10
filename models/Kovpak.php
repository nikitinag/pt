<?php

namespace app\models;

use Yii;

class Kovpak extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'kovpak';
    }

    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
            [['login', 'password', 'login_key'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'login_key' => 'Login Key',
        ];
    }
}
