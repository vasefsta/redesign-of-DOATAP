<?php
ob_start(); // needs to be added here
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">


    <title>Διαχειριστής</title>


    <link rel='stylesheet' href='https://cdn.rawgit.com/creativetimofficial/material-dashboard/31144b3f/assets/css/material-dashboard.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css'>


    <script>
        window.console = window.console || function(t) {};
    </script>



    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>


</head>

<style>
    body {
        position: relative;
    }

    .sidebar {
        width: 16% !important;
    }

    .sidebar-wrapper {

        width: 100% !important;
        color: #fff;
    }

    .logo img {
        margin-left: 15px;
    }

    a.navbar-brand {
        font-weight: bold !important;
    }

    a.nav-link {
        background-color: #478ac9 !important;
    }


    p.nav-link {
        color: #fff;
    }

    .navbar-wrapper {
        margin-left: 5%;
    }

    p {
        font-size: 18px !important;
    }

    .content-table {
        border-collapse: collapse;
        margin-top: 7%;
        margin-left: 13%;
        font-size: 0.9em;
        min-width: 600px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    tr {
        font-size: 17px;
        text-align: center;
    }

    .content-table thead tr {
        background-color: #478ac9;
        color: #fff;
        text-align: left;
        font-weight: bold;
    }

    .content-table th,
    .content-table td {
        padding: 12px 25px;
    }

    .content-table tbody tr {
        border-bottom: 1px solid #ddd;
    }

    .content-table tbody tr:nth-of-type(odd) {
        background-color: #fdfdfd;
    }

    .content-table tbody tr:last-of-type {
        border-bottom: 1px solid #478ac9;
    }

    img.x-icon {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    a {
        color: #478ac9;
    }

    a:hover {
        color: #478ac9;
    }

    .btn-log-out a.nav-link {
        color: #fff !important;
    }

    body>*:not(#loading) {
        filter: blur(2px);
    }

    #loading {
        top: 25%;
        left: 40%;
        position: fixed;
        width: 100%;
        z-index: 1;
    }
</style>

<body translate="no">

    <body>
        <form action="" method="post" id="loading">
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
        <div>
            <div class="wrapper ">
                <div class="sidebar" data-background-color="white" data-color="azure">
                    <div class="logo">
                        <a href="AdminPage.php"><img src="../../img/logo.png" alt="" width="220px"></a>
                    </div>
                    <div class="sidebar-wrapper">
                        <ul class="nav">
                            <li class="nav-item active  ">
                                <a class="nav-link" href="AdminPage.php">
                                    <i class="material-icons">dashboard</i>
                                    <p>Νέες Αιτήσεις</p>
                                </a>
                            </li>
                            <li class="nav-item active  ">
                                <a class="nav-link" href="AdminPageSucc.php">
                                    <i class="material-icons">dashboard</i>
                                    <p>Εγκεκριμένες Αιτήσεις</p>
                                </a>
                            </li>
                            <li class="nav-item active  ">
                                <a class="nav-link" href="AdminPageRej.php">
                                    <i class="material-icons">dashboard</i>
                                    <p>Απορριφθέντες Αιτήσεις</p>
                                </a>
                            </li>
                            <li class="nav-item active  ">
                                <a class="nav-link" href="AdminPagePend.php">
                                    <i class="material-icons">dashboard</i>
                                    <p>Εκκρεμείς Αιτήσεις</p>
                                </a>
                            </li>
                            <li class="nav-item active  ">
                                <a class="nav-link" href="AdminPageAll.php">
                                    <i class="material-icons">dashboard</i>
                                    <p>Όλες οι Αιτήσεις</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar-background" style="background-image: url('https://images.unsplash.com/photo-1470770841072-f978cf4d019e?ixlib=rb-0.3.5&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;s=247b379684184e3794e14d34 00c7d629&amp;auto=format&amp;fit=crop&amp;w=9026&amp;q=80') "> </div>
                </div>

                <div class="main-panel">
                    <!-- Navbar -->
                    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                        <div class="container-fluid">
                            <div class="navbar-wrapper">
                                <a class="navbar-brand" href="#pablo">Νέες Αιτήσεις</a>
                            </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="navbar-toggler-icon icon-bar"></span>
                                <span class="navbar-toggler-icon icon-bar"></span>
                                <span class="navbar-toggler-icon icon-bar"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <div class="btn-log-out">
                                            <a class="nav-link" href="/DOATAP/includes/logout.inc.php" style="color: #00b4d8;">
                                                Aποσύνδεση
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <div class="apps-table">
                        <?php
                        require_once '../../includes/dbh.inc.php';
                        require_once '../../includes/functions.inc.php';


                        $sql = "SELECT * FROM application WHERE status='submitted'";

                        if ($result = mysqli_query($conn, $sql)) {
                            echo "<table class='content-table'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>Αριθμός Αίτησης</th>";
                            echo "<th>Είδος Πτυχίου</th>";
                            echo "<th>Τίτλος Σπουδών</th>";
                            echo "<th>Πανεπιστήμιο</th>";
                            echo "<th>Προβολή</th>";
                            echo "<th>Κατάσταση Αίτησης</th>";
                            echo "<th>Απόρριψη</th>";
                            echo "</tr>";
                            echo "</thead>";

                            echo "<tbody>";
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
                                if ($row[6] == NULL) {
                                    echo "<td>Δεν συμπληρώθηκε</td>";
                                } else {
                                    echo "<td>$row[6]</td>";
                                }
                                echo "<td><a href='../../includes/reviewApplicationAdmin.inc.php?id=$row[0]'>Προβολή</a></td>";
                                if ($row[14] == NULL) {
                                    echo "<td>Δεν συμπληρώθηκε</td>";
                                } else {
                                    if ($row[14] == "submitted") {
                                        echo "<td>Υποβλημένη</td>";
                                    }
                                }

                                echo "<td><a href='RejectApplication.php?id=$row[0]'><img class='x-icon' src='https://cdn-icons-png.flaticon.com/512/1828/1828851.png' width='25px'/></a></td>";

                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                        }
                        ?>
                    </div>
                </div>
            </div>

    </body>
</body>

</html>

<?php


$all = $_GET['checked'];

// optional
// echo "You chose the following color(s): <br>";

if (isset($_POST['submit'])) {
    $reason = $_POST['Option'];  // Storing Selected Value In Variable

    foreach ($all as $id) {
        $sql = "INSERT INTO applicationReport (applicationId, report) VALUES (?, ?);";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: AdminApplications.inc.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "is", $id, $reason);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);


        $sql = "UPDATE application SET status=? WHERE applicationId=" . $id . "; ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: editApplication.inc.php?error=stmtfailed");
            exit();
        }
        $rejected = "rejected";
        mysqli_stmt_bind_param($stmt, "s", $rejected);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
    }

    header("location: AdminPage.php");
    exit();
} else if (isset($_POST['cancel'])) {
    header("location: AdminPage.php");
    exit();
}
