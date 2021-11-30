<?php
include_once "../../../connection.php";

$sth = $pdo->prepare("INSERT INTO shop_feedback (message,idUser, idProduct,evaluation) VALUES (:message,:userId, :productId,:star) ");
$sth->execute([
    ':message' => $_GET['message'],
    ':userId' => $_GET['userId'],
    ':productId' => $_GET['productId'],
    ':star' => $_GET['star'],
]);

header("location:../../productItem.php?id=" . $_GET['productId']);
