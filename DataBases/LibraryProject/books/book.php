<?php
include_once "../connection.php";
$sth = $pdo->prepare('SELECT lib_books.name, lib_publishers.name as publisher, lib_genres.name as genre FROM lib_books 
JOIN lib_publishers ON lib_books.id_publisher=lib_publishers.id 
JOIN lib_genres ON lib_books.id_genre=lib_genres.id where lib_books.id=:id');
$sth->execute([
    ':id'=>$_GET['id']
]);
$book = $sth->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../index.php"><- Вернуться назад</a>
    <h1><?= $book['name'] ?></h1>
</body>
</html>