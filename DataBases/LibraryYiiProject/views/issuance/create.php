<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Issuance */
use yii\helpers\ArrayHelper;
$this->title = 'Create Issuance';
$this->params['breadcrumbs'][] = ['label' => 'Issuances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $users = ArrayHelper::map($users,'id','firstname','lastname')?>
<?php $books = ArrayHelper::map($books,'id','name')?>
<div class="issuance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'users' => $users,
        'books' => $books
    ]) ?>

</div>
