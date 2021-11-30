<?php
include_once "../connection.php";



$sthArticle = $pdo->prepare('SELECT blog_article.id, blog_article.title, blog_article.description, blog_article.content, blog_article.date, blog_user.login as user, blog_category.name as category, blog_article.views, blog_article.rating FROM blog_article JOIN blog_user on blog_article.user_id = blog_user.id JOIN blog_category on blog_article.category_id = blog_category.id 
ORDER BY blog_article.views DESC LIMIT 5
');

$sthArticle->execute();
$articles = $sthArticle->fetchAll()

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
    <h1>Топ 5 статей</h1>
    <?php foreach ($articles as $article) {
        echo
        '<a style="display:inline-block; border: solid 1px #000; padding: 10px;
            border-radius:10px;text-decoration:none; color:#000" href="articleItem.php?id=' . $article['id'] . '"><h2>' . $article['title'] . '</h2>
                        <p>' . $article['description'] . '</p>
                        <p>' . $article['content'] . '</p>
                        <p>Категория: ' . $article['category'] . '</p>
                        <p> Автор: ' . $article['user'] . ' </p>
                        <p>Дата: ' . $article['date'] . '  Просмотры: ' . $article['views'] . ' </p>
                        <p>Оценка: ' . $article['rating'] . '</p></a><br><br>';
    } ?>

</body>

</html>