<?php
include_once "../../../connection.php";

$sth = $pdo->prepare("DELETE FROM shop_products where id=:id");
$sth->execute(['id' => $_GET['id']]);

header("location:../../products.php");
