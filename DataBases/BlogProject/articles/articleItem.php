<?php
include_once "../connection.php";

$sth = $pdo->prepare('SELECT blog_article.id, blog_article.title, blog_article.description, blog_article.content, blog_article.date, blog_user.login as user, blog_category.name as category, blog_article.views, blog_article.rating FROM blog_article 
JOIN blog_user on blog_article.user_id = blog_user.id 
JOIN blog_category on blog_article.category_id = blog_category.id
where blog_article.id = :id
');

$sth->execute([":id" => $_GET['id']]);

$article = $sth->fetch();


$sthUpdate = $pdo->prepare("UPDATE blog_article set views = :views where id = :article_id");
$sthUpdate->execute([
    ':views' => $article['views'] += 1,
    ':article_id' => $_GET['id'],

]);


$sthComment = $pdo->prepare('SELECT blog_comment.comment,  blog_comment.rating, blog_user.ban, blog_comment.id as comment_id, blog_user.login as user FROM blog_comment JOIN blog_user on blog_comment.user_id = blog_user.id where blog_comment.article_id = :id');
$sthComment->execute([":id" => $_GET['id']]);


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
    <h1><?= $article['title'] ?></h1>
    <h2>Описание статьи: <?= $article['description'] ?></h2>
    <p>Текст статьи: <?= $article['content'] ?></p>
    <p>Автор: <?= $article['user'] ?></p>
    <p>Просмотры: <?= $article['views'] ?></p>
    <p>Дата: <?= $article['date'] ?></p>
    <p>Оценка: <?= $article['rating'] ?></p>
    <?php if (true) {
        echo '<form action="./crud/comment/postComment.php" method="GET">
        <input type="text" name="article_id" hidden value="' . $_GET['id'] . '">
        <input type="text" name="user_id" hidden value="' . 2 . '">
        <textarea name="comment" id="" cols="30" rows="5"></textarea>
        <input placeholder="Оценка" type="number" name="rating" min="1" max="5">
        <button type="submit">Оставить отзыв</button>
        </form>';
    } else {
        echo '<a href="../users/login.php">Авторизируйтесь, чтобы оставить отзыв</a>';
    }
    ?>
    <h2>Отзывы</h2>
    <?php
    while ($comment = $sthComment->fetch()) {
        echo "Пользователь: " . $comment['user'] . "<br>" . "Сообщение: " . $comment['comment'] . "<br>" . "Оценка:" . $comment['rating'] . "<br> " . ($comment['ban'] == 1 ? '<a href="./crud/comment/deleteComment.php?id=' . $comment['comment_id'] . '&article_id=' . $_GET['id'] . '">Пользователь забанен, удалить комментарий</a>' : "") . "<br><br>";
    }
    ?>
</body>

</html>