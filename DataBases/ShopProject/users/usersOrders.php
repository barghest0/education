<?php
include_once "../connection.php";
$sthUsers = $pdo->prepare(
    "SELECT * FROM shop_users"
);
$sthUsers->execute();
$users = $sthUsers->fetchAll();
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
    <form action="" method="get">
        <select name="user" id="">
            <option value="" disabled>id пользователя</option>

            <?php
            foreach ($users as $user) {
                echo '<option value="' . $user['id'] . '">' . $user['id'] . '</option>';
            }
            ?>
        </select>
        <button type="submit">Получить заказы пользователя</button>
        <a href="users.php">Вернуться назад</a>
    </form>
</body>

</html>

<?php
$sthOrder = $pdo->prepare(
    "SELECT shop_products.name, shop_orders.price, shop_iteminorder.idOrder, shop_users.login, shop_orders.date 
    FROM shop_iteminorder 
    JOIN shop_products on shop_iteminorder.idProduct = shop_products.id 
    JOIN shop_orders on shop_iteminorder.idOrder = shop_orders.id
    JOIN shop_users on shop_orders.idUser = shop_users.id
    where shop_users.id =:id
"
);
$sthOrder->execute([':id' => $_GET['user']]);
while ($userOrders = $sthOrder->fetch()) {
    echo $userOrders['name'] . " " . $userOrders['price'] . "p " . $userOrders['login'] . " " . $userOrders['date'] . "<br>";
}
