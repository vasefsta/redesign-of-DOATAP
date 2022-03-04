<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
    <meta name="apple-mobile-web-app-title" content="CodePen">

    <link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />

    <link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />


    <title>CodePen - Admin Panel</title>


    <link rel='stylesheet' href='https://cdn.rawgit.com/creativetimofficial/material-dashboard/31144b3f/assets/css/material-dashboard.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">


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
    div.array {
        margin-top: 120px;
    }
    div.container {
        max-width: 950px;
        /* width: 70% !important; */
    }

    .sidebar {
        width: 15% !important;
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
        margin-left: 20%;
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

    .content-table thead tr{
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

</style>

<body translate="no">

    <body>
        <div class="wrapper ">
            <div class="sidebar" data-background-color="white" data-color="azure">
                <div class="logo">
                    <img src="../../img/logo.png" alt="" width="220px">
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
                            <a class="navbar-brand" href="#pablo">Εκκρεμείς Αιτήσεις</a>
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
                <div class="array">
                <div class="container py-5 ">
                <div class="apps-table">
                <div class="row">
                <?php
                    require_once '../../includes/dbh.inc.php';
                    require_once '../../includes/functions.inc.php';


                    $sql = "SELECT * FROM application WHERE status='pending'";

                    if ($result = mysqli_query($conn, $sql)) {
                        echo "<form action='RejectApplication.php' method='get'>";
                        echo "<table id='example' class='table table-striped' style='width:100%'>";
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
                                if ($row[14] == "pending") {
                                    echo "<td>Σε εκκρεμότητα</td>";
                                    echo "<td>Οριστικοποιημένη</td>";
                                }
                            }

                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        echo "</form>";
                    }
                    ?>

                </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
                <script src="app.js"></script>

                </div>
                </div>
            </div>
        </div>
    </body>
</body>

</html>