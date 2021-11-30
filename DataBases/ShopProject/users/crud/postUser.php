<?php
session_start();
include_once "../../connection.php";

if ($_POST['password'] !== $_POST['confPassword']) {
    $_SESSION['errorPassword'] = 'Пароли не совпадают';
    header('location:../login/register.php');
} else {
    $sth = $pdo->prepare("INSERT INTO shop_users (login, email, password) VALUES (:login,:email,:password)");
    $sth->execute([
        ":login" => $_POST['login'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password'],
    ]);

    header('location:../login/login.php');
}
