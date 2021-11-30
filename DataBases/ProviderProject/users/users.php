<?php
include_once "../connection.php";
$rate_id = $_GET['rate_id'];

$sth = $pdo->prepare('SELECT provider_user.name, provider_user.active, provider_rate.name as rate_name, provider_user.debpt, provider_user.usage_time  FROM provider_user JOIN provider_rate on provider_user.rate_id = provider_rate.id 
where provider_user.rate_id = :rate_id
');
$sth->execute([':rate_id' => $rate_id]);
$users = $sth->fetchAll();

$sthRate = $pdo->prepare('SELECT * FROM provider_rate');
$sthRate->execute();
$rates = $sthRate->fetchAll();


foreach ($users as $user) {
    if ($user['debpt'] > 0) {
        $sthUpdate = $pdo->prepare('UPDATE provider_user set active=:active');
        $sthUpdate->execute([':active' => 'Не активен']);
    }
}




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
    <h1>Пользователи</h1>
    <h3>Тарифы</h3>

    <form action="" method="get">
        <select name="rate_id">
            <option value=""></option>
            <?php foreach ($rates as $rate) : ?>
                <option value="<?= $rate['id'] ?>"><?= $rate['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Найти</button>
    </form>
    <a href="usersTop.php">Топ долгосрочных абонентов</a>
    <a href="usersDebpt.php">Должники</a>
    <?php foreach ($users as $user) : ?>
        <h2><?= $user['name'] ?></h2>
        <p>Тариф:<?= $user['rate_name'] ?></p>
        <p>Задолженность:<?= round($user['debpt'])  ? $user['debpt'] : " Нет задолженностей"  ?></p>
        <p>Срок покупки: до <?= $user['usage_time'] ?></p>
        <p>Статус: <?= $user['active'] ?></p>
    <?php endforeach; ?>

</body>

</html>