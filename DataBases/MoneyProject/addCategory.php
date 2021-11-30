<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Добавить категорию</h2>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Название"><br>
        <input type="text" name="norm" placeholder="Норма"><br>
        <select name="type" id="">
            <option value="Доход">Доход</option>
            <option value="Расход">Расход</option>
        </select><br>
        <button type="submit">Добавить</button>
    </form>
    <a href="index.php">Вернуться</a><br>
</body>

</html>

<?php
require_once "connect.php";
$name = $_POST['name'] ? $_POST['name'] : NULL;
$norm = $_POST['norm'] ? $_POST['norm'] : NULL;
$type = $_POST['type'] ? $_POST['type'] : NULL;
$sth = $pdo->prepare("INSERT INTO `money_category` (name,type,norm) values (:name,:type,:norm)");
$sth->execute([
    ":name" => $name,
    ":type" => $type,
    ":norm" => $norm
]);
