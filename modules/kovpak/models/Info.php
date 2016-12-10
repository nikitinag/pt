<?php

namespace app\modules\kovpak\models;

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
            [['text_above', 'text', 'keywords', 'description'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text_above' => 'Текст вверху страницы',
            'text' => 'Основной текст',
            'keywords' => 'Ключевые слова',
            'description' => 'Краткое описание',
        ];
    }
}
