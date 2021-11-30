<?php
include_once "../../../connection.php";
$sth = $pdo->prepare("INSERT INTO shop_products (name, description, price, idCategory) VALUES (:name,:description,:price,:idCategory)");
$sth->execute([
    ":name" => $_POST['name'],
    ':description' => $_POST['description'],
    ':price' => $_POST['price'],
    ':idCategory' => $_POST['categories']
]);
header('location:../../products.php');
