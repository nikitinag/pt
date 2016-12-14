<?php

namespace app\modules\kovpak\models;

use Yii;

class Pages extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'pages';
    }

    public function rules()
    {
        return [
            [['name', 'text', 'watch'], 'required'],
            [['name', 'text', 'watch'], 'string'],
            [['name'], 'string', 'max' => 25],
        ];
    }

    public function attributeLabels()
    {
        return [
            //'id' => '№',
            'name' => 'Название страницы',
            'text' => 'Текст',
            'watch' => 'Статус',
        ];
    }
}
