<?php 

$id = $_GET['id'];

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (isset($_POST["Reject"])) {
    $reason = $_POST['reason'];
    $sql = "INSERT INTO applicationReport (applicationId, report) VALUES (?, ? );";
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: AdminApplications.inc.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "is", $id, $reason);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    
    $sql = "UPDATE application SET status=? WHERE applicationId=". $id ."; ";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: editApplication.inc.php?error=stmtfailed");
        exit();
    }
    $pending= "pending";
    mysqli_stmt_bind_param($stmt, "s", $pending);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ../includes/AdminApplications.inc.php");
        exit();
}