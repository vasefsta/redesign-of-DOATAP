<?php

session_start();
$userId = $_SESSION["userid"];

require_once '../../includes/dbh.inc.php';
require_once '../../includes/functions.inc.php';

$sql = "SELECT * FROM users WHERE usersId=$userId;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

    <style>
        nav img {
            position: static !important;
        }

        html {
            background-color: #f2f2f2;
        }

        .main {
            padding: 100px 0px !important;
        }
        .breadcrumb {
        background-color: #f2f2f2 !important;
      }
      ul.breadcrumb {
      margin-left: 14.2%;
      margin-bottom: 3%;
      padding: 10px 16px;
      list-style: none;
      background-color: none;
      }
      ul.breadcrumb li {
      display: inline;
      font-size: 18px;
      }
      ul.breadcrumb li+li:before {
      padding: 8px;
      color: #585858;
      content: "/\00a0";
      }
      ul.breadcrumb li a {
      color: #478ac9;
      text-decoration: none;
      }
      ul.breadcrumb li a:hover {
      color: #01447e;
      text-decoration: underline;
      }
    </style>
</head>

<body>

    <?php
    include_once('../../navbar/navbar.php');
    ?>
    <div class="main">
    <ul class="breadcrumb">
      <li><a href="../../index.php">Αρχική</a></li>
      <li style="color: #585858;">Το Προφίλ μου</li>
    </ul>

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Το Προφίλ μου</h2>
                        <form action="../../Pages/Profile/EditMe.php" method="post" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Όνομα" value="<?php echo "$row[1]"; ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label for="surname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="surname" id="surname" placeholder="Επίθετο" value="<?php echo "$row[2]"; ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label for="afm"><i class="zmdi zmdi-account-box-mail material-icons-name"></i></i></label>
                                <input type="text" name="afm" id="your_name" placeholder="Α.Φ.Μ." value="<?php echo "$row[3]"; ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label for="adt"><i class="zmdi zmdi-account-box-mail material-icons-name"></i></i></label>
                                <input type="text" name="adt" id="your_name" placeholder="Αριθμός Δελτίου Ταυτότητας" value="<?php echo "$row[4]"; ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-home material-icons-name"></i></label>
                                <input type="text" name="address" id="your_name" placeholder="Διεύθυνση Κατοικίας" value="<?php echo "$row[5]"; ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone material-icons-name"></i></label>
                                <input type="text" name="phone" id="your_name" placeholder="Τηλέφωνο" value="<?php echo "$row[6]"; ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email material-icons-name"></i></label>
                                <input type="email" name="email" id="your_name" placeholder="Ηλεκτρονικό Ταχυδρομείο" value="<?php echo "$row[7]"; ?>" readonly />
                            </div>

                            <div class="form-group form-button">
                                <button type="submit" name="submit" id="signup" class="form-submit">Επεξεργασία Στοιχείων</button>
                            </div>
                        </form>
                    </div>
                </div>
        </section>

    </div>

    <!-- JS -->
    <script>
        const queryString = window.location.search;
        console.log(queryString);
        if (queryString === "?error=none") {
            alert("Τα στοιχεία σας ενημερώθηκαν επιτυχώς");
            window.location.replace("/DOATAP/Pages/Profile/Me.php");
        }
    </script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>