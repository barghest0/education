<?php
include_once "../connection.php";

$sth = $pdo->prepare('SELECT * FROM provider_rate where speed > 0');
$sth->execute();
$rates = $sth->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="../index.php">Вернуться назад</a>
    <h1>Тарифы</h1>
    <a href="./topRates.php">Лучшие тарифы(>30мбит/с, без ограничения)</a>
    <?php foreach ($rates as $rate) : ?>
        <h2><?= $rate['name'] ?></h2>
        <p>Цена:<?= $rate['price'] ?>/мес</p>
        <p>Скорость:<?= $rate['speed'] ?> мбит/с</p>
        <p>Ограничение:<?= $rate['volume_limit'] ? $rate['volume_limit'] . " гб" : " Без ограничения"  ?></p>
        <p>Описание:<?= $rate['description'] ?></p>
    <?php endforeach; ?>
</body>

</html>