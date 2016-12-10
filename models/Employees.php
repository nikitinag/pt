<?php

namespace app\models;

use Yii;

class Employees extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'employees';
    }

    public function rules()
    {
        return [
            [['name', 'text_desc', 'date', 'hide'], 'required'],
            [['text_desc', 'hide'], 'string'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'text_desc' => 'Text Desc',
            'date' => 'Date',
            'hide' => 'Hide',
        ];
    }
}
