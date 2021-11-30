<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="usersOrders.php">Заказы пользователей</a><br>
    <form action="">
        <input type="hidden" name="isVip" value="1">
        <button type="submit">Получить вип пользователей</button>
    </form>
    <form action="">
        <input type="hidden" name="isVip" value="0">
        <button type="submit">Получить всех пользователей</button>
    </form>


    <?php
    include_once "../connection.php";

    if ($_GET['isVip'] == 1) {
        $sth = $pdo->prepare("SELECT * FROM shop_users where isVip=:isVip");
        $sth->execute([
            ':isVip' => $_GET['isVip']
        ]);
        $users = $sth->fetchAll();
        foreach ($users as $user) {
            echo $user['login'] . " " . ($user['isVip'] == 1 ? "Вип" : "Не вип") . '<br>';
        }
    } else {
        $sth = $pdo->prepare("SELECT * FROM shop_users");
        $sth->execute();
        $users = $sth->fetchAll();
        foreach ($users as $user) {
            echo $user['login'] . " " . ($user['isVip'] == 1 ? "Вип" : "Не вип") . '<br>';
        }
    }
    ?>
    <a href="../index.php">Вернуться на главную</a><br>
</body>


</html>