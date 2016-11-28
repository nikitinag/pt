<?php
use yii\helpers\Html;
use app\models\ListUrl;
use app\models\Category;
use app\models\Data;

    function debug($ob){
	  echo '<pre style="margin-top:50px">'.print_r($ob,true).'</pre>' ;
	}
    
    //Вывод котнактной информации в тегах <li> по умолчанию
    function arrayContacts($contacts,$tag='li'){
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
    
    //Парсинг HTML
    function parseHTML($coefficient){
        
        require_once('phpQuery-onefile.php');
        $list_id=1;
        $document = phpQuery::newDocumentFile('01.html');
        $bodys=$document->find('tbody');
        foreach($bodys as $body){
            $category=new Category;
            $category->list_id=$list_id;
            $trs=pq($body)->find('tr');
            $i=0;foreach($trs as $tr){
                    $i++;
                    if($i==1){
                        
                        $ths=pq($tr)->find('th');
                        $category->name=pq($ths)->text();
                    }
                    if($i==2){
                        $ths=pq($tr)->find('th');
                        $j=1;foreach($ths as $th){
                            $j++;
                            $th=pq($th)->text();
                            switch($j){
                                case 2: $category->item1=!empty($th)?$th:'-';break;
                                case 3: $category->item2=!empty($th)?$th:'-';break;
                                case 4: $category->type=!empty($th)?$th:'-';break;
                                case 5: $category->price=!empty($th)?$th:'-';break;
                            }
                        }
                    }
                    $category->save();
                    if($i>2){
                        $data=new Data;
                        $data->category_id=$category->id;
                        $tds=pq($tr)->find('td');
                        $j=0;foreach($tds as $td){
                            $j++;
                            $td=pq($td)->text();
                            switch($j){
                                case 1: $data->item1=$td;break;
                                case 2: $data->item2=$td;break;
                                case 3: $data->type=$td;break;
                                case 4: $data->price=$td*$coefficient;break;
                            }   
                        }
                    $data->save();
                    }
                }
        }
        unset($document);
    }
?>