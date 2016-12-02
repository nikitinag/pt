<?php

namespace app\modules\kovpak\models;

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
            [['text_above', 'text', 'keywords', 'description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
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
