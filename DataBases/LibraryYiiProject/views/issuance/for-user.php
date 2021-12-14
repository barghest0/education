<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IssuanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Выдачи для пользователя". $searchModel->id_user;
$this->params['breadcrumbs'][] = $this->title ;
?>
<div class="issuance-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Issuance', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'id_book',
            [
                'attribute'=>'id_book',
                'value'=>function($model){
                    return $model->book->name;
                }
            ],
            // 'id_user',
            [
                'attribute'=>'id_user',
                'value'=>function($model){
                    return $model->user->firstname.' '.$model->user->lastname;
                }
            ],
            'start_date',
            'must_date',
            'finish_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
