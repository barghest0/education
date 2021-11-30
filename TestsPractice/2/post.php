<?php
include_once "code.php";
session_start();
$student = new Student();
$idOfNewStudent = $student->add($_GET['lastname']);
$_SESSION['idUser'] = $idOfNewStudent;
$_SESSION['lastname'] = $_GET['lastname'];
header("location:test.php");