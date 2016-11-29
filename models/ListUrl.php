<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "list_url".
 *
 * @property integer $id
 * @property string $name
 * @property string $url_remote
 */
class ListUrl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'list_url';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url_remote'], 'required'],
            [['name', 'url_remote'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'url_remote' => 'Url Remote',
        ];
    }
}
