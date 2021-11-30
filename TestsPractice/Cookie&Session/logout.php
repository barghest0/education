<?php

session_start();
$_SESSION['is_auth'] = 0;
setcookie('is_auth', 0);
header('location:form.php');
