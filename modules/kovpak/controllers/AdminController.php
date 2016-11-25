<?php

namespace app\modules\kovpak\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

/**
 * Default controller for the `kovpak` module
 */
class AdminController extends Controller
{
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
