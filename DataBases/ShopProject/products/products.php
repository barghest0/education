<?php
include_once "../connection.php";

$sthProducts = $pdo->prepare("SELECT shop_products.id, shop_products.name, shop_products.ordersCount, shop_products.price, shop_products.description, shop_category.name as category FROM shop_products JOIN shop_category on shop_products.idCategory = shop_category.id ");
$sthProducts->execute();
$products = $sthProducts->fetchAll();

$sthCategory = $pdo->prepare("SELECT * FROM shop_category");
$sthCategory->execute();
$categories = $sthCategory->fetchAll();

function order($pdo, $orderCol, $direction)
{
    $sthProducts = $pdo->prepare("SELECT shop_products.id, shop_products.name, shop_products.ordersCount, shop_products.price, shop_products.description, shop_category.name as category FROM shop_products JOIN shop_category on shop_products.idCategory = shop_category.id ORDER BY " . $orderCol . " " .  $direction);
    $sthProducts->execute();
    $products = $sthProducts->fetchAll();
    return $products;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <form action="">
        <input type="text" placeholder="Поиск" name="search">
        <button type="submit">Найти</button>
        <button type="submit">Очистить</button>
    </form>
    <form action="" method="get">
        <select name="category">
            <option selected disabled>Выберите категории</option>
            <?php
            foreach ($categories as  $category) {
                echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
            }
            ?>
        </select>
        <button type="submit">Найти</button>
        <button type="submit">Очистить</button>
    </form>

    <form action="">
        <select name="order" id="">
            <option value="price">Цена</option>
            <option value="ordersCount">Заказы</option>
        </select>
        <button type="submit">Сортировать</button>
    </form>
    <a href="<?= $_SERVER['PHP_SELF'] . "?order=" . $_GET['order'] ?>&direction=ASC">Сортировать по возрастанию</a>
    <a href="<?= $_SERVER['PHP_SELF'] . "?order=" . $_GET['order'] ?>&direction=DESC">Сортировать по убыванию</a><br><br>
    <?php
    if ($_GET['category']) {
        $sth = $pdo->prepare('SELECT shop_products.id, shop_products.ordersCount, shop_products.name, shop_products.price, shop_products.description, shop_category.name as category FROM shop_products JOIN shop_category on shop_products.idCategory = shop_category.id where shop_products.idCategory=:category');
        $sth->execute([
            ":category" => $_GET['category'],
        ]);
        while ($product = $sth->fetch()) {
            echo '<a href="productItem.php?id=' . $product['id'] . '">Заказы: ' . $product['ordersCount'] . ' ' . $product['name'] . " " .  $product['price'] . "р " . $product['category'] . '</a>' . '<a href="./crud/productItem/changeProductItem.php?id=' . $product['id'] . '"> Изменить</a>' . '<a href="./crud/productItem/deleteProductItem.php?id=' . $product['id'] . '"> Удалить</a><br>';
        }
    } else if ($_GET['search']) {

        $sth = $pdo->prepare('SELECT shop_products.id, shop_products.ordersCount, shop_products.name, shop_products.price, shop_products.description, shop_category.name as category FROM shop_products JOIN shop_category on shop_products.idCategory = shop_category.id where shop_products.name LIKE :name');
        $sth->execute([
            ":name" => "%" . $_GET['search'] . "%",
        ]);
        while ($product = $sth->fetch()) {
            echo '<a href="productItem.php?id=' . $product['id'] . '">Заказы: ' . $product['ordersCount'] . ' ' . $product['name'] . " " .  $product['price'] . "р " . $product['category'] . '</a>' . '<a href="./crud/productItem/changeProductItem.php?id=' . $product['id'] . '"> Изменить</a>' . '<a href="./crud/productItem/deleteProductItem.php?id=' . $product['id'] . '"> Удалить</a><br>';
        }
    } else if ($_GET['order']) {
        $product = order($pdo, $_GET['order'], $_GET['direction']);
        foreach ($product as $produc) {
            echo '<a href="productItem.php?id=' . $produc['id'] . '">Заказы: ' . $produc['ordersCount'] . ' ' . $produc['name'] . " " .  $produc['price'] . "р " . $produc['category'] . '</a>' . '<a href="./crud/productItem/changeProductItem.php?id=' . $produc['id'] . '"> Изменить</a>' . '<a href="./crud/productItem/deleteProductItem.php?id=' . $product['id'] . '"> Удалить</a><br>';
        }
    } else {
        foreach ($products as $product) {
            echo '<a href="productItem.php?id=' . $product['id'] . '">Заказы: ' . $product['ordersCount'] . ' ' . $product['name'] . " " .  $product['price'] . "р " . $product['category'] . '</a>' . '<a href="./crud/productItem/changeProductItem.php?id=' . $product['id'] . '"> Изменить</a>' . '<a href="./crud/productItem/deleteProductItem.php?id=' . $product['id'] . '"> Удалить</a><br>';
        }
    }
    ?>
    <a href="./crud/productItem/createProductItem.php">Добавить товар</a><br>
    <a href="./crud/category/changeCategory.php">Изменить категории</a><br>
    <a href="../index.php">Вернуться на главную</a><br>

</body>

</html>