<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IssuanceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="issuance-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_book') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'start_date') ?>

    <?= $form->field($model, 'must_date') ?>

    <?php // echo $form->field($model, 'finish_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
