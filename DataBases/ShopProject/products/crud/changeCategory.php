<?php
include_once "../../connection.php";
$sth = $pdo->prepare("SELECT * FROM shop_category");
$sth->execute();
$categories = $sth->fetchAll();

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
    <h1>Изменение категории</h1>
    <form action="updateCategory.php" method="post">
            <select name="categories" id="">
            <?php
                foreach ($categories as $category){
                    echo '<option value="'.$category['id'].'" id="">'.$category['name'].'</option>';
                }
            ?>
            </select><br>
            <input type="text" name="name" placeholder="Новое название"><br>
            <button type="submit">Изменить категорию</button><br>
        <a href="../products.php">Вернуться назад</a>

    </form>
</body>

</html>
