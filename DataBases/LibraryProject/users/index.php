<?php
include_once "../connection.php";

$sth = $pdo->prepare('SELECT * FROM lib_users');
$sth->execute();
$users = $sth->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="../index.php">
        <- Вернуться назад</a>
            <h1>Пользователи</h1>
            <a href="debtors.php">Список должников</a><br><br>
            <?php
            foreach ($users as $user) {
                if ($user['age'] > 18) {
                    $sth = $pdo->prepare('SELECT lib_users.id, lib_users.name FROM lib_lending 
                    JOIN lib_users ON lib_lending.id_user = lib_users.id where is_overdue=:is_overdue and lib_lending.id_user=:id_user');
                    $sth->execute(
                        [
                            ':is_overdue' => 'Просрочено',
                            ':id_user' => $user['id']
                        ]
                    );
                    $debUser = $sth->fetch();
                    if (!$debUser) {
                        $sth2 = $pdo->prepare('DELETE FROM lib_users where id=:id');
                        $sth2->execute([
                            ':id' => $user['id']
                        ]);
                    }
                }
                echo 'Имя: ' . $user['name'] . '<br> ' . 'Возраст: ' . $user['age'] . '<br> ' . '<a href="user.php?id=' . $user['id'] . '">Перейти к пользователю -></a><br>';
            }
            ?>

</body>

</html>