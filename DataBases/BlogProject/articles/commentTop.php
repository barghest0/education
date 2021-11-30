<?php
include_once "../connection.php";


$sthCategory = $pdo->prepare("SELECT * FROM blog_category");
$sthCategory->execute();
$categories = $sthCategory->fetchAll();

$sthUsers = $pdo->prepare("SELECT DISTINCT blog_user.login, blog_user.id FROM blog_comment 
JOIN blog_user on blog_comment.user_id = blog_user.id
JOIN blog_article on blog_comment.article_id = blog_article.id
JOIN blog_category on blog_article.category_id = blog_category.id
where blog_article.category_id = :id LIMIT 10 
");


$sthUsers->execute([
    ':id' => $_GET['category']
]);

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
    <a href="articles.php">Вернуться к статьям</a>
    <h1>Топ комментаторов</h1>
    <h3>Категория</h3>
    <form action="" method="get">
        <select name="category" id="">
            <option value="" hidden></option>
            <?php
            foreach ($categories as $category) {
                echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
            }
            ?>
        </select>
        <button type="submit">Найти</button>
    </form>
    <?php
    foreach ($users as $user) {
        echo $user['login'] . "<br>";
    }
    ?>

</body>

</html>