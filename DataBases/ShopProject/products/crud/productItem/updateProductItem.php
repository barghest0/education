<?php
include_once "../../../connection.php";
$sth = $pdo->prepare("UPDATE `shop_products` set name=:name, description=:description, price=:price, idCategory=:category where id=:id");
$sth->execute([
    ":id" => $_POST['id'],
    ":name" => $_POST['name'],
    ':description' => $_POST['description'],
    ':price' => $_POST['price'],
    ':category' => $_POST['categories']
]);
header('location:../../products.php');
