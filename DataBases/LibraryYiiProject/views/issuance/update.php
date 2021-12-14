<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Issuance */

$this->title = 'Update Issuance: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Issuances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?php $books = ArrayHelper::map($books, 'id', 'name') ?>
<?php $users = ArrayHelper::map($users, 'id', 'firstname', 'lastname') ?>


<div class="issuance-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'books' => $books,
        'users' => $users
    ]) ?>

</div>