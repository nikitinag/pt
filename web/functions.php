<?php

use yii\helpers\Html;
use app\models\ListUrl;
use app\models\Category;
use app\models\Data;
use yii\db\ActiveRecord;

    //Вывод котнактной информации в тегах <li> по умолчанию
    function arrayContacts($contacts, $tag = 'li')
    {
       $type=[
                1 => 'телефон-факс',
                2 => 'мобильный телефон',
                3 => 'эл.почта',
                4 => 'адрес',
              ];
        $arrayContact = array();
        foreach($contacts as $contact){
            switch($contact['type']){
                case $type[1]:
                    $arrayContact[ $type[1] ] .= Html::tag($tag, $contact['contact']);
                    break;
                case $type[2]:
                    $arrayContact[ $type[2] ] .= Html::tag($tag, $contact['contact']);
                    break;
                case $type[3]:
                    $arrayContact[ $type[3] ] .= Html::tag($tag, $contact['contact']);
                    break;
                case $type[4]:
                    $arrayContact[ $type[4] ] .= Html::tag($tag, $contact['contact']);
                    break;
           } 
        }
        return  $arrayContact;
    }
        
    //Восстановление основной базы(down) или обновление резервной(up) и обнуление Category и Data
    function UpDownDeleteData($type = 'down')
    {
        $connection = Yii::$app->getDb();
        if(empty($connection)){return false; }
        $connection->open();
        if($type == 'delete'){
            
             $command = $connection->createCommand('TRUNCATE TABLE category;
                                                    TRUNCATE TABLE data');
             if($command->query()) { return true; }
        }
        if($type == 'up'){
            
             $command = $connection->createCommand('TRUNCATE TABLE category_backup;
                                                    TRUNCATE TABLE data_backup;
                                                    INSERT INTO category_backup SELECT * FROM category;
                                                    INSERT INTO data_backup SELECT * FROM data');
             if($command->query()) { return true; }
        }
        if($type == 'down'){
             $command = $connection->createCommand('TRUNCATE TABLE category;
                                                    TRUNCATE TABLE data;
                                                    INSERT INTO category SELECT * FROM category_backup;
                                                    INSERT INTO data SELECT * FROM data_backup');
             if($command->query()) { return true; }
        }
        return false;
    }
                
    //Парсинг HTML
    function parseHTML($coefficient, $remoteUrl, $list_id)
    {
        require_once('phpQuery-onefile.php');
        $document = phpQuery::newDocumentFile($remoteUrl);
        if(empty($document)){ return false; }
        $bodys = $document->find('tbody');
        foreach($bodys as $body){
            $category = new Category;
            if(empty($category)){ return false; }
            $category->list_id = $list_id;
            $trs = pq($body)->find('tr');
            $i = 0; foreach($trs as $tr){
                        $i++;
                        if($i == 1){
                            $ths = pq($tr)->find('th');                       
                            $category->name = pq($ths)->text();                      
                        }
                        if($i == 2){
                            $ths = pq($tr)->find('th');
                            $j = 1;foreach($ths as $th){
                                $j++;
                                $th = pq($th)->text();
                                switch($j){
                                    case 2:
                                        $category->item1 = !empty($th) ? $th : "-";
                                        break;
                                    case 3:
                                        $category->item2 = !empty($th) ? $th : "-";
                                        break;
                                    case 4:
                                        $category->type = !empty($th) ? $th : "-";
                                        break;
                                    case 5:
                                        $category->price = !empty($th) ? $th : "-";
                                        break;
                                    default:
                                        return false;
                                }
                            }
                        }
                        $category->save();
                        if($i > 2){
                            $data = new Data;
                            if(empty($data)){ return false; }
                            $data->category_id = $category->id;
                            $tds = pq($tr)->find('td');
                            $j = 0;foreach($tds as $td){
                                $j++;
                                $td = pq($td)->text();
                                switch($j){
                                    case 1:
                                        $data->item1 = !empty($td) ? $td : "-";
                                        break;
                                    case 2:
                                        $data->item2 = !empty($td) ? $td : "-";
                                        break;
                                    case 3:
                                        $data->type = !empty($td) ? $td : "-";
                                        break;
                                    case 4:
                                        $data->price = !empty($td) ? $td : 0;
                                        $data->price *= $coefficient;
                                        break;
                                    default:
                                        return false;
                                }   
                            }
                        $data->save();
                        }
                    }
        }
        unset($document);
        return true;
    }
    
    //Формат даты
    function formatDate($datetime)
    {
        $time = '';
        if( strlen($datetime) > 10 ){
            $datestring = explode(' ', $datetime);
            $datetime = $datestring[0];
            $time = ' ' . $datestring[1];
        }
        $dateArray = explode('-', $datetime);
        krsort($dateArray);
        $date = implode('-', $dateArray);
        return $date . $time;
    }
?>
