<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\Contact;

class FooterWidget extends Widget{
   
    protected $footer;
    protected $footerLeft;
    protected $footerRight;
    
    public function run(){
        
        // footerLeft
        $pFooterLeft=Html::tag('p','Контактная информация:');
        $contacts=Contact::find()->asArray()->all();
        $type=[
                1=>'телефон-факс',
                2=>'мобильный тел.',
                3=>'эл.почта',
                4=>'адрес',
              ];
        $arrayContact=array();
        foreach($contacts as $contact){
           switch($contact['type']){
            case $type[1]: $arrayContact[ $type[1] ].=Html::tag('dd',$contact['contact']);break;
            case $type[2]: $arrayContact[ $type[2] ].=Html::tag('dd',$contact['contact']);break;
            case $type[3]: $arrayContact[ $type[3] ].=Html::tag('dd',$contact['contact']);break;
            case $type[4]: $arrayContact[ $type[4] ].=Html::tag('dd',$contact['contact']);break;
           } 
        }
        $dlFooterLeft="";
        foreach($arrayContact as $t=>$con){
            $dlFooterLeft.=Html::tag('dl',Html::tag('dt',$t).$con);
        }
        $this->footerLeft=Html::tag('div',$pFooterLeft.$dlFooterLeft,['class' => 'col-sm-6 contacts']);
        
        //footerRight
        $ddfooterRight=Html::tag('dd','Никитин Алексей');
        $dlfooterRight=Html::tag('dl',Html::tag("dt","Разработка:").$ddfooterRight,['class' => 'develop']);
        $pFooterRight=Html::tag('p','Copyright&copy;2016&nbsp;Унитарное предприятие&nbsp;“ТООИН”.&nbsp;');
        $this->footerRight=Html::tag('div',$dlfooterRight.$pFooterRight,['class' => 'col-sm-6 copy']);
        
        //footer
        $row=Html::tag('div',$this->footerLeft.$this->footerRight,['class' => 'row']);
        $this->footer=Html::tag('div',$row,['class' => 'container']);
        
        return $this->footer;
    }

}
?>