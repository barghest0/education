<?php

include_once "code.php";
$obj = new Ex2();

if ($obj->isStudent('Ivanov')) {
    echo '<h3 style="color:green">ОК</h3>';
}else{
    echo '<h3 style="color:red">FAIL</h3>';
}