<?php

namespace app\modules\kovpak\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $text
 * @property string $date
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'text', 'date'], 'required'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['name', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '',
            'name' => 'Имя',
            'email' => 'Email',
            'text' => 'Текст',
            'date' => 'Дата',
        ];
    }
}
