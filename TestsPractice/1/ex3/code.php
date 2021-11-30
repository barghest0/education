<?php
session_start();
include_once "test.php"
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="solution.php" method="post">
        <input type="text" placeholder="a" name="a">x^2
        <input type="text" placeholder="b" name="b">x
        <input type="text" placeholder="c" name="c">
        <button type="submit">Вычислить</button>
    </form>
</body>
</html>

<?php
if (is_array($_SESSION['res'])) {
    foreach ($_SESSION['res'] as $root) {
        echo $root ."<br>";
    }
}else{
    echo "Корней нет";
}

$obj = new Ex3();
if ($obj->isRoots(2,-0.25)) {
    echo '<h3 style="color:green">ОК</h3>';
}else{
    echo '<h3 style="color:red">FAIL</h3>';
}

