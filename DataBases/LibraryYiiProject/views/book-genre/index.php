<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookGenreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Книги-Жанры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-genre-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать книгу-жанр', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'id_genre',
            [
                'attribute'=>'id_genre',
                'value'=>function($model){
                    return $model->genre->name;
                }
            ],
            // 'id_book',
            [
                'attribute'=>'id_book',
                'value'=>function($model){
                    return $model->book->name;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
