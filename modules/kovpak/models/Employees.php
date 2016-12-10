<?php

namespace app\modules\kovpak\models;

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
            [['name', 'text_desc', 'date', 'watch'], 'required'],
            [['text_desc', 'watch'], 'string'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => '№',
            'name' => 'Должность',
            'text_desc' => 'Описание',
            'date' => 'Дата выставления',
            'watch' => 'Статус',
        ];
    }
}
