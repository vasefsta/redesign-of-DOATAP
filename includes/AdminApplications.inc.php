<?php
	include_once('../header/header-Admin.php');

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

session_start();
$usersId = $_SESSION["userid"];

$sql = "SELECT * FROM application WHERE status='submitted'";

if ($result = mysqli_query($conn, $sql)) {
    echo "<table class='center-table' border='1'>";
    echo "<tr>";
    echo "<td>Αριθμός Αίτησης</td>";
    echo "<td>Είδος Πτυχίου</td>";
    echo "<td>Τίτλος Σπουδών</td>";
    echo "<td>Προβολή</td>";

    echo "</tr>";

    while ($row = mysqli_fetch_row($result)) {
        echo "<tr>";
        echo "<td>$row[0]</td>";
        if ($row[2] == NULL) {
            echo "<td>Δεν συμπληρώθηκε</td>";
        } else {
            echo "<td>$row[2]</td>";
        }
        if ($row[8] == NULL) {
            echo "<td>Δεν συμπληρώθηκε</td>";
        } else {
            echo "<td>$row[8]</td>";
        }
        echo "<td><a href='reviewApplicationAdmin.inc.php?id=$row[0]'>Προβολή</a></td>";

        echo "</tr>";
    }
    echo "</table>";
}
