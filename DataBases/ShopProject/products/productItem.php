<?php
include_once "../connection.php";
$sth = $pdo->prepare("SELECT shop_products.id, shop_products.name, shop_products.price, shop_products.description, shop_category.name as category FROM shop_products JOIN shop_category on shop_products.idCategory = shop_category.id where shop_products.id=:id ");
$sth->execute([":id" => $_GET['id']]);
$product = $sth->fetch();

$sthUser = $pdo->prepare("SELECT * FROM shop_users where shop_users.login=:login");
$sthUser->execute([":login" => $_COOKIE['user']]);
$user = $sthUser->fetch();
$userId = $user['id'];
$productId = $product['id'];

$sthFeedback = $pdo->prepare("SELECT shop_feedback.message, shop_feedback.evaluation, shop_users.login, shop_products.name FROM shop_feedback
    JOIN shop_users on shop_feedback.idUser = shop_users.id
    JOIN shop_products on shop_feedback.idProduct = shop_products.id
    where idProduct=:idProduct
");
$sthFeedback->execute([':idProduct' => $_GET['id']]);
$sthAvgFeedback = $pdo->prepare("SELECT AVG(evaluation) as avg FROM shop_feedback");
$sthAvgFeedback->execute();
$avg = $sthAvgFeedback->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <h1><?= $product['name'] ?></h1>
    <p><?= $product['description'] ?></p>
    <p>Цена:<?= $product['price'] ?>р</p>
    <form action="actionCart.php" method="GET">
        <input type="text" name="productId" hidden value="<?= $productId ?>">
        <input type="text" name="action" hidden value="add">
        <button type="submit">Добавить в корзину</button>
    </form><br>

    <?php if ($_COOKIE['user']) {
        echo '<form action="./crud/feedback/postFeedback.php" method="GET">
        <input type="text" name="productId" hidden value="' . $productId . '">
        <input type="text" name="userId" hidden value="' . $userId . '">
        <textarea name="message" id="" cols="30" rows="5"></textarea>
        <input placeholder="Оценка" type="number" name="star" min="1" max="5">
        <button type="submit">Оставить отзыв</button>
        </form>';
    } else {
        echo '<a href="../users/login.php">Авторизируйтесь, чтобы оставить отзыв</a>';
    }
    ?>
    <h2>Средняя оценка <?= round($avg[0], 1)  ?></h2>
    <h2>Отзывы</h2>
    <?php
    while ($feedback = $sthFeedback->fetch()) {
        echo "Пользователь: " . $feedback['login'] . "<br>" . "Сообщение: " . $feedback['message'] . "<br>" . "Оценка:" . $feedback['evaluation'] . "<br>";
    }
    ?>
    <a href="products.php">Вернуться к продукции</a>
</body>



</html>