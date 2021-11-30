<?php

session_start();

$a= $_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];


$D = ($b**2)-(4*$a*$c);

if ($D>0) {
    $res1 = (-$b + sqrt($D))/(2*$a);
    $res2 = (-$b - sqrt($D))/(2*$a);
    $_SESSION['res'] = [$res1,$res2];
}else if($D==0){    
    $res1 = -$b + sqrt($D)/2*$a;
    $_SESSION['res'] = [$res];
}else{
    $_SESSION['res'] = "Корней нет";    
}


header('location:code.php');