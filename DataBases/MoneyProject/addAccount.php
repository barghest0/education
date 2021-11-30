<?php
require_once "connect.php";
$sth = $pdo->prepare("INSERT INTO `money_account` (name,balance) values (:name,:balance)");
$sth->execute([
    ":name" => $_POST['name'],
    ":balance" => $_POST['balance']
]);
header("location:index.php");
