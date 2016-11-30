<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "system".
 *
 * @property integer $id
 * @property string $switch
 * @property string $date_update
 * @property string $backup
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
            [['date_update', 'backup'], 'safe'],
        ];
    }
}
