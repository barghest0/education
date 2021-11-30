<?php
include_once "../../connection.php";
$sth = $pdo->prepare("SELECT * FROM shop_category");
$sth->execute();
$categories = $sth->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="addProduct.php" method='POST'>
    <input type="text" placeholder="Название" name='name' ><br>
    <input type="text" placeholder="Описание"  name='description' ><br>
    <input type="text" placeholder="Цена" name='price' ><br>
    <select name="categories" id="">
    <?php
    foreach ($categories as $category){
        echo '<option value="'.$category['id'].'" id="">'.$category['name'].'</option>';
    }
    ?>
    </select>
    <a href="createCategory.php">Добавить категорию</a>
    <br>
    <button type="submit">Добавить товар</button>
    </form>
    <a href="../products.php">Вернуться назад</a>
</body>
</html>
