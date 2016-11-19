<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class CalculatorWidget extends Widget{
   
    protected $calc;
    
    public function run(){
        $h4= Html::tag('h4', 'Металлокалькулятор');
        $listLi='<li value="1">Круглые прутки, круги и проволка</li>
                 <li value="2">Шестигранные прутки</li>
                 <li value="3">Листы, плиты, ленты</li>
                 <li value="4">Трубы и втулки</li>
                 <li value="5">Прямоугольные трубы</li>';
        $ul= Html::tag('ul', $listLi, ['class' => 'list','id' => 'list']);
        $divForm=Html::tag('div','',['class' => 'calculator-form','id' => 'calculator-form']);
        $presult=Html::tag('p','',['class' => 'calculator-result','id' => 'calculator-result']);
        $pInfo=Html::tag('p','* Расчёт производится для Сталь 3.',['class' => 'calculator-info']);
        $this->calc=Html::tag('section',$h4.$ul.$divForm.$presult.$pInfo,['class' => 'calculator-sm hidden-xs','id' => 'calculator']);
        
        return $this->calc;
    }

}
?>