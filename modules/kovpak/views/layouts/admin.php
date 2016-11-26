<?php
use app\assets\AdminAsset;
use yii\helpers\Html;
use yii\helpers\Url;
    
AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Тооин | Админка</title>     
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
    
</header>

<div class="main">
<div class="container">
    <div class="row">
        <div class="col-sm-4 block">
             
        </div>
        
        <div class="col-sm-8 block">
            <?= $content ?>
        </div>

    </div><!--/.row-->
        <p><a href="<?=\yii\helpers\Url::to(['/logout'])?>">ВЫХОД</a></p>
</div><!--/.container-->
</div><!--/.main-->

<footer>
    
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>