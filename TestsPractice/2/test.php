<?php
session_start();

include_once "code.php";
$student = new Student();
$idOfNewStudent = $_SESSION['idUser'];

?>


<form action="post.php" method="get">
    <input type="text" name="lastname">
    <button>Добавить фамилию</button>
</form>



<?php


echo "Новый студент добавлен в БД с id = " . $idOfNewStudent . " <br>";

$lastname = $student->getLastName($idOfNewStudent);

echo "Студент с id " . $idOfNewStudent . " - $lastname <br>";
?>
<br>
<form action="update.php" method="get">
    <input type="text" name="id" hidden value="<?= $idOfNewStudent ?>">
    <input type="text" name="lastname">
    <button>Изменить последнюю фамилию</button>
</form>

<?php
if ($_SESSION['newLastname']) {
    echo "Студент с id " . $idOfNewStudent . " - " . $_SESSION['lastname'] . " изменен на " . $_SESSION['newLastname'];
}



?>
<br><br>
<a href="delete.php?id=<?= $idOfNewStudent ?>">Удалить последнего пользователя</a><br>
<?php

if ($_SESSION['delId']) {
    echo "Удален пользователь с id = " . $_SESSION['delId'] . " <br>";
    echo "Студент с id " . $idOfNewStudent . " - " . $_SESSION['delLastname'] . " <br>";
    session_destroy();
}
