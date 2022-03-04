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
            color: grey
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
            height: 45px; background: 
            #478ac9; color: #fff; 
            margin: 40px 0px 10px 75px;
            float: left;
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
    <ul class="breadcrumb">
        <li><a href="../../index.php">Αρχική</a></li>
        <li><a href="#">Αιτήσεις</a></li>
        <li style="color: #585858;">Ενδεικτική Αίτηση</li>
    </ul>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <!-- <h2 id="heading">Νεα Αιτηση</h2> -->
                    <!-- <p>Συμπλήρωσε τα πεδία</p> -->
                    <form id="msform" action="#" >
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>Προσωπικά Στοιχεία</strong></li>
                            <li id="personal"><strong>Στοιχεία Πτυχίου</strong></li>
                            <li id="personal"><strong>Δικαιολογητικά</strong></li>
                            <li id="confirm"><strong>Επισκόπηση</strong></li>
                            <li id="payment"><strong>Πληρωμή</strong></li>
                        </ul>
                        <!-- <div class="progress"> -->
                        <!-- <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div> -->
                        <!-- </div> <br> fieldsets -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Συμπλήρωσε τα προσωπικά σου στοιχεία :</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Βήμα 1 / 5</h2>
                                    </div>

                                    <label class="fieldlabels">Όνομα: *</label>
                                    <input name="name" id="name" type="text" onchange="getChecked()" readonly  />

                                    <label class="fieldlabels">Επίθετο: *</label>
                                    <input name="surname" id="surname" onchange="getChecked()" readonly/>

                                    <label class="fieldlabels">Αριθμός Ταυτότητας: *</label>
                                    <input name="adt" id="adt" onchange="getChecked()" readonly/>

                                    <label class="fieldlabels">Α.Φ.Μ: *</label>
                                    <input name="afm" id="afm" onchange="getChecked()" readonly type="text">

                                    <label class="fieldlabels">Email: *</label>
                                    <input type="email" id="email" onchange="getChecked()" readonly name="email" />

                                    <label class="fieldlabels">Κινητό Τηλέφωνο: *</label>
                                    <input name="mobile" id="mobile" onchange="getChecked()" readonly/>

                                    <label class="fieldlabels">Διεύθυνση: *</label>
                                    <input name="address" id="address" onchange="getChecked()" readonly/>
                                </div>

                            </div>
                            <input type="button" onchange="getChecked()" name="next" class="next action-button" value="Επόμενο" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Συμπλήρωσε τα στοιχεία του πτυχίου σου:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Βήμα 2 / 5</h2>
                                    </div>
                                    <label class="fieldlabels">Είδος Πτυχίου: *</label>
                                    <select class="custom-select" name="type" id="type" onchange="getChecked()">
                                        <option label="Προπτυχιακό">Προπτυχιακό</option>
                                        <option label="Μεταπτυχιακό">Μεταπτυχιακό</option>
                                        <option label="Διδακτορικό">Διδακτορικό</option>
                                    </select>

                                    <label class="fieldlabels">Χώρα Σπουδών</label>
                                    <input name="country" id="country" onchange="getChecked()" type="text" placeholder="Xώρα Σπουδών" readonly>

                                    <label class="fieldlabels">Ισοτιμία με Πανεπιστήμιο/ΤΕΙ:</label>
                                    <select class="fieldlabels custom-select" name="uni_tei" id="uni_tei" onchange="getChecked()">
                                        <option label="Πανεπιστήμιο">Πανεπιστήμιο</option>
                                        <option label="ΤΕΙ">ΤΕΙ</option>
                                    </select>

                                    <label class="fieldlabels">Όνομα Πανεπιστημίου</label>
                                    <input name="university" id="university" onchange="getChecked()" type="text" placeholder="Όνομα Πανεπιστημίου" readonly>

                                    <label class="fieldlabels">Τμήμα Πανεπιστημίου</label>
                                    <input name="department" id="department" onchange="getChecked()" type="text" placeholder="Τμήμα Πανεπιστημίου" readonly> 

                                    <label class="fieldlabels">Τίτλος Σπουδών: *</label>
                                    <input name="title" id="title" onchange="getChecked()" placeholder="Τίτλος Σπουδών" readonly />

                                    <label class="fieldlabels">Πιστωτικές Μονάδες (ECTS): *</label>
                                    <input type="text" onchange="getChecked()" name="ects" id="ects" placeholder="Πιστωτικές Μονάδες (ECTS)" readonly/>

                                    <label class="fieldlabels">Ημερομηνία Eγγραφής: *</label>
                                    <input type="date" onchange="getChecked()" name="regDate" id="regDate" placeholder="Ημερομηνία Eγγραφής" readonly/>

                                    <label class="fieldlabels">Ημερομηνία Aποφοίτησης: *</label>
                                    <input type="date" onchange="getChecked()" name="gradDate" id="gradDate" placeholder="Ημερομηνία Aποφοίτησης" readonly/>

                                </div>
                            </div>
                            <!-- <button type="submit" name="Save">Προσωρινή Αποθήκευση</button> -->
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
                                        <h2 class="steps">Βήμα 3 / 5</h2>
                                    </div>
                                </div>
                                <label class="fieldlabels">Ταυτότητα:</label>
                                <input type="file" onchange="getChecked()" name="adtPhoto" id="adtPhoto" readonly accept="image/*">

                                <label class="fieldlabels">Πτυχίο:</label>
                                <input type="file" onchange="getChecked()" name="gradPhoto" id="gradPhoto" readonly accept="image/*">

                                <label class="fieldlabels">Αναλυτική Βαθμολογία (ECTS):</label>
                                <input type="file" onchange="getChecked()" name="ectsPhoto" id="ectsPhoto" readonly accept="image/*">

                            </div>
                            <input type="button" name="next" class="next action-button" value="Επόμενο" />
                            <input type="button" name="previous" class="previous action-button-previous" value="Προηγούμενο" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Επισκόπηση</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Βήμα 4 / 5</h2>
                                    </div>
                                </div> <br><br>

                                <h4>Προσωπικά Στοιχεία </h4>
                                <label class="fieldlabels">Όνομα: *</label> <input type="text" name="name1" id="name1" readonly />
                                <label class="fieldlabels">Επίθετο: *</label> <input name="surname1" placeholder="Επίθετο" id="surname1" readonly/>
                                <label class="fieldlabels">Αριθμός Ταυτότητας: *</label> <input name="adt1" placeholder="Αριθμός Ταυτότητας" id="adt1" readonly/>
                                <label class="fieldlabels">Α.Φ.Μ: *</label> <input name="afm1" placeholder="Α.Φ.Μ" id="afm1" readonly/>
                                <label class="fieldlabels">Email: *</label> <input type="email" name="email1" placeholder="Email" id="email1" readonly/>
                                <label class="fieldlabels">Κινητό Τηλέφωνο: *</label> <input name="mobile1" placeholder="Κινητό Τηλέφωνο" id="mobile1" readonly />
                                <label class="fieldlabels">Διεύθυνση: *</label> <input name="address1" placeholder="Διεύθυνση" id="address1" readonly/>
                                <br>
                                <br>
                                <h4>Στοιχεία Πτυχίου</h4>

                                <label class="fieldlabels">Είδος Πτυχίου: *</label>
                                <select class="custom-select" name="type1" id="type1">
                                    <option label="Προπτυχιακό">Προπτυχιακό</option>
                                    <option label="Μεταπτυχιακό">Μεταπτυχιακό</option>
                                    <option label="Διδακτορικό">Διδακτορικο</option>
                                </select>

                                <label class="fieldlabels">Χώρα Σπουδών</label>
                                <input name="country1" id="country1" onchange="getChecked()" type="text" placeholder="Xώρα Σπουδών" readonly>

                                <label class="fieldlabels">Πανεπιστήμιο/ΤΕΙ: *</label>
                                <select class="fieldlabels custom-select" id="uni_tei1">
                                    <option label="Πανεπιστήμιο">Πανεπιστήμιο</option>
                                    <option label="ΤΕΙ">ΤΕΙ</option>
                                </select>

                                <label class="fieldlabels">Όνομα Πανεπιστημίου</label>
                                <input name="university1" id="university1" onchange="getChecked()" type="text" placeholder="Όνομα Πανεπιστημίου" readonly>

                                <label class="fieldlabels">Τμήμα Πανεπιστημίου</label>
                                <input name="department1" id="department1" onchange="getChecked()" type="text" placeholder="Τμήμα Πανεπιστημίου" readonly>

                                <label class="fieldlabels">Τίτλος Σπουδών: *</label>
                                <input name="title1" id="title1" onchange="getChecked()" placeholder="Τίτλος Σπουδών" readonly/>

                                <label class="fieldlabels">Πιστωτικές Μονάδες (ECTS): *</label>
                                <input type="text" onchange="getChecked()" name="ects1" id="ects1" placeholder="Πιστωτικές Μονάδες (ECTS)" readonly/>

                                <label class="fieldlabels">Ημερομηνία Eγγραφής: *</label>
                                <input type="date" onchange="getChecked()" name="regDate1" id="regDate1" placeholder="Ημερομηνία Eγγραφής" readonly/>

                                <label class="fieldlabels">Ημερομηνία Aποφοίτησης: *</label>
                                <input type="date" onchange="getChecked()" name="gradDate1" id="gradDate1" placeholder="Ημερομηνία Aποφοίτησης" readonly />

                                <br>
                                <br>

                                <h4>Δικαιολογητικά</h4>
                                <label class="fieldlabels">Ταυτότητα:</label>
                                <input type="file" onchange="getChecked()" name="adtPhoto" id="adtPhoto" accept="image/*" readonly>

                                <label class="fieldlabels">Πτυχίο:</label>
                                <input type="file" onchange="getChecked()" name="gradPhoto" id="gradPhoto" accept="image/*" readonly>

                                <label class="fieldlabels">Αναλυτική Βαθμολογία (ECTS):</label>
                                <input type="file" onchange="getChecked()" name="ectsPhoto" id="ectsPhoto" accept="image/*" readonly>

                            </div>

                            <!-- <button type="submit" name="Save">Προσωρινή Αποθήκευση</button> -->
                            <input type="button" name="next" class="next action-button" value="Επόμενο" />
                            <input type="button" name="previous" class="previous action-button-previous" value="Προηγούμενο" />


                        </fieldset>

                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Πληρωμή:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Βήμα 5 / 5</h2>
                                    </div>
                                </div>
                                <h4 class="pay">Ποσό Πληρωμής: €20.00</h4>
                                <div class="card">
                                    <object type="text/html" data="CreditCard.php" width="500" height="650"></object>
                                </div>
                            </div>
                            <input type="submit" name="Submit" onclick="pay()" class="next action-button" value="Πληρωμή" readonly/>
                            <input type="button" name="previous" class="previous action-button-previous" value="Προηγούμενο" />
                        </fieldset>
                    </form>
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