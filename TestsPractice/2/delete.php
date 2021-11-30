<?php
include_once "code.php";
session_start();
$student = new Student();
$_SESSION['delLastname'] = $_SESSION['lastname'];
$student->delete($_GET['id']);
$_SESSION['delId'] = $_GET['id'];
header("location:test.php");
