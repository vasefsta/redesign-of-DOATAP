<?php
include_once('../header/header-Admin.php')
?>

<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';


$id = $_GET['id'];

$sql2 = "SELECT * from application WHERE applicationId=$id;";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_row($result2);

$sql1 = "SELECT * FROM users WHERE usersId=$row2[1];";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_row($result1);

if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Ξεχάσατε κάποιο στοιχείο</p>";
    }
}

?>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
    <meta name="apple-mobile-web-app-title" content="CodePen">

    <link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />

    <link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />


    <title>CodePen - Multi-step form</title>

    <link rel='stylesheet' href='https://cdn.rawgit.com/creativetimofficial/material-dashboard/31144b3f/assets/css/material-dashboard.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">


    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>

    <style>
        * {
            margin: 0;
            padding: 0
        }

        html {
            height: 100%
        }

        p {
            color: #fff
        }

        #heading {
            text-transform: uppercase;
            color: #673AB7;
            font-weight: normal
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px;
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }



        .form-card {
            text-align: left;
            margin-left: 150px;
        }

        .form-card h2 {
            margin-left: 15%;
            margin-right: 15%;
        }

        .card {
            margin-left: 16%;
            height: 400px;
        }

        h4.pay {
            margin-top: 10%;
            margin-left: 30% !important;
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform input,
        #msform textarea {
            padding: 8px 15px 8px 15px;
            border: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            margin-left: 22%;
            width: 55%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            background-color: #ECEFF1;
            font-size: 16px;
            letter-spacing: 1px
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #673AB7;
            outline-width: 0
        }

        #msform .action-button {
            width: 100px;
            background: #478ac9;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 40px 0px 10px 5px;
            float: right
        }

            .row {
                margin-right: 150px !important;
                margin-top: 100px !important;
                border: none !important;

            }
        #msform .action-button-submit {
            width: 220px;
            background: #478ac9;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 40px 0px 10px 75px;
            float: left;
        }

        #msform .action-button-submit:hover,
        #msform .action-button-submit:focus {
            background-color: #A0A0A0;
            border-color: #A0A0A0;
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            background-color: #A0A0A0;
            border-color: #A0A0A0;
        }

        #msform .action-button-previous {
            width: 120px;
            background: #808080;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 40px 5px 10px 0px;
            float: right
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            background-color: #A0A0A0;
            border-color: #A0A0A0;
        }


        .card {
            z-index: 0;
            border: steelblue;
            position: relative
        }

        h6 {
            color: #808080;
        }

        .select-items div,
        .select-selected {
            color: #ffffff;
            padding: 8px 16px;
            border: 1px solid transparent;
            border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
            cursor: pointer;
            user-select: none;
        }


        .fs-title {
            font-size: 22px;
            color: #478ac9;
            margin-bottom: 15px;
            font-weight: normal;
            text-align: left;
        }

        .purple-text {
            color: #673AB7;
            font-weight: normal
        }

        .steps {
            font-size: 25px;
            color: gray;
            margin-bottom: 10px;
            font-weight: normal;
            text-align: right
        }

        .fieldlabels {
            color: gray;
            text-align: left
        }

        label.fieldlabels {
            display: block;
            margin-left: 22%;
        }

        .custom-select {
            padding: 8px 15px 8px 15px;
            border: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            margin-left: 22%;
            width: 55% !important;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            background-color: #ECEFF1;
            font-size: 16px;
            letter-spacing: 1px;
        }

        .card {
            border: none !important;
        }

        .form-footer {
            margin-top: 50% !important;
        }

        .form-card h4 {
            margin-left: 36%;
            color: #585858;
        }



        #progressbar {
            margin-bottom: 30px;
            margin-left: 25%;
            overflow: hidden;
            color: lightgrey
        }

        #progressbar .active {
            color: #478ac9;
        }

        #progressbar li {
            list-style-type: none;
            font-size: 15px;
            width: 20%;
            float: left;
            position: relative;
            font-weight: 400
        }

        #progressbar #account:before {
            font-family: FontAwesome;
            content: "\f007"
        }

        #progressbar #personal:before {
            font-family: FontAwesome;
            content: "\f15c"
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: "\f09d"
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #478ac9;
        }

        .progress {
            height: 20px
        }

        .progress-bar {
            background-color: #673AB7
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }

        .breadcrumb {
            background-color: #fdfdfd !important;
        }


        .card {
            border: none !important;
        }
        ul.breadcrumb {
            margin-left: 14.2%;
            margin-top: 1%;
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

        .sub-btn {
            height: 45px;
            background:
                #478ac9;
            color: #fff;
            margin: 40px 0px 10px 75px;
            float: left;
        }

        .sub-btn-1 {
            color: black;
            width: 105px;
            height: 45px;
            background-color: #c94c4c;
            margin: 40px 5px 10px 0px;
            border-color: #c94c4c;
        }

        .sub-btn-2 {
            color: black;
            width: 105px;
            height: 45px;
            background-color: #04AA6D;
            margin: 40px 5px 10px 0px;
            border-color: #04AA6D;
        }

        .sub-btn-3 {
            color: black;
            width: 105px;
            background-color: #feb236;
            height: 45px;
            margin: 40px 5px 10px 0px;
            border-color: #feb236;
        }

        .sidebar {
            width: 15% !important;
        }

        .sidebar-wrapper {

            width: 100% !important;
            color: #fff !important;
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
    </style>

    <script>
        window.console = window.console || function(t) {};
    </script>

    <script>
        function includeHTML() {
            var z, i, elmnt, file, xhttp;
            /* Loop through a collection of all HTML elements: */
            z = document.getElementsByTagName("*");
            for (i = 0; i < z.length; i++) {
                elmnt = z[i];
                /*search for elements with a certain atrribute:*/
                file = elmnt.getAttribute("w3-include-html");
                if (file) {
                    /* Make an HTTP request using the attribute value as the file name: */
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4) {
                            if (this.status == 200) {
                                elmnt.innerHTML = this.responseText;
                            }
                            if (this.status == 404) {
                                elmnt.innerHTML = "Page not found.";
                            }
                            /* Remove the attribute, and call this function once more: */
                            elmnt.removeAttribute("w3-include-html");
                            includeHTML();
                        }
                    }
                    xhttp.open("GET", file, true);
                    xhttp.send();
                    /* Exit the function: */
                    return;
                }
            }
        }
    </script>

    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>


