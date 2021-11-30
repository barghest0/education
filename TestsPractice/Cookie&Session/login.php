<?php

$realy_username = 'admin';
$realy_password = '1234';

$username = $_POST['username'];
$password = $_POST['password'];

if ($realy_username === $username && $realy_password === $password) {
    // session_start();
    // $_SESSION['is_auth'] = 1;
    if ($_POST['rememberMe']) {
        setcookie('is_auth', 1, time() + 86400);
    } else {
        setcookie('is_auth', 1);
    }
    header('location:secret.php');
} else {
    echo 'Неправильные логин или пароль';
}
