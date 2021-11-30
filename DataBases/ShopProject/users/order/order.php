<?php
include_once "../../connection.php";
session_start();
$sthOrders = $pdo->prepare("SELECT ordersCount FROM shop_products where id=:id ");
$sthOrders->execute([
    ':id' => $_GET['productId'],
]);
$order = $sthOrders->fetch()[0];
$sthUpdateOrder = $pdo->prepare("UPDATE shop_products set ordersCount=:ordersCount where id=:id");
$sthUpdateOrder->execute([
    ':id' => $_GET['productId'],
    ':ordersCount' => $order += 1,
]);

$sthItem = $pdo->prepare("SELECT * FROM shop_products where id=:id");
$sthItem->execute([
    ':id' => $_GET['productId'],
]);
$item = $sthItem->fetch();

$sthOrder = $pdo->prepare("INSERT INTO shop_orders (idUser,price) VALUES (:idUser, :price)");
$sthOrder->execute([
    ':idUser' => $_GET['userId'],
    ":price" => $_GET['quantity'] * $item['price'],
]);

$sthItemInOrder = $pdo->prepare("INSERT INTO shop_iteminorder (idOrder,idProduct,quantity) VALUES (LAST_INSERT_ID(),:idProduct,:quantity)");
$sthItemInOrder->execute([
    ':idProduct' => $_GET['productId'],
    ':quantity' => $_GET['quantity']
]);

for ($i = 0; $i < count($_SESSION['cart']); $i++) {
    if ($_SESSION['cart'][$i] === $_GET['productId']) {
        unset($_SESSION['cart'][$i]);
    }
}


header("location:../profile.php");
