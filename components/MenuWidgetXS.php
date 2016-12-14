<?php
namespace app\components;

use yii\base\Widget;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

class MenuWidgetXS extends Widget
{
    public function run()
    {
        NavBar::begin(['brandLabel' => 'АДМИНИСТРАТИВНАЯ ПАНЕЛЬ', 'brandUrl' => '/kovpak']);
        echo Nav::widget([
            'items' => [
                ['label' => 'Обновление ассортимента', 'url' => ['/kovpak']],
                ['label' => 'Текст на главной странице', 'url' => ['/kovpak/text']],
                ['label' => 'Вакансии', 'url' => ['/kovpak/employees']],
                ['label' => 'Сообщения', 'url' => ['/kovpak/message']],
                ['label' => 'Контакты', 'url' => ['/kovpak/contact']],
                ['label' => 'Логин и пароль', 'url' => ['/kovpak/admin/login']],
                ['label' => 'Перейти на сайт', 'url' => ['/']],
                ['label' => 'Выход', 'url' => ['/logout']],
            ],
            'options' => ['class' => 'navbar-nav'],
        ]);
        NavBar::end();
    }
}
