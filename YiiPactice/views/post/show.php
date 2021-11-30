<?php

use app\widgets\MyWidget;

?>

<h1>Show Action</h1>
<?php
//задаем title, можно заменить методом в контроллере
// $this->title ="Одна статья";

// foreach ($cats as $cat) {
//     в данном случае свойствами являются колонки бд
//     echo '<ul>';
//     echo '<li>' . $cat->title . '</li>';
//     $products = $cat->products;
//     foreach ($products as $product) {
//         echo '<ul>';
//         echo '<li>' . $product->title . '</li>';
//         echo '</ul>';
//     }
//     echo '</ul>';
// 
// echo MyWidget::widget(['name' => "Имя"]);
?>

<?php MyWidget::begin() ?>
<h1>Блок виджета</h1>
<?php MyWidget::end() ?>

<?php MyWidget::begin() ?>
<h1>Блок виджета</h1>
<?php MyWidget::end() ?>


<!-- передача блока из вида в шаблон  -->
<?php $this->beginBlock('block1'); ?>
<h1>Вставка вида в шаблон</h1>
<?php $this->endBlock(); ?>
<button class="btn btn-success" id='btn'>Click me...</button><br>



<?php

// debug($cats);















// $this->registerJsFile('@web/js/script.js', ['depends' => 'yii\web\YiiAsset']); //метод для подключения скрипта на страницу
// $this->registerJs("$('.container').append('<p>SHOW!!!</p>')", yii\web\View::POS_LOAD);
// $this->registerCSS('.container{background:#ccc}');

//отправляем get ajax запрос при нажатии на кнопку
// $jsGET = "
// $('#btn').on('click', () => {
//     $.ajax({
//         url: 'index',
//         data: { test: 123 },
//         type: 'GET',
//         success: res => {
//             console.log(res)
//         },
//         error: res => {
//             console.log(res)
//         },
//     })
// })
// ";

// $this->registerJs($jsGET);

//отправляем post ajax запрос при нажатии на кнопку
$jsPOST = "
$('#btn').on('click', () => {
    $.ajax({
        url: 'index',
        data: { test: 123 },
        type: 'POST',
        success: res => {
            console.log(res)
        },
        error: res => {
            console.log(res)
        },
    })
})
";

$this->registerJs($jsPOST);
