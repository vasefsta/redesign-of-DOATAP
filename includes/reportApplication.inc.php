<?php

require_once 'dbh.inc.php';

$applicationId = $_GET['id'];

if(isset($_POST['accept']) ){
    $sql = "UPDATE application SET status=? WHERE applicationId=". $applicationId ."; ";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: editApplication.inc.php?error=stmtfailed");
        exit();
    }
    $accept = "accepted";
    mysqli_stmt_bind_param($stmt, "s", $accept);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);


    header("location: AdminApplications.inc.php?id=$id");
    exit();

} else if(isset($_POST['reject'])){
?>
     <form action="../Pages/Admin/RejectApplication.php" method="post" id="loading">
            <select name="Option">
                <option value="">Λόγος Απόρριψης αίτησης</option>
                <option value="Λάθος τίτλος σπουδών">Λάθος τίτλος σπουδών</option>
                <option value="Ο τίτλος σπουδών δεν αναγνωρίζεται από τον ΔΟΑΤΑΠ">Ο τίτλος σπουδών δεν αναγνωρίζεται από τον ΔΟΑΤΑΠ</option>
                <option value="Λάθος όνομα πανεπιστημίου">Λάθος όνομα πανεπιστημίου</option>
                <option value="Το πανεπιστήμιο δεν αναγνωρίζεται από τον ΔΟΑΤΑΠ">Το πανεπιστήμιο δεν αναγνωρίζεται από τον ΔΟΑΤΑΠ</option>
            </select>
            <input type="submit" name="submit" value="Επιλογή" />
            <input type="submit" name="cancel" value="Ακύρωση" />
        </form>

<?php 
} else if(isset($_POST['pending']) ){
    
    $sql = "UPDATE application SET status=? WHERE applicationId=". $applicationId ."; ";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: editApplication.inc.php?error=stmtfailed");
        exit();
    }
    $pending= "pending";
    mysqli_stmt_bind_param($stmt, "s", $pending);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);


    header("location: AdminApplications.inc.php?id=$id");
    exit();
}

?>