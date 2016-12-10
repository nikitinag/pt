<?php

namespace app\modules\kovpak;

use yii\filters\AccessControl;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\kovpak\controllers';

    public function init()
    {
        parent::init();
    }
    
    public function behaviors(){
      return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];  
    }
}
