<?php
session_start();
include_once "../connection.php";
$sth = $pdo->prepare("SELECT * FROM shop_users where login=:login AND email=:email AND password=:password");
$sth->execute([
    ':login' => $_POST['login'],
    ':email' => $_POST['email'],
    ':password' => $_POST['password'],
]);
$user = $sth->fetch();
if ($user) {
    header('location:profile.php?id=' . $user['id']);
} else {
    $_SESSION['errorLogin'] = "Неправильно введены данные";
    header('location:login.php');
}
