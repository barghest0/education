<?php
require_once "connect.php";
$sth = $pdo->prepare("SELECT * FROM `money_account` where id=:id");
$sth->execute([":id" => $_GET['id']]);
$account = $sth->fetch();
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

    <h2><?= $account['name'] ?></h2>
    <form action="" method="post">
        <?php
        if ($account['active'] == 0) {
            echo "Ваш счет неактивен";
        ?> <select name="activeToggle" id=""><br>
                <option value="1">Активный</option>
                <option value="0">Неактивный</option>
            </select><br>
            <input type="submit" name="submit" value="Изменить">
        <?php
        } else {
        ?> <h2><?= $sth->fetch()['name'] ?></h2>
            <input type="text" name="id" value="<?= $_GET['id'] ?>" hidden><br>
            <input type="number" name="sum" placeholder="Сумма"><br>
            <input type="text" name="description" placeholder="Описание"><br>
            <select name="category" id="">
                <?php
                $sth = $pdo->prepare("SELECT * FROM `money_category`");
                $sth->execute();
                while ($category = $sth->fetch()) {
                    echo '<option value="' . $category["id"] . '">' . $category["name"] . '</option>';
                }
                ?>
            </select><br>
            <input type="submit" name="submit" value="Добавить"><br>
        <?php } ?>
        <a href="index.php">Вернуться</a><br>

</body>

</html>


<?php

$sth = $pdo->prepare("UPDATE `money_account` set active=:active where id=:id");
$sth->execute([
    ":id" => $_GET['id'],
    ":active" => $_POST['activeToggle']
]);


$sth = $pdo->prepare("INSERT INTO `money_operation` (sum,description,idCategory,idAccount) values (:sum,:description,:idCategory,:idAccount) ");
$sth->execute([
    ":sum" => $_POST['sum'],
    ":description" => $_POST['description'],
    ":idCategory" => $_POST['category'],
    ":idAccount" => $_POST['id'],
]);

$balance = 0;
$norm = 0;
$sth = $pdo->prepare("SELECT money_category.name as category, money_category.norm as norm, money_operation.date as date, money_operation.description as description, money_operation.sum as sum FROM money_operation JOIN money_category WHERE money_operation.idCategory = money_category.id AND idAccount =:id");
$sth->execute([
    ":id" => $_GET['id']
]);

while ($row = $sth->fetch()) {
    echo $row['category'] . " " . $row['date'] . " " . "Сумма " .  $row['sum'] .  " " . $row['description'] . " Норма : " . $row['norm'] . "<br>";
    $balance +=  $row['sum'];
}


echo "<hr> Сумма за месяц " . $balance;

$sth = $pdo->prepare("SELECT * FROM `money_account` where id=:id");
$sth->execute([":id" => $_GET['id']]);
$total = $sth->fetch()['balance'];

$sth = $pdo->prepare("SELECT * FROM `money_operation` where id=:id");
$sth->execute([":id" => $_GET['id']]);

$totalBalance = $total + $_POST['sum'];
$sth = $pdo->prepare("UPDATE `money_account` set balance=:balance where id=:id");
$sth->execute(
    [
        ":id" => $_GET['id'],
        ":balance" => $totalBalance
    ]
);
echo "<hr> Остаток " . $totalBalance;
