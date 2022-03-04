<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

session_start();

$userId = $_SESSION["userid"];
$name = $_POST['name'];
$surname = $_POST['surname'];
$afm = $_POST['afm'];
$adt = $_POST['adt'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];

UpdateMe($conn, $userId, $name, $surname, $afm, $adt, $address, $phone, $email);