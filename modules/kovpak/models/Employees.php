<?php

namespace app\modules\kovpak\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property integer $id
 * @property string $name
 * @property string $text_desc
 * @property string $date
 * @property string $watch
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'text_desc', 'date', 'watch'], 'required'],
            [['text_desc', 'watch'], 'string'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
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
