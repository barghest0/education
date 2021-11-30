<?php
include_once "../../connection.php";
$sth = $pdo->prepare("SELECT * FROM shop_category");
$sth->execute();
$categories = $sth->fetchAll();

$sth = $pdo->prepare("SELECT * FROM `shop_products` where id=:id");
$sth->execute([":id" => $_GET['id']]);
$product = $sth->fetch();

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
    <h1>Изменение товара</h1>
    <form action="updateProductItem.php" method="post">
            <input type="text" name="id" value="<?= $_GET['id'] ?>" hidden><br>
            <input type="text" name="name" value="<?= $product['name'] ?>"><br>
            <input type="number" name="price"  value="<?= $product['price'] ?>" ><br>
            <input type="text" name="description" value="<?= $product['description'] ?>"><br>
            <select name="categories" id="">
            <?php
                foreach ($categories as $category){
                    echo '<option value="'.$category['id'].'" id="">'.$category['name'].'</option>';
                }
            ?>
            </select><br>
            <button type="submit">Изменить товар</button><br>
        <a href="../products.php">Вернуться назад</a>

    </form>
</body>

</html>
