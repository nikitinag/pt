<?php

namespace app\models;

use Yii;

class Info extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'info';
    }

    public function rules()
    {
        return [
            [['text_above', 'text'], 'required'],
            [['text_above', 'text', 'keywords', 'description'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'text_above' => 'Текст вверху страницы',
            'text' => 'Контент',
            'keywords' => 'Ключевые слова',
            'description' => 'Описание для поисковиков',
        ];
    }
}
