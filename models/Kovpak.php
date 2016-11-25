<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kovpak".
 *
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $login_key
 */
class Kovpak extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kovpak';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
            [['login', 'password', 'login_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'login_key' => 'Login Key',
        ];
    }
}
