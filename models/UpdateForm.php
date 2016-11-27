<?php

namespace app\models;

use Yii;
use yii\base\Model;

class UpdateForm extends Model
{
    public $coefficient;

    public function rules()
    {
        return [
            ['coefficient', 'required'],
            ['coefficient', 'number'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'coefficient' => 'Коэффициент',
        ];
    }
    
}
