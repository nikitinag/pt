<?php
namespace app\components;

use Yii;
use yii\base\View;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Info;
use app\models\Pages;
use app\models\ListUrl;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

class MenuWidget extends Widget
{
    public function run()
    {
        $above = Info::find('text_above')->asArray()->one();
        echo('<section class="line"><p>' . $above['text_above'] . '</p></section>');
        
        $items = array();
        $pages = Pages::find()->asArray()->where(['watch' => '1'])->all();
        if($pages){
            foreach($pages as $page){
                $items[] = [
                    'label' => $page['name'],
                    'url' => '/pages?id='. $page['id'],
                ];
            }
        }
        
        $listUrl = ListUrl::find()->asArray()->all();
        if($listUrl){
            foreach($listUrl as $url){
                $items[] = [
                    'label' => $url['name'],
                    'url' => '/category?id='. $url['id'],
                ];
            }
        }

        NavBar::begin([
            'brandLabel' => '<img src="' . \Yii::$app->request->BaseUrl . '/images/logo.png"/>',
            'brandUrl' => '/',
            'brandOptions' => [
                'title' => 'На главную',
            ],
            'options' => [
                'class' => 'navbar navbar-inverse',
            ],
            ]);
            echo Nav::widget([
                'items' => [
                    !Yii::$app->user->isGuest?['label' => 'Админка', 'url' => ['/kovpak']]:['label'=>''],
                    ['label' => 'Контакты', 'url' => ['/contact']],
                    ['label' => 'Вакансии', 'url' => ['/employees']],
                    ['label' => 'Обратная связь', 'url' => ['/feedback']],
                    ['label' => 'Ассортимент',
                        'items' => $items,
                        'option' => [
                            'class' => 'dropdown-menu',
                        ],
                    ],
                ],
                'options' => ['class' => 'nav navbar-nav navbar-right'],
            ]);
        NavBar::end();
    }
}
