<?php

$afm = $_POST["afm"];
$adt = $_POST["adt"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$address = $_POST["address"];
$type = $_POST["type"];
$uni_tei = $_POST["uni_tei"];
$department = $_POST["department"];
$country = $_POST["country"];
$university = $_POST["university"];
$ects = $_POST["ects"];
$title = $_POST["title"];
$regDate = $_POST["regDate"];
$gradDate = $_POST["gradDate"];
$adtPhoto = $_POST["adtPhoto"];
$gradPhoto = $_POST["gradPhoto"];
$ectsPhoto = $_POST["ectsPhoto"];

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (isset($_POST["Save"])) {
    $status = "saved";
} else if (isset($_POST["Submit"])) {
    $status = "submitted";

}

fillForm($conn, $afm, $adt, $name, $surname, $mobile, $email, $address, $type, $uni_tei, $department,
    $country, $university, $ects, $title, $regDate, $gradDate, $adtPhoto, $gradPhoto, $ectsPhoto, $status);