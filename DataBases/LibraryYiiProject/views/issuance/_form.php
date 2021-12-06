<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Issuance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="issuance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_book')->dropdownList($books) ?>

    <?= $form->field($model, 'id_user')->dropdownList($users) ?>

    <?= $form->field($model, 'start_date')->input('date') ?>

    <?= $form->field($model, 'must_date')->input('date') ?>

    <?= $form->field($model, 'finish_date')->input('date') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
