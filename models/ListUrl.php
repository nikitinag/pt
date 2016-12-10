<?php

namespace app\models;

use Yii;

class ListUrl extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'list_url';
    }

    public function rules()
    {
        return [
            [['name', 'url_remote'], 'required'],
            [['name', 'url_remote'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'url_remote' => 'Url Remote',
        ];
    }
}
