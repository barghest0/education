<?php
include_once "code.php";
session_start();
$student = new Student();
$_SESSION['newLastname'] = $student->updateLastName($_GET['lastname'], $_GET['id']);

header("location:test.php");
