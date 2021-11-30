<?php
include_once "../../connection.php";
$sth = $pdo->prepare("INSERT INTO shop_category (name) VALUES (:name)");
$sth->execute([
    ":name" => $_POST['name'],
]);
header('location:createProduct.php');
