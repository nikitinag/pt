<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $list_id
 * @property string $name
 * @property string $item1
 * @property string $item2
 * @property string $type
 * @property string $price
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['list_id', 'name', 'item1', 'item2', 'type', 'price'], 'required'],
            [['list_id'], 'integer'],
            [['name', 'item1', 'item2', 'type', 'price'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
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
