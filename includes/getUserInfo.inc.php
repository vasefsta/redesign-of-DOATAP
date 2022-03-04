<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';

session_start();

$userId = $_SESSION['userid'];

$sql = "SELECT * FROM users WHERE userId=$userId;";


header("location: ../index.php");
exit();