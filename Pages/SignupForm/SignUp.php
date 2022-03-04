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
    </style>
    <style>
    .breadcrumb {
        background-color: #f2f2f2 !important;
      }
      ul.breadcrumb {
      margin-left: 14.2%;
      /* margin-top: 3%; */
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
          <li style="color: #585858;">Eγγραφή</li>
        </ul>

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Εγγραφή</h2>
                        <form action="../../includes/signup.inc.php" method="post" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Όνομα"/>
                            </div>
                            <div class="form-group">
                                <label for="surname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="surname" id="surname" placeholder="Επίθετο"/>
                            </div>
                            <div class="form-group">
                                <label for="afm"><i class="zmdi zmdi-account-box-mail material-icons-name"></i></i></label>
                                <input type="text" name="afm" id="your_name" placeholder="Α.Φ.Μ."/>
                            </div>
                            <div class="form-group">
                                <label for="adt"><i class="zmdi zmdi-account-box-mail material-icons-name"></i></i></label>
                                <input type="text" name="adt" id="your_name" placeholder="Αριθμός Δελτίου Ταυτότητας"/>
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-home material-icons-name"></i></label>
                                <input type="text" name="address" id="your_name" placeholder="Διεύθυνση Κατοικίας"/>
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone material-icons-name"></i></label>
                                <input type="text" name="phone" id="your_name" placeholder="Τηλέφωνο"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email material-icons-name"></i></label>
                                <input type="email" name="email" id="your_name" placeholder="Ηλεκτρονικό Ταχυδρομείο"/>
                            </div>

                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock material-icons-name"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Κωδικός Πρόσβασης"/>
                            </div>
                            <div class="form-group">
                                <label for="password_repeat"><i class="zmdi zmdi-lock-outline material-icons-name"></i></label>
                                <input type="password" name="password_repeat" id="re_pass" placeholder="Επάναληψη Κωδικού Πρόσβασης"/>
                            </div>
                            <div class="form-group form-button">
                                <button type="submit" name="submit" id="signup" class="form-submit">Εγγραφή</button>
                                <p>Έχετε ήδη λογαριασμό; <a href="../LoginForm/Login.php">Συνδεθείτε</a></p>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                    </div>
                </div>
            </div>
        </section>

        

        <?php
        if (isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<p>Ξεχάσατε κάποιο στοιχείο</p>";
            } else if($_GET["error"] == "invalidemail") {
                echo "<p>Μη έγκυρη ηλεκτρονική διεύθυνση</p>";
            } else if($_GET["error"] == "passwddontmatch") {
                echo "<p>Οι κωδικοί σας δεν ταιριάζουν</p>";
            } else if($_GET["error"] == "afmexists") {
                echo "<p>Υπάρχει χρήστης με το ΑΦΜ που εισάγατε</p>";
            } else if($_GET["error"] == "adtexists") {
                echo "<p>Υπάρχει χρήστης με την Ταυτότητα που εισάγατε</p>";
            } else if($_GET["error"] == "emailexists") {
                echo "<p>Υπάρχει χρήστης με το Email που εισάγατε</p>";
            } else if($_GET["error"] == "stmtfailed") {
                echo "<p>Σφάλμα στη δημιουργία λογαριασμού. Παρακαλώ επικοινωνήστε μαζί μας</p>";
            } else if($_GET["error"] == "none") {
                echo "<p>Ο Λογαριασμός σας δημιουργήθηκε επιτυχώς</p>";
            }

        }
    ?>

    </div>

    <!-- JS -->
    <script>
        const queryString = window.location.search;
        console.log(queryString);
        if(queryString === "?error=none"){
            alert("Η εγγραφή σας έγινε επιτυχώς");
            window.location.replace("/DOATAP/index.php");
        } else if (queryString === "?error=emptyinput") {
            alert("Έχετε ξεχάσει να συμπληρώσετε κάποια στοιχεία");
        } else if (queryString === "?error=invalidemail") {
            alert("Εισαγάγατε μη έγκυρο λογαριασμό email");
        } else if (queryString === "?error=passwddontmatch") {
            alert("Οι κωδικοί που εισάγατε δεν ταιριάζουν");
        } else if (queryString === "?error=afmexists") {
            alert("Υπάρχει χρήστης με το Α.Φ.Μ που εισαγάγατε");
        } else if (queryString === "?error=adtexists") {
            alert("Υπάρχει χρήστης με τον Αριθμό Δελτίου Ταυτότητας που εισαγάγατε");
        } else if (queryString === "?error=emailexists") {
            alert("Υπάρχει χρήστης με το email που εισαγάγατε");
        } else if (queryString === "?error=stmtfailed") {
            alert("Υπήρξε κάποιο σφάλμα στην προσπάθεια δημιουργείας του λογαριασμού σας. Παρακαλώ προσπαθήστε ξανά");
        }
        
    </script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>