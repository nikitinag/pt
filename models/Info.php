<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "info".
 *
 * @property integer $id
 * @property string $text_above
 * @property string $text
 * @property string $keywords
 * @property string $description
 */
class Info extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text_above', 'text'], 'required'],
            [['text_above', 'text', 'keywords', 'description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
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
