<?php
require_once "connect.php";

$sth = $pdo->prepare("UPDATE `money_account` set main=0");
$sth->execute();

$sth = $pdo->prepare("UPDATE `money_account` set main=1 where id=:id");
$sth->execute([
    ":id" => $_GET['id']
]);
header("location:index.php");
