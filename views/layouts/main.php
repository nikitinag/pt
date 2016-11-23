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
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
            <?=app\components\CalculatorWidget::widget(); ?>
        </div>
        
        <div class="col-sm-8 block">
            <main>
                <?= $content ?>
            </main>
        </div>

    </div><!--/.row-->
</div><!--/.container-->
</div><!--/.main-->

<footer>
    <?=app\components\FooterWidget::widget(); ?>
</footer>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"
        async defer></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>