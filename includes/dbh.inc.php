<?php

$servername = "localhost";

$dBUsername = "root";

$dBPassword = "";

$dBName = "doatap";

// ini_set('display_errors', '1');

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
