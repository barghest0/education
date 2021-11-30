<?php
require_once "connect.php";
$sth = $pdo->prepare("SELECT * FROM `money_account`");
$sth->execute();
while ($row = $sth->fetch())
    if ($row['balance'] < 0) {
        $sth = $pdo->prepare("UPDATE `money_account` set active=0 where id=:id");
        $sth->execute([
            ":id" => $row['id']
        ]);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Счета</h2>
    <form action="addAccount.php" method="post">
        <input type="text" name="name" placeholder="Название счета">
        <input type="number" name="balance" placeholder="Сумма">
        <button type="submit">Добавить</button>
    </form>
    <a href="addCategory.php">Добавить категорию</a><br>
    <a href="transfer.php">Перевести деньги</a><br>
</body>

</html>

<?php


$sth = $pdo->prepare("SELECT * FROM `money_account`");
$sth->execute();

while ($account = $sth->fetch()) {
    $result = $account['main'] ? "Основной" : '<a href="makeMain.php?id=' . $account['id'] . '">Сделать основным</a>';
    $result2 = $account['active'] ? "" : "Неактивен";
    echo  $account['name'] . " " . $account['balance'] . " " . $result . " " . $result2 . " " . '<a href="changeAccount.php?id=' . $account['id'] . '">Изменить</a> ' . '<a href="addOperation.php?id=' . $account['id'] . '">Добавить операцию</a> <br>';
}

$sth = $pdo->prepare("SELECT sum(balance) as sum FROM `money_account`");
$sth->execute();
echo "Общая сумма - " . $sth->fetch()['sum'] . " руб";
