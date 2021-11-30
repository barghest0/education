<?php
session_start();
if ($_COOKIE['user']) {
    header("location:profile.php?login=" . $_COOKIE['user']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Вход</h1>
    <form action="checkLoginInfo.php" method="post">
        <input type="text" name="login" placeholder="Логин"><br>
        <input type="text" name="email" placeholder="Email"><br>
        <input type="text" name="password" placeholder="Пароль"><br>
        <?= $_SESSION['errorLogin'] ? $_SESSION['errorLogin'] : null ?><br>
        <button type="submit">Войти</button>
    </form>
    <a href="register.php">Зарегистрироваться</a><br>
    <a href="../index.php">Вернуться на главную</a>
</body>

</html>