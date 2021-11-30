<?php
include_once "../../../connection.php";

$sth = $pdo->prepare("DELETE FROM blog_comment where id=:id");
$sth->execute([
    'id' => $_GET['id']
]);
header("location:../../articleItem.php?id=" . $_GET['article_id']);
