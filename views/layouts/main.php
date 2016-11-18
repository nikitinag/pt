<?php
use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\ltAppAsset;
    
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?=Html::encode($this->title)?></title>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->      
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <header class="navbar-fixed-top">
    
    <section class="line">
    <p>лента холоднокатаная по размерам заказчика любой группы вытяжки</p>
    </section>
    
    <nav class="navbar navbar-inverse">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a title="На главную" class="navbar-brand" href="/index"><?= Html::img("@web/images/logo.png",['alt'=>'Логотип'])?></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><?= Html::a('Контакты','/contact') ?></li>
        <li><?= Html::a('Вакансии','/employees') ?></li>
        <li><?= Html::a('Обратная связь','/callback') ?></li>
        <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ассортимент<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?= Html::a('Качественные стали','/categogy/0') ?></li>
            <li><?= Html::a('Трубы','/categogy/1') ?></li>
            <li><?= Html::a('Сортовой прокат','/categogy/2') ?></li>
            <li><?= Html::a('Листовой прокат','/categogy/3') ?></li>
            <li><?= Html::a('Цветной прокат','/categogy/4') ?></li>
            <li><?= Html::a('Нержавейка','/categogy/5') ?></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>

    <!--Calculator-->
<section class="section-calculator">
<div id="link-calculator" class="link-calculator">
<p>Металлокалькулятор</p>
</div>
</section>

</header>

<div class="main">
<div class="container">
    <div class="row">
        <div class="col-sm-4 block">
            <section id="calculator" class="calculator-sm hidden-xs">
                <h4>Металлокалькулятор</h4>
                <ul id="list" class="list">
                    <li value="1">Круглые прутки, круги и проволка</li>
                    <li value="2">Шестигранные прутки</li>
                    <li value="3">Листы, плиты, ленты</li>
                    <li value="4">Трубы и втулки</li>
                    <li value="5">Прямоугольные трубы</li>
                </ul>
                <div id="calculator-form" class="calculator-form"></div>
                <p id="calculator-result" class="calculator-result"></p>
                <p class="calculator-info">* Расчёт производится для Сталь 3.</p>
            </section><!--.calculator-sm-->
        </div>

<?= $content ?>

<footer>
<div class="container">
<div class="row">
    <div class="col-sm-6 contacts">
        <p>Контактная информация:</p>
        <dl>
            <dt>телефон-факс:</dt>
                <dd>+375 17 2685243</dd>
                <dd>+375 17 2685244</dd>
        </dl>
        <dl>
            <dt>мобильный телефон:</dt>
                <dd>+375 29 1685244</dd>
        </dl>
        <dl>
            <dt>электронная почта:</dt>
                <dd>michael.kov@mail.ru</dd>
        </dl>
        <dl>
            <dt>адрес:</dt>
                <dd>220113 г.Минск, ул.Мележа д. 1 офис 1109</dd>
        </dl>
    </div>
    <div class="col-sm-6 copy">
        <dl class="develop">
        <dt>Разработка:</dt>
                <dd>Никитин Алексей</dd>
                <dd></dd>
        </dl>
        <p>Copyright&copy;2016&nbsp;Унитарное предприятие&nbsp;“ТООИН”.&nbsp;</p>
    </div>
</div><!--/.row-->
</div><!--/.container-->
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>