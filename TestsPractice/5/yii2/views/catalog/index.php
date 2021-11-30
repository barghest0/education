<?php
use yii\helpers\Html;

?>

<div class="">
    <h2>Поиск</h2>
    <form id="search_form" action="<?=yii\helpers\Url::to(['/catalog/index']) ?>" method="get">
        <input type="text" name="query" placeholder="Search">
        <button type="submit">Найти</button>
    </form>
    <a href="<?=yii\helpers\Url::to(['/catalog']) ?>" >Все товары</a><br>
    
    <?php
    if ($products) {
        echo '<ul>';
        foreach ($products as $product) {
            echo '<li>'.Html::a($product->name,['/catalog/single', 'id'=>$product->id],['class'=>'profile-link'])." ". $product->price.'р</li>';
        }
        echo '</ul>';
    }else{
        echo "Ничего не найдено";
    }
    
    ?>
    
</div>