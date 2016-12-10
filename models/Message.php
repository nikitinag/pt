<?php

namespace app\models;

use Yii;

class Message extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'message';
    }

    public function rules()
    {
        return [
            [['name', 'email', 'text', 'date'], 'required'],
            ['text', 'string'],
            ['date', 'safe'],
            [['name', 'email'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'text' => 'Text',
            'date' => 'Date',
        ];
    }
}
