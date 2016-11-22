<?php
namespace app\Controllers;

use app\models\System;
use yii\helpers\Url;
use Yii;

class OffController extends \yii\web\Controller
{
    public static function getswitchAction(){
        $switch=System::find('switch')->asArray()->one();
        if($switch['switch']=='0') {return Yii::$app->response->redirect('off.html');}
        return true;
    }
}	
?>