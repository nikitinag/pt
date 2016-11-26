<?php

namespace app\modules\kovpak\controllers;

use yii\web\Controller;

/**
 * Default controller for the `kovpak` module
 */
class AdminController extends AppAdminController
{
       
    public function actionIndex(){
        return $this->render('index');
    }
    
    public function actionText(){
        return $this->render('text');
    }
}
