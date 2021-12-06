<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\BookGenre */

$this->title = 'Create Book Genre';
$this->params['breadcrumbs'][] = ['label' => 'Book Genres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $books = ArrayHelper::map($books,'id','name')?>
<?php $genres = ArrayHelper::map($genres,'id','name')?>
<div class="book-genre-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'books' => $books,
        'genres' => $genres
    ]) ?>

</div>
