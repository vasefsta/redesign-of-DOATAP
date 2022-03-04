<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';


$id = $_GET['id']; // get id through query string

$sql = "DELETE FROM application WHERE applicationId=$id;";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../Pages/MyApplications.php?error=stmtfailed");
    exit();
}

mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("location: ../Pages/MyApplications.php?error=deleteSuccess");
    exit();
