<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Issuance */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Issuances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="issuance-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            // 'id_book',
            [
                'attribute' => 'id_book',
                'value' => function ($model) {
                    return $model->book->name;
                }
            ],
            // 'id_user',
            [
                'attribute' => 'id_user',
                'value' => function ($model) {
                    return $model->user->firstname . ' ' . $model->user->lastname;
                }
            ],
            'start_date',
            'must_date',
            'finish_date',
        ],
    ]) ?>

</div>