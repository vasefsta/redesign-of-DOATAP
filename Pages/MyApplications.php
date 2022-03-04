<?php
include_once('../navbar/navbar.php');

if ($_SESSION["userid"] == NULL){
    header("location: ../Pages/LoginForm/Login.php");
    exit();
}

?>

<style>
    .foot {
        margin-top: 12%;
    }
</style>

<section>
    <div class="myapps">
        <?php include '../includes/myApplications.inc.php'; ?>
    </div>

    <div class="foot">
        <?php
        include_once('../footer/footer.php')
        ?> 
    </div>

    <script>
        const queryString = window.location.search;
        console.log(queryString);
        if (queryString === "?error=deleteSuccess") {
            alert("Η διαγραφή της αίτησης σας έγινε επιτυχώς");
            window.location.replace("/DOATAP/Pages/MyApplications.php");
        } else if (queryString === "?error=submitted") {
            alert("Επιτυχής Υποβολή Αίτησης");
            window.location.replace("/DOATAP/Pages/MyApplications.php");
        }
    </script>

</section>