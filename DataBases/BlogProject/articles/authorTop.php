<?php
include_once "../connection.php";



$sth = $pdo->prepare('SELECT AVG(blog_article.rating) as rating, blog_user.login FROM blog_article JOIN blog_user on blog_article.user_id = blog_user.id 
where blog_article.rating >=3 GROUP BY blog_user.login
');

$sth->execute();
$users = $sth->fetchAll()

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
    <h1>Топ авторов</h1>
    <?php foreach ($users as $user) {
        echo $user['login'] . " Средняя оценка статей: " . round($user['rating'], 2);
    } ?>

</body>

</html>