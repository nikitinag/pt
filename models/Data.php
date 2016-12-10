<?php

namespace app\models;

use Yii;

class Data extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'data';
    }

    public function rules()
    {
        return [
            [['category_id', 'item1', 'item2', 'type', 'price'], 'required'],
            [['category_id'], 'integer'],
            [['price'], 'number'],
            [['item1', 'item2', 'type'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'item1' => 'Item1',
            'item2' => 'Item2',
            'type' => 'Type',
            'price' => 'Price',
        ];
    }
}
