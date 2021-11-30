<?php
include_once  "../../connection.php";
$sth = $pdo->prepare("DELETE FROM shop_iteminorder where idOrder=:idOrder");
$sth->execute([':idOrder' => $_GET['id']]);
header("location:../profile.php");
