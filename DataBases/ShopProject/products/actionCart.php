<?php
session_start();
// unset($_SESSION['cart']);
if ($_GET['action'] === 'add') {
    if (!$_SESSION['cart']) {
        $_SESSION['cart'][] = $_GET['productId'];
        header("location:../users/profile.php");
    } else if (in_array($_GET['productId'], $_SESSION['cart'])) {
        header("location:../users/profile.php");
    }
} else if ($_GET['action'] === 'del') {
    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i] === $_GET['productId']) {
            unset($_SESSION['cart'][$i]);
            header("location:../users/cart.php?id=" . $_GET['id']);
        } else {
            header("location:../users/cart.php?id=" . $_GET['id']);
        }
    }
}
