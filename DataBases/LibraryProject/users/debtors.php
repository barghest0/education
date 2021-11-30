<?php
include_once "../connection.php";

$sth = $pdo->prepare('SELECT lib_users.id, lib_users.name FROM lib_lending 
JOIN lib_users ON lib_lending.id_user = lib_users.id where is_overdue=:is_overdue
');
$sth->execute(
    [':is_overdue' => 'Просрочено']
);
$users = $sth->fetchAll();
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
    <a href="index.php">
        <- Вернуться назад</a>
            <h1>Должники</h1>
            <?php
            foreach ($users as $user) {
                echo '<a href="user.php?id=' . $user['id'] . '">' . $user['name'] . '</a><br>';
            }
            ?>
</body>

</html>