<?php

namespace app\models;

use Yii;

class Category extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    public function rules()
    {
        return [
            [['list_id', 'name', 'item1', 'item2', 'type', 'price'], 'required'],
            [['list_id'], 'integer'],
            [['name', 'item1', 'item2', 'type', 'price'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'list_id' => 'List ID',
            'name' => 'Name',
            'item1' => 'Item1',
            'item2' => 'Item2',
            'type' => 'Type',
            'price' => 'Price',
        ];
    }
}
