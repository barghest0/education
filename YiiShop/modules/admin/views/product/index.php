<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category_id',
            'name',
            // 'content:ntext',
            'price',
            [
                'attribute' => 'hit',
                'value' => function ($data) {
                    return !$data->hit ? '<span class="text-danger">Нет</span>' :
                        '<span class="text-success">Да</span>';
                },
                'format' => 'html'
            ],
            [
                'attribute' => 'new',
                'value' => function ($data) {
                    return !$data->new ? '<span class="text-danger">Нет</span>' :
                        '<span class="text-success">Да</span>';
                },
                'format' => 'html'

            ],
            [
                'attribute' => 'sale',
                'value' => function ($data) {
                    return !$data->sale ? '<span class="text-danger">Нет</span>' :
                        '<span class="text-success">Да</span>';
                },
                'format' => 'html'

            ],
            //'keywords',
            //'description',
            //'img',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <span class></span>
</div>