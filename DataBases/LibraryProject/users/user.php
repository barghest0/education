<?php
include_once "../connection.php";
$sth = $pdo->prepare('SELECT * FROM lib_users where lib_users.id=:id');
$sth->execute([
    ':id' => $_GET['id']
]);
$user = $sth->fetch();

$sth2 = $pdo->prepare('SELECT lib_books.name as book, lib_lending.date_from, lib_lending.date_to, lib_lending.is_overdue  FROM lib_lending 
JOIN lib_users ON lib_lending.id_user=lib_users.id 
JOIN lib_books ON lib_lending.id_user=lib_users.id where lib_users.id=:id');
$sth2->execute([
    ':id' => $_GET['id']
]);
$cards = $sth2->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="index.php">
        <- Вернуться назад</a>
            <h1><?= $user['name'] ?></h1>
            <h3>Возраст :<?= $user['age'] ?></h3>
            <?php
            foreach ($cards as $card) {
                echo 'Книга: ' . $card['book'] . '<br> ' . 'Состояние: ' . $card['is_overdue'] . '<br> ' . 'Дата выдачи: ' . $card['date_from'] . '<br>' . 'Дата сдачи: ' . $card['date_to'] . '<br>';
            }
            
            ?>
</body>

</html>