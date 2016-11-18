<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "system".
 *
 * @property integer $id
 * @property string $switch
 * @property string $date_update
 */
class System extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['switch'], 'required'],
            [['switch'], 'string'],
            [['date_update'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'switch' => 'Switch',
            'date_update' => 'Date Update',
        ];
    }
}
