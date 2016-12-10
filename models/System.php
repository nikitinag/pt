<?php

namespace app\models;

use Yii;

class System extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'system';
    }

    public function rules()
    {
        return [
            [['switch'], 'required'],
            [['switch'], 'string'],
            [['date_update', 'backup'], 'safe'],
        ];
    }
}
