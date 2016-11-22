<?php
namespace app\web;

use app\models\System;
use yii\helpers\Url;
use Yii;

class Switchoff
{
    public static function switchAction(){
        $switch=System::find('switch')->asArray()->one();
        if($switch['switch']=='0') {return Yii::$app->response->redirect('off.html');}
        return true;
    }
}	
?>