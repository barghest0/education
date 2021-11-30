<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Регистрация</h1>
    <form action="./crud/postUser.php" method="post">
    <input type="text" name="login" placeholder="Логин"><br>
    <input type="text" name="email" placeholder="Email"><br>
    <input type="password" name="password" placeholder="Пароль"><br>
    <input type="password" name="confPassword" placeholder="Подтвердите пароль"><br>
    <?php 
    if ($_SESSION) {
        foreach($_SESSION as $error){
            echo  $error ."<br>";
        }
    } 
    ?>
    <button type="submit">Зарегистрироваться</button>
    </form>
    <a href="login.php">Войти</a>
</body>
</html>
</html>



