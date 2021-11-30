<?php
include_once "../../../connection.php";

$sth = $pdo->prepare("DELETE FROM shop_category where id=:id");
$sth->execute(['id' => $_GET['id']]);

header("location:changeCategory.php");
