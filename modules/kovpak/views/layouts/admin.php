<?php
use app\assets\AdminAsset;
use app\components\MenuWidgetXS;
use yii\bootstrap\Navbar;
use yii\bootstrap\Nav;
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

<div class="container">
<div class="xsnavbar clearfix visible-xs-block">
    <?= app\components\MenuWidgetXS::widget() ?>
</div>
<div class="header clearfix hidden-xs">
    <h1>АДМИНИСТРАТИВНАЯ ПАНЕЛЬ</h1>
</div>
    <div class="row">
        <div class="col-sm-4 block clearfix hidden-xs">
            <?php echo Nav::widget([
            'id' => 'nav',
            'class' => 'nav',
            'items' => [
                [
                    'label' => 'Обновление ассортимента',
                    'url' => ['/kovpak'],
                    'linkOptions' => [],
                ],
                [
                    'label' => 'Текст главной странице',
                    'url' => ['/kovpak/admin/text'],
                    'linkOptions' => [],
                ],
                [
                    'label' => 'Другие страницы',
                    'url' => ['/kovpak/admin/pages'],
                    'linkOptions' => [],
                ],
                [
                    'label' => 'Вакансии',
                    'url' => ['/kovpak/admin/employees'],
                    'linkOptions' => [],
                ],
                [
                    'label' => 'Сообщения',
                    'url' => ['/kovpak/admin/message'],
                    'linkOptions' => [],
                ],
                [
                    'label' => 'Контакты',
                    'url' => ['/kovpak/admin/contact'],
                    'linkOptions' => [],
                ],
                [
                    'label' => 'Логин и пароль',
                    'url' => ['/kovpak/admin/login'],
                    'linkOptions' => [],
                ],
                [
                    'label' => 'Перейти на сайт',
                    'url' => ['/'],
                    'linkOptions' => [],
                ],
                [
                    'label' => 'Выход',
                    'url' => ['/logout'],
                    'linkOptions' => [],
                ],
            ],
            ]); ?> 
        </div>
        
        <div class="col-sm-8 block admin">
            <?= $content ?>
        </div>

    </div><!--/.row-->
</div><!--/.container-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
