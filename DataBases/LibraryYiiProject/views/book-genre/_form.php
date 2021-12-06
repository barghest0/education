<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BookGenre */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="book-genre-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'id_genre')->dropdownList($genres) ?>
    <?= $form->field($model, 'id_book')->dropdownList($books) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
