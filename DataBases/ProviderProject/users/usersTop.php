<?php
include_once "../connection.php";
$rate_id = $_GET['rate_id'];

$sth = $pdo->prepare('SELECT provider_user.name,provider_user.active, provider_rate.name as rate_name, provider_user.debpt, provider_user.usage_time  FROM provider_user JOIN provider_rate on provider_user.rate_id = provider_rate.id ORDER BY provider_user.usage_time DESC
');



$sth->execute([':rate_id' => $rate_id]);

$users = $sth->fetchAll();
$sthRate = $pdo->prepare('SELECT * FROM provider_rate');
$sthRate->execute();
$rates = $sthRate->fetchAll();




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
    <h1>Топ долгосрочных абонентов</h1>

    <?php foreach ($users as $user) : ?>
        <h2><?= $user['name'] ?></h2>
        <p>Тариф:<?= $user['rate_name'] ?></p>
        <p>Задолженность:<?= round($user['debpt'])  ? $user['debpt'] : " Нет задолженностей"  ?></p>
        <p>Срок покупки: до <?= $user['usage_time'] ?></p>
        <p>Статус: <?= $user['active'] ?></p>

    <?php endforeach; ?>

</body>

</html>