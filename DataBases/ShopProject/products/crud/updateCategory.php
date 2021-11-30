<?php
include_once "../../connection.php";
$sth = $pdo->prepare("UPDATE `shop_category` set name=:name where id=:id");
$sth->execute([
    ":id" => $_POST['categories'],
    ":name" => $_POST['name'],

]);
header('location:../products.php');