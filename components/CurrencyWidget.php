<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use Yii;

class CurrencyWidget extends Widget{
   
    protected $currency;
    
    public function run(){
        
        $cache=Yii::$app->cache->get('currency');
        if($cache) return $cache;
        
        try{
            $data=file_get_contents(Yii::$app->params['currencyLink']);
        }catch(ErrorException $e){
            return "Сервис недоступен";
        }
        if($currencies=json_decode($data,true)){
            $glic='  <span class="glyphicon glyphicon-arrow-right"></span>  ';
            $date=mb_substr($currencies[0]['Date'],0,10);
            $date=formatDate($date);
            $curr=Html::tag('div','На '.$date,['class' => 'date']);
            foreach($currencies as $currency){
                switch($currency['Cur_ID']){
                    case 298:$span=Html::tag('span',$currency['Cur_Scale'].$glic.$currency['Cur_OfficialRate'],['class' => 'RUB']);
                             $curr.=Html::tag('p',$currency['Cur_Abbreviation'].' '.$span);break;
                    case 145:$span=Html::tag('span',$currency['Cur_Scale'].$glic.$currency['Cur_OfficialRate']);
                             $curr.=Html::tag('p',$currency['Cur_Abbreviation'].' '.$span);break;
                    case 292:$span=Html::tag('span',$currency['Cur_Scale'].$glic.$currency['Cur_OfficialRate']);
                             $curr.=Html::tag('p',$currency['Cur_Abbreviation'].' '.$span);break;
                }
            }
           
            $this->currency=$curr;
            Yii::$app->cache->set('currency',$this->currency,1800);
            return $this->currency;
        }
        return "Сервис недоступен";
    }

}
?>