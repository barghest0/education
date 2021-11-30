<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <select name="transferSrc">
            <?php
            require_once "connect.php";
            $sth = $pdo->prepare("SELECT * FROM `money_account` where main = 1");
            $sth->execute();
            $transfer = $sth->fetch();
            echo '<option value="' . $transfer['id'] . '">' . $transfer['name'] . '</option>';
            ?>
        </select> Основной счет<br>
        <select name="transferDst">
            <?php
            require_once "connect.php";
            $sth = $pdo->prepare("SELECT * FROM `money_account` where main = 0");
            $sth->execute();
            while ($transfer = $sth->fetch()) {
                echo '<option value="' .  $transfer['id'] . '">' . $transfer['name'] . '</option>';
            }
            ?>
        </select><br>
        <input type="text" name="sum" placeholder="Сумма перевода"><br>
        <input type="submit" value="Перевести"><br>
        <a href="index.php">Вернуться</a>
    </form>
</body>

</html>
<?php



if ($transfer['active'] == 0) {
    die("Ваш счет неактивен");
} else {
    $sth = $pdo->prepare("INSERT INTO `money_transfer` (sum, idSrc, idDst) values (:sum,:idSrc,:idDst)");
    $sth->execute([
        ":sum" => $_POST['sum'],
        ":idSrc" => $_POST['transferSrc'],
        ":idDst" => $_POST['transferDst'],
    ]);

    $sth = $pdo->prepare("SELECT money_account.name as src, money_account.active as active FROM money_transfer 
    JOIN money_account ON money_transfer.idSrc = money_account.id");
    $sth->execute();
    $transfer = $sth->fetch();

    $sth = $pdo->prepare("SELECT money_account.name as dst , money_transfer.sum as sum, money_transfer.date as date FROM money_transfer 
    JOIN money_account ON money_transfer.idDst = money_account.id");
    $sth->execute();
    while ($transfer2 = $sth->fetch()) {
        echo " Перевод с " . $transfer['src'] . " на " . $transfer2['dst'] . " " . $transfer2['date'] . " Сумма " . $transfer2['sum'] . "<br>";
    }
    $sth = $pdo->prepare("SELECT * FROM `money_account` where  id=:idSrc");
    $sth->execute([
        ":idSrc" => $_POST['transferSrc']
    ]);
    $sum = $sth->fetch();
    $transferBalanceSrc = $sum['balance'] - $_POST['sum'];

    $sth = $pdo->prepare("SELECT * FROM `money_account` where id=:idDst");
    $sth->execute([
        ":idDst" => $_POST['transferDst']
    ]);
    $sum = $sth->fetch();
    $transferBalanceDst = $sum['balance'] + $_POST['sum'];


    $sth = $pdo->prepare("UPDATE `money_account` set balance=:sumSrc where id=:idSrc");
    $sth->execute([
        ":idSrc" => $_POST['transferSrc'],
        ":sumSrc" => $transferBalanceSrc
    ]);
    $sth = $pdo->prepare("UPDATE `money_account` set balance=:sumDst where id=:idDst");
    $sth->execute([
        ":idDst" => $_POST['transferDst'],
        ":sumDst" => $transferBalanceDst
    ]);
}
