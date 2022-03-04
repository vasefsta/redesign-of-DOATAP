<?php

$id = $_GET['id'];  

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (isset($_POST["Save"])) {
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
    session_start();
    $userId = $_SESSION['userid'];
    UpdateForm($conn,$userId, $id, $afm, $adt, $name, $surname, $mobile, $email, $address, $type, $uni_tei, $department,
    $country, $university, $ects, $title, $regDate, $gradDate, $adtPhoto, $gradPhoto, $ectsPhoto);
    
} else if (isset($_POST["Submit"])) {
    
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

    session_start();
    $userId = $_SESSION['userid'];


    SubmitForm($conn, $userId, $id, $afm, $adt, $name, $surname, $mobile, $email, $address, $type, $uni_tei, $department,
    $country, $university, $ects, $title, $regDate, $gradDate, $adtPhoto, $gradPhoto, $ectsPhoto);


}
