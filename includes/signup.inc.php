<?php

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $afm = $_POST["afm"];
    $adt = $_POST["adt"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email= $_POST["email"];
    $password = $_POST["password"];
    $password_repeat = $_POST["password_repeat"];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    if ( emptyInputSignup( $name, $surname, $afm, $adt, $address, 
    $phone, $email, $password, $password_repeat ) !== false ) {
        header("location: ../Pages/SignupForm/SignUp.php?error=emptyinput");
        exit();
    }
    
    if ( InvaliEmail($email) !== false ) {
        header("location: ../Pages/SignupForm/SignUp.php?error=invalidemail");
        exit();
    }
    
    if ( pwdMatch ($password, $password_repeat) !== false ) {
        header("location: ../Pages/SignupForm/SignUp.php?error=passwddontmatch");
        exit();
    }
    
    if ( afmExists($conn, $afm) !== false ) {
        header("location: ../Pages/SignupForm/SignUp.php?error=afmexists");
        exit();
    }
    
    if ( adtExists($conn, $adt) !== false ) {
        header("location: ../Pages/SignupForm/SignUp.php?error=adtexists");
        exit();
    }
    
    if ( emailExists($conn, $email) !== false ) {
        header("location: ../Pages/SignupForm/SignUp.php?error=emailexists");
        exit();
    }
    
    createUser($conn, $name, $surname, $afm, $adt, $address, $phone, $email, $password);
    

} else {
    header("location: ../Pages/SignupForm/SignUp.php?error=enkamni");
    exit();
}