<?php
include_once "../../../connection.php";

$sthRating = $pdo->prepare("SELECT rating FROM blog_article where id=:article_id");
$sthRating->execute([
    ':article_id' => $_GET['article_id'],
]);

$sthCount = $pdo->prepare("SELECT COUNT(*) as count FROM blog_comment where article_id=:article_id");
$sthCount->execute([
    ':article_id' => $_GET['article_id'],
]);
$count = $sthCount->fetch()['count'];
if ($count == 0) {
    $count += 1;
} else if ($count == 1) {
    $count = 2;
}

$sthRatingUpdate = $pdo->prepare("UPDATE blog_article set rating = :rating where  id = :article_id");
$sthRatingUpdate->execute([
    ':rating' => ($sthRating->fetch()['rating'] + $_GET['rating']) / $count,
    ':article_id' => $_GET['article_id'],
]);



$sth = $pdo->prepare("INSERT INTO blog_comment (comment, user_id, article_id, rating) VALUES (:comment, :user_id, :article_id, :rating) ");
$sth->execute([
    ':comment' => $_GET['comment'],
    ':user_id' => $_GET['user_id'],
    ':article_id' => $_GET['article_id'],
    ':rating' => $_GET['rating'],
]);

header("location:../../articleItem.php?id=" . $_GET['article_id']);
