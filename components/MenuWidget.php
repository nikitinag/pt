<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Info;

class MenuWidget extends Widget{
    
    protected $text;
      
    public function run(){
        $above=Info::find('text_above')->asArray()->one();
        $this->text.='<section class="line"><p>'.$above['text_above'].'</p></section>';
        $this->text.='<nav class="navbar navbar-inverse">
            <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a title="На главную" class="navbar-brand" href="/index">'.Html::img("@web/images/logo.png",['alt'=>'Логотип']).'</a>
            </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li>'.Html::a("Контакты","/contact").'</li>
        <li>'.Html::a("Вакансии","/employees").'</li>
        <li>'.Html::a("Обратная связь","/callback").'</li>
        <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ассортимент<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>'.Html::a("Качественные стали","/categogy/0").'</li>
            <li>'.Html::a("Трубы","/categogy/1").'</li>
            <li>'.Html::a("Сортовой прокат","/categogy/2").'</li>
            <li>'.Html::a("Листовой прокат","/categogy/3").'</li>
            <li>'.Html::a("Цветной прокат","/categogy/4").'</li>
            <li>'.Html::a("Нержавейка","/categogy/5").'</li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>';
        return $this->text;
    }
}

?>