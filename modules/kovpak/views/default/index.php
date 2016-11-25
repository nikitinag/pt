<?php
use yii\helpers\Url;
?>

<div class="kovpak-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <h2>Админка</h2>
    <p><a href="<?=\yii\helpers\Url::to(['/logout'])?>">ВЫХОД</a></p>
