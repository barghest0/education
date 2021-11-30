<?php
$a=7;
$b=8;
include_once "code.php";
$right = 15;
echo "Фактический результат:". $c ."<br>";
echo "Фактический результат:". $right ."<br>";

if ($c == $right) {
    echo '<h3 style="color:green">ОК</h3>';
}else{
    echo '<h3 style="color:red">FAIL</h3>';
}