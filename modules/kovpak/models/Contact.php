<?php

namespace app\modules\kovpak\models;

use Yii;

class Contact extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'contact';
    }

    public function rules()
    {
        return [
            [['type', 'contact'], 'required'],
            [['contact'], 'string'],
            [['type'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => '',
            'type' => 'Тип',
            'contact' => 'Контакт',
        ];
    }
}
