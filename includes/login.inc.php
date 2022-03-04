<?php

if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if ( emptyInputLogin($email, $password) !== false ) {
        header("location: ../Pages/LoginForm/Login.php?error=emptyinput");
        exit();
    }

    if($email == "admin@admin.com" && $password == "admin"){
        session_start();
        $_SESSION["name"] = "Admin";

        header("location: ../Pages/Admin/AdminPage.php");
        exit();
    }

    loginUser($conn, $email, $password);

    
} else {
    header("location: ../Pages/LoginForm/Login.php");
    exit();
}