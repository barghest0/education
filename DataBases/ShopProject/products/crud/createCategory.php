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
<form action="postCategory.php" method='POST'>
    <input type="text" placeholder="Название" name='name' ><br>
    <button type="submit">Добавить категорию</button>
    </form><br>
    <a href='createProduct.php'>Вернуться назад</a>
</body>
</html>
