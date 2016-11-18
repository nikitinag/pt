<?php
use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
    
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

    <!--Menu-->
    <?=app\components\MenuWidget::widget(); ?>

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