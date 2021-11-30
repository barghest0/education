<?php
session_start();
include_once("../connection.php");
unset($_SESSION['errorLogin']);

$sthUser = $pdo->prepare("SELECT * FROM shop_users where id=:id OR login=:login");
$sthUser->execute([
    ":id" => $_GET['id'],
    ":login" => $_COOKIE['user']
]);
$user = $sthUser->fetch();
if (!$_COOKIE['user']) {
    setcookie('user', $user['login'], time() + 3600, "/");
}

$sthOrder = $pdo->prepare(
    "SELECT shop_products.id, shop_products.name, shop_orders.price, shop_iteminorder.idOrder,
    -- shop_users.login, 
    shop_orders.date FROM shop_iteminorder 
    JOIN shop_products on shop_iteminorder.idProduct = shop_products.id 
    JOIN shop_orders on shop_iteminorder.idOrder = shop_orders.id
    -- JOIN shop_users on shop_orders.idUser = shop_users.id
"
);
$sthOrder->execute();
$orders = $sthOrder->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Профиль</h1>
    <h2><?= $user['login'] ?></h2>
    <h2>Заказы</h2>
    <?php
    foreach ($orders as $order) {
        echo $order['name'] . " " .  $order['price']  . "р " .  $order['date'] . ' <a href="order/delOrder.php?id=' . $order['idOrder'] . '">Отменить заказ</a>' . "<br>";
    }
    ?><br>
    <a href="cart.php?id=<?= $user['id'] ?>">Корзина</a><br>
    <a href="./logout.php?login=<?= $user["login"] ?>">Выйти</a><br>
    <a href="../index.php">Вернуться на главную</a>
</body>

</html>