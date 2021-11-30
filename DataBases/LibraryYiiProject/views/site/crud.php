<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Crud контроллер';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <a href="<?= yii\helpers\Url::toRoute('/book/index') ?>">Управление книгами</a><br>
    <a href="<?= yii\helpers\Url::toRoute('/genre/index') ?>">Управление жанрами</a><br>
    <a href="<?= yii\helpers\Url::toRoute('/bookgenre/index') ?>">Управление книга-жанр</a><br>
    <a href="<?= yii\helpers\Url::toRoute('/issuance/index') ?>">Управление выдачей</a><br>
    <a href="<?= yii\helpers\Url::toRoute('/user/index') ?>">Управление пользователями</a><br>
    
    

</div>