</head>
<?php
include("../../navbar/navbar.php")
?>
<div>
    <br>
    <br>
    <br>
</div>

<body translate="no" onload="getChecked()">
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
                                    <a class="nav-link" href="/DOATAP/includes/logout.inc.php" style="color: #fff;">
                                        Aποσύνδεση
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                            <!-- <h2 id="heading">Νεα Αιτηση</h2> -->
                            <!-- <p>Συμπλήρωσε τα πεδία</p> -->
                            <form id="msform" action="reportApplication.inc.php?id=<?php echo $id ?>" method="post">
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Προσωπικά Στοιχεία</strong></li>
                                    <li id="personal"><strong>Στοιχεία Πτυχίου</strong></li>
                                    <li id="personal"><strong>Δικαιολογητικά</strong></li>
                                </ul>
                                <!-- <div class="progress"> -->
                                <!-- <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div> -->
                                <!-- </div> <br> fieldsets -->
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                            </div>
                                            <div class="col-5">

                                            </div>

                                            <label class="fieldlabels">Όνομα: *</label>
                                            <input name="name" id="name" type="text" onchange="getChecked()" value='<?php echo "$row1[1]" ?>' />

                                            <label class="fieldlabels">Επίθετο: *</label>
                                            <input name="surname" id="surname" onchange="getChecked()" value='<?php echo "$row1[2]" ?>' />

                                            <label class="fieldlabels">Αριθμός Ταυτότητας: *</label>
                                            <input name="adt" id="adt" onchange="getChecked()" value='<?php echo "$row1[4]" ?>' />

                                            <label class="fieldlabels">Α.Φ.Μ: *</label>
                                            <input name="afm" id="afm" onchange="getChecked()" type="text" value='<?php echo "$row1[3]" ?>'>

                                            <label class="fieldlabels">Email: *</label>
                                            <input type="email" id="email" onchange="getChecked()" name="email" value='<?php echo "$row1[7]" ?>' />

                                            <label class="fieldlabels">Κινητό Τηλέφωνο: *</label>
                                            <input name="mobile" id="mobile" onchange="getChecked()" value='<?php echo "$row1[6]" ?>' />

                                            <label class="fieldlabels">Διεύθυνση: *</label>
                                            <input name="address" id="address" onchange="getChecked()" value='<?php echo "$row1[5]" ?>' />
                                        </div>

                                    </div>
                                    <input type="button" onchange="getChecked()" name="next" class="next action-button" value="Επόμενο" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Συμπλήρωσε τα στοιχεία σου:</h2>
                                            </div>
                                            <div class="col-5">

                                            </div>
                                            <label class="fieldlabels">Είδος Πτυχίου: *</label>
                                            <select class="custom-select" name="type" id="type">
                                                <option label="Προπτυχιακό" <?php if ($row2[2] == 'Προπτυχιακό') {
                                                                                echo ("selected");
                                                                            } ?>>Προπτυχιακό</option>
                                                <option label="Μεταπτυχιακό" <?php if ($row2[2] == 'Μεταπτυχιακό') {
                                                                                    echo ("selected");
                                                                                } ?>>Μεταπτυχιακό</option>
                                                <option label="Διδακτορικό" <?php if ($row2[2] == 'Διδακτορικο') {
                                                                                echo ("selected");
                                                                            } ?>>Διδακτορικο</option>
                                            </select>

                                            <label class="fieldlabels">Χώρα Σπουδών</label>
                                            <input name="country" id="country" type="text" placeholder="Xώρα Σπουδών" value='<?php echo "$row2[5]" ?>'>

                                            <label class="fieldlabels">Ισοτιμία με Πανεπιστήμιο/ΤΕΙ:</label>
                                            <select class="fieldlabels custom-select" name="uni_tei" id="uni_tei">
                                                <option label="Πανεπιστήμιο" <?php if ($row2[3] == 'Πανεπιστήμιο') {
                                                                                    echo ("selected");
                                                                                } ?>>Πανεπιστήμιο</option>
                                                <option label="ΤΕΙ" <?php if ($row2[3] == 'ΤΕΙ') {
                                                                        echo ("selected");
                                                                    } ?>>ΤΕΙ</option>
                                            </select>

                                            <label class="fieldlabels">Όνομα Πανεπιστημίου</label>
                                            <input name="university" id="university" type="text" placeholder="Όνομα Πανεπιστημίου" value='<?php echo "$row2[6]" ?>'>

                                            <label class="fieldlabels">Τμήμα Πανεπιστημίου</label>
                                            <input name="department" id="department" type="text" placeholder="Τμήμα Πανεπιστημίου" value='<?php echo "$row2[4]" ?>'>

                                            <label class="fieldlabels">Τίτλος Σπουδών: *</label>
                                            <input name="title" id="title" placeholder="Τίτλος Σπουδών" value='<?php echo "$row2[8]" ?>' />

                                            <label class="fieldlabels">Πιστωτικές Μονάδες (ECTS): *</label>
                                            <input type="text" name="ects" id="ects" placeholder="Πιστωτικές Μονάδες (ECTS)" value='<?php echo "$row2[7]" ?>' />

                                            <label class="fieldlabels">Ημερομηνία Eγγραφής: *</label>
                                            <input type="date" name="regDate" id="regDate" placeholder="Ημερομηνία Eγγραφής" value='<?php echo "$row2[9]" ?>' />

                                            <label class="fieldlabels">Ημερομηνία Aποφοίτησης: *</label>
                                            <input type="date" name="gradDate" id="gradDate" placeholder="Ημερομηνία Aποφοίτησης" value='<?php echo "$row2[10]" ?>' />

                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Επόμενο" />
                                    <input type="button" name="previous" class="previous action-button-previous" value="Προηγούμενο" />
                                </fieldset>

                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Δικαιολογητικά:</h2>
                                            </div>
                                            <div class="col-5">

                                            </div>
                                        </div>
                                        <label class="fieldlabels">Ταυτότητα:</label>
                                        <input type="file" onchange="getChecked()" name="adtPhoto" id="adtPhoto" accept="image/*">

                                        <label class="fieldlabels">Πτυχίο:</label>
                                        <input type="file" onchange="getChecked()" name="gradPhoto" id="gradPhoto" accept="image/*">

                                        <label class="fieldlabels">Αναλυτική Βαθμολογία (ECTS):</label>
                                        <input type="file" onchange="getChecked()" name="ectsPhoto" id="ectsPhoto" accept="image/*">

                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="Προηγούμενο" />
                                    <button type="submit" name="reject" class="sub-btn-1">Απόρριψη</button>
                                    <button type="submit" name="pending" class="sub-btn-3">Εκκρεμές</button>
                                    <button type="submit" name="accept" class="sub-btn-2">Έγκριση</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
            <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>

            <script>
                function getChecked() {
                    document.getElementById('name1').value = document.getElementById('name').value;
                    document.getElementById('surname1').value = document.getElementById('surname').value;
                    document.getElementById('afm1').value = document.getElementById('afm').value;
                    document.getElementById('adt1').value = document.getElementById('adt').value;
                    document.getElementById('email1').value = document.getElementById('email').value;
                    document.getElementById('mobile1').value = document.getElementById('mobile').value;
                    document.getElementById('address1').value = document.getElementById('address').value;

                    document.getElementById('country1').value = document.getElementById('country').value;
                    document.getElementById('university1').value = document.getElementById('university').value;
                    document.getElementById('department1').value = document.getElementById('department').value;
                    document.getElementById('title1').value = document.getElementById('title').value;
                    document.getElementById('ects1').value = document.getElementById('ects').value;

                    var type = document.getElementById('type');
                    document.getElementById('type1').value = type.value;

                    var uni_tei = document.getElementById('uni_tei');
                    document.getElementById('uni_tei1').value = uni_tei.value;

                    var reg = document.getElementById('regDate');
                    document.getElementById('regDate1').value = reg.value;

                    var grad = document.getElementById('gradDate');
                    document.getElementById('gradDate1').value = reg.value;

                }
            </script>

            <script>
                function pay() {
                    alert('Η πληρωμή σας έγινε επιτυχώς');
                }
            </script>

            <script>
                function save() {
                    alert('Η αίτηση σας αποθηκεύτηκε επιτυχώς');
                }
            </script>

            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
            <script id="rendered-js">
                $(document).ready(function() {

                    var current_fs, next_fs, previous_fs; //fieldsets
                    var opacity;
                    var current = 1;
                    var steps = $("fieldset").length;

                    setProgressBar(current);

                    $(".next").click(function() {

                        current_fs = $(this).parent();
                        next_fs = $(this).parent().next();

                        //Add Class Active
                        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                        //show the next fieldset
                        next_fs.show();
                        //hide the current fieldset with style
                        current_fs.animate({
                            opacity: 0
                        }, {
                            step: function(now) {
                                // for making fielset appear animation
                                opacity = 1 - now;

                                current_fs.css({
                                    'display': 'none',
                                    'position': 'relative'
                                });

                                next_fs.css({
                                    'opacity': opacity
                                });
                            },
                            duration: 500
                        });

                        setProgressBar(++current);
                    });

                    $(".previous").click(function() {

                        current_fs = $(this).parent();
                        previous_fs = $(this).parent().prev();

                        //Remove class active
                        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                        //show the previous fieldset
                        previous_fs.show();

                        //hide the current fieldset with style
                        current_fs.animate({
                            opacity: 0
                        }, {
                            step: function(now) {
                                // for making fielset appear animation
                                opacity = 1 - now;

                                current_fs.css({
                                    'display': 'none',
                                    'position': 'relative'
                                });

                                previous_fs.css({
                                    'opacity': opacity
                                });
                            },
                            duration: 500
                        });

                        setProgressBar(--current);
                    });

                    function setProgressBar(curStep) {
                        var percent = parseFloat(100 / steps) * curStep;
                        percent = percent.toFixed();
                        $(".progress-bar").
                        css("width", percent + "%");
                    }

                    $(".submit").click(function() {
                        return false;
                    });

                });
                //# sourceURL=pen.js
            </script>

            <script>
                includeHTML();
            </script>



</body>

</html>

<?php
mysqli_stmt_close($stmt);

?>