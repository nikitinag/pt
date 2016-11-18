<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $item1
 * @property string $item2
 * @property string $type
 * @property double $price
 */
class Data extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'item1', 'item2', 'type', 'price'], 'required'],
            [['category_id'], 'integer'],
            [['price'], 'number'],
            [['item1', 'item2', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
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
