<?php
use yii\helpers\Html;

    function debug($ob)
    {
	  echo '<pre style="margin-top:50px">'.print_r($ob,true).'</pre>' ;
	}
    
    //Вывод котнактной информации в тегах <li> по умолчанию
    function arrayContacts($contacts,$tag='li')
    {
       $type=[
                1=>'телефон-факс',
                2=>'мобильный тел.',
                3=>'эл.почта',
                4=>'адрес',
              ];
        $arrayContact=array();
        foreach($contacts as $contact){
           switch($contact['type']){
            case $type[1]: $arrayContact[ $type[1] ].=Html::tag($tag,$contact['contact']);break;
            case $type[2]: $arrayContact[ $type[2] ].=Html::tag($tag,$contact['contact']);break;
            case $type[3]: $arrayContact[ $type[3] ].=Html::tag($tag,$contact['contact']);break;
            case $type[4]: $arrayContact[ $type[4] ].=Html::tag($tag,$contact['contact']);break;
           } 
        }
        
        return  $arrayContact;
    }
?>