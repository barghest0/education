<?php
require_once "connect.php";

$sth = $pdo->prepare("SELECT * FROM `money_account` where id=:id");
$sth->execute([":id" => $_GET['id']]);
$account = $sth->fetch();

if ($_POST['submit']) {
    header('location:index.php');
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
    <form action="" method="post">
        <?php
        if ($account['active'] == 0) {
            echo "Ваш счет неактивен <br>";
        ?> <select name="activeToggle" id=""><br>
                <option value="1">Активный</option>
                <option value="0">Неактивный</option>
            </select><br>
            <input type="submit" name="submit" value="Изменить"><br>
        <?php
        } else {
        ?> <input type="text" name="id" value="<?= $_GET['id'] ?>" hidden><br>
            <input type="text" name="name" value="<?= $account['name'] ?>"><br>
            <input type="number" value="<?= $account['balance'] ?>" disabled><br>
            <select name="active" id=""><br>
                <option value="1">Активный</option>
                <option value="0">Неактивный</option>
            </select><br>
            <input type="submit" name="submit" value="Изменить"><br>
        <?php } ?>
        <a href="index.php">Вернуться</a>

    </form>
</body>

</html>


<?php
$sth = $pdo->prepare("UPDATE `money_account` set active=:active where id=:id");
$sth->execute([
    ":id" => $_GET['id'],
    ":active" => $_POST['activeToggle']
]);


$sth = $pdo->prepare("UPDATE `money_account` set name=:name, active=:active where id=:id");
$sth->execute([
    ":id" => $_POST['id'],
    ":name" => $_POST['name'],
    ":active" => $_POST['active'],
]);





?>