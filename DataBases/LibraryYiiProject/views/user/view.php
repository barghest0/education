<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$issuances = ArrayHelper::map($model->issuances, 'id', 'finish_date');
$mustDelete = true;

$age = date('Y') - date('Y', strtotime($model->birthdate));

?>

<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a('Выдачи', ['issuance/for-user', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    <br><br>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
        foreach ($issuances as $key => $date) {
            if (!$date || $age < 18) {
                $mustDelete = false;
            }
        }
        ?>
        <?php if ($mustDelete) : ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php else :  ?>
            <?= "Должник или мало лет" ?>
        <?php endif ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'lastname',
            'firstname',
            // 'birthdate',
            [
                'attribute' => 'birthdate',
                'value' => function ($model) {
                    return $model->birthdate . " Возраст " . (date('Y') - date('Y', strtotime($model->birthdate)));
                }
            ],
        ],
    ]) ?>

</div>