<?php
	include_once('../header/header.php');
?>

<link rel="stylesheet" href="../css/style.css" />

<section>
    <h2>Εγγραφή</h2>
    <form action="../includes/signup.inc.php" method="post">

        <input type="text" name="name" placeholder="Όνομα">
        <input type="text" name="surname" placeholder="Επίθετο">
        <input type="text" name="afm" placeholder="ΑΦΜ">
        <input type="text" name="adt" placeholder="Αριθμός Δελτίου Ταυτότητας">
        <input type="text" name="address" placeholder="Διεύθυνση">
        <input type="number" name="phone" placeholder="Τηλέφωνο">
        <input type="email" name="email" placeholder="Ηλεκτρονικό Ταχυδρομείο">
        <input type="password" name="password" placeholder="Κωδικός Πρόσβασης">
        <input type="password" name="password_repeat" placeholder="Επανάληψη Κωδικού Πρόσβασης">
        <button type="submit" name="submit">Εγγραφή</button>
    </form>
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

</section>

