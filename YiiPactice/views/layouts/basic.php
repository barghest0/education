<!-- Базовый шаблон приложения (стили и разметка), которые мы написали ручками -->

<?php

use app\assets\AppAsset;
use yii\helpers\Html; //подключение helper

AppAsset::register($this); //регистрация $this, для использования в шаблоне


?>
<!-- beginPage обозначает начало страницы -->

<?php $this->beginPage() ?>

<!DOCTYPE html>
<!-- $app - конфиг приложения -->
<html lang="<?=Yii::$app->language?>">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ключ защиты, можно заменить методом в контроллере -->
    <?php //$this->registerCsrfMetaTags() ?>

    <title><?=HTML::encode($this->title)?></title>
    <?php $this->head() ?>
</head>

<body>
    <!-- beginBody обозначает начало body -->
    <?php $this->beginBody() ?>
    <div class="wrap">
        <div class="container">
            <ul class="nav nav-pills">
                <li role="presentation" class="nav-item"> <?= Html::a('Главная', ['/site/index'], ['class' => 'nav-link active']) ?></li>
                <li role="presentation" class="nav-item"> <?= Html::a('Статьи', ['/post/index'], ['class' => 'nav-link']) ?></li>
                <li role="presentation" class="nav-item"> <?= Html::a('Статья', ['/post/show'], ['class' => 'nav-link']) ?></li>
            </ul>
            <div class="content">
            <?php if(isset($this->blocks['block1'])) echo $this->blocks['block1']?>
                <!-- $content отображает соответсвующий контент из views -->
                <?= $content ?>
            </div>
        </div>
    </div>
    <?php $this->endBody() ?>

</body>

</html>

<?php $this->endPage() ?>