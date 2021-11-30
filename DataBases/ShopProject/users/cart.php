<?php
session_start();
include_once "../connection.php";

$cart = $_SESSION['cart'];

$products;
foreach ($cart as $key => $value) {
    $sth = $pdo->prepare("SELECT * FROM shop_products where id=:id");
    $sth->execute([
        ':id' => $value
    ]);
    $products[] = $sth->fetch();
}
if (!$_COOKIE['user']) {
    header("location:login/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <h1>Корзина</h1>
    <?php
    if ($products) {
        foreach ($products as $key => $value) {
            echo  $value['name'] . " " . $value['price'] .
                ' <a href="../products/actionCart.php?id=' . $_GET['id'] . '&action=del&productId=' . $value['id'] . '">Удалить</a> ' .
                ' <form action="./order/order.php" method="get">
            <input type="number" min="1" name="quantity" id="" placeholder="Количество">
            <input type="number" name="userId" value="' . $_GET['id'] . '" id=""  hidden>
            <input type="number" name="productId" value="' . $value['id'] . '" id=""  hidden>
            <button type="submit">Заказать</button>
        </form> ';
        }
    } else {
        echo "<h2>Корзина пуста</h2>";
    }
    ?><br>

    <a href="profile.php">Вернуться к профилю</a>
</body>

</html>