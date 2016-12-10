<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\Contact;
use Yii;

class FooterWidget extends Widget
{
    protected $footer;
    protected $footerLeft;
    protected $footerRight;
    
    public function run()
    { 
        $cache=Yii::$app->cache->get('footer');
        if($cache) {return $cache;}
        
        // footerLeft
        $pFooterLeft = Html::tag('p', 'Контактная информация:');
        
        $contacts = Contact::find()->asArray()->all();
        $arrayContact = arrayContacts($contacts, 'dd');
        $dlFooterLeft = '';
        foreach($arrayContact as $t => $con){
            $dlFooterLeft .= Html::tag('dl', Html::tag('dt', $t . ':').$con);
        }
                
        $this->footerLeft = Html::tag('div', $pFooterLeft.$dlFooterLeft, ['class' => 'col-sm-6 contacts']);
        
        //footerRight
        $ddfooterRight = Html::tag('dd','Никитин Алексей') . Html::tag('dd','nikitinag.web@gmail.com');
        $dlfooterRight = Html::tag('dl',Html::tag("dt","Разработка:") . $ddfooterRight, ['class' => 'develop']);
        $pFooterRight = Html::tag('p','Copyright&copy;2016&nbsp;Унитарное предприятие&nbsp;“ТООИН”.&nbsp;');
        $this->footerRight = Html::tag('div', $dlfooterRight . $pFooterRight, ['class' => 'col-sm-6 copy']);
        
        //footer
        $row = Html::tag('div', $this->footerLeft . $this->footerRight, ['class' => 'row']);
        $this->footer = Html::tag('div', $row, ['class' => 'container']);
        
        Yii::$app->cache->set('footer', $this->footer, 3600);
        return $this->footer;
    }
}
