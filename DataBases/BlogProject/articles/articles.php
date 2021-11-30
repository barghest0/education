<?php
include_once "../connection.php";

$search = $_GET['search'];
$category = $_GET['category'];



$sthCategory = $pdo->prepare("SELECT * FROM blog_category");
$sthCategory->execute();
$categories = $sthCategory->fetchAll();

$sthSingleCategory = $pdo->prepare("SELECT * FROM blog_category where id=:id");
$sthSingleCategory->execute(['id' => $category]);
$singleCategory = $sthSingleCategory->fetch();

$sthArticle = $pdo->prepare('SELECT blog_article.id, blog_article.title, blog_article.description, blog_article.content, blog_article.date, blog_user.login as user, blog_category.name as category, blog_article.views, blog_article.rating FROM blog_article JOIN blog_user on blog_article.user_id = blog_user.id JOIN blog_category on blog_article.category_id = blog_category.id 
where blog_article.category_id = :category_id AND (blog_article.content LIKE :search OR blog_article.title LIKE :search)
');

$sthArticle->execute([
    ':search' => "%" . $search . "%",
    ':category_id' => $category
]);
$articles = $sthArticle->fetchAll();


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
    <h1>Статьи</h1>
    <form action="" method="get">
        <input type="text" name='search' placeholder="Найти">
        <select name="category" id="">
            <option value="<?= $singleCategory['id'] ?>" hidden><?= $singleCategory['name'] ?></option>
            <?php
            foreach ($categories as $category) {
                echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
            }
            ?>
        </select>
        <button>Найти</button><br><br><a href="articlesTop.php">Топ 5 статей</a> <a href="authorTop.php">Топ авторов</a> <a href="commentTop.php">Топ комментаторов</a><br><br>
    </form>
    <?php foreach ($articles as $article) {
        echo
        '<a style="display:inline-block; border: solid 1px #000; padding: 10px;
            border-radius:10px; text-decoration:none;color:#000" href="articleItem.php?id=' . $article['id'] . '"><h2>' . $article['title'] . '</h2>
                        <p>' . $article['description'] . '</p>
                        <p>' . $article['content'] . '</p>
                        <p>Категория: ' . $article['category'] . '</p>
                        <p> Автор: ' . $article['user'] . ' </p>
                        <p>Дата: ' . $article['date'] . '  Просмотры: ' . $article['views'] . ' </p>
                        <p>Оценка: ' . $article['rating'] . '</p></a><br><br>';
    } ?>
</body>

</html>