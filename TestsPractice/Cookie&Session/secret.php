<?php

// if($_SESSION['is_auth'])
if ($_COOKIE['is_auth']) {
    // if ($_SESSION['is_auth']==1) 
    if ($_COOKIE['is_auth'] == 1) {
        echo 'Да';
        echo '<a href="logout.php">Выход</a>';
    } else {
        echo 'УЙДИ!!!';
    }
} else {
    echo 'УЙДИ!!!';
}
