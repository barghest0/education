<?php

use yii\widgets\ActiveForm; //Для того, чтобы создать форму для взаимодействия с моделью
use yii\helpers\Html;
?>



<h1>Test Action</h1>
<?php if (Yii::$app->session->hasFlash('success')) : ?>
    <div class="alert alert-success alert-dissmisable" role="alert">
        <button type="button" class="close" data-dismiss="alert" area-label="Close"><span area-hidden="true">&times;</span></button>
        <?= Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')) : ?>
    <div class="alert alert-danger alert-dissmisable" role="alert">
        <button type="button" class="close" data-dismiss="alert" area-label="Close"><span area-hidden="true">&times;</span></button>
        <?= Yii::$app->session->getFlash('error'); ?>
    </div>
<?php endif; ?>

<?php $form = ActiveForm::begin(['id' => 'testForm']); //начало формы, в настройках задаем id 
?>
<!-- У формы есть метод field, который делает инпут текст, если нужен другой, то задаем его аналогично textarea -->
<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'text')->textarea(['rows' => 5]) ?>
<?= Html::submitButton('Отправить', ['class' => 'btn btn-success']); ?>
<?php ActiveForm::end() //заканчиваем форму
?>



</div>
<?php
// debug($model);
//используем глобальную функцию
// debug(Yii::$container);
?>