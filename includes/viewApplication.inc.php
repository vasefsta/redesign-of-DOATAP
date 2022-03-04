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
  if($_GET["error"] == "emptyinput") {
    echo "<p>Ξεχάσατε κάποιο στοιχείο</p>";
  }
}

?>

<!DOCTYPE html>
<html lang="en" >

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
    margin-top: 20px
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
    text-align: left
}

.card {
    margin-left: 16%;
    height: 400px;
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
    background: #673AB7;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 0px 10px 5px;
    float: right
}

#msform .action-button:hover,
#msform .action-button:focus {
    background-color: #311B92
}

#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px 10px 0px;
    float: right
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
    background-color: #000000
}

.card {
    z-index: 0;
    border: steelblue;
    position: relative
}

h6 {
    color: #808080;
}

.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
}


.fs-title {
    font-size: 22px;
    color: #673AB7;
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
    width: 55%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    background-color: #ECEFF1;
    font-size: 16px;
    letter-spacing: 1px;
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #673AB7
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
    background: #673AB7
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
              if (this.status == 200) {elmnt.innerHTML = this.responseText;}
              if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
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
    include("../navbar/navbar.php")
?>
<div>
  <br>
  <br>
  <br>
</div>
<body translate="no" >
  <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <!-- <h2 id="heading">Νεα Αιτηση</h2> -->
                <!-- <p>Συμπλήρωσε τα πεδία</p> -->
                <form id="msform" action="saveApplication.inc.php?id=<?php echo "$id" ?>" method="post">
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active" id="account"><strong>Προσωπικά Στοιχεία</strong></li>
                        <li id="personal"><strong>Στοιχεία Πτυχίου</strong></li>
                        <li id="personal"><strong>Δικαιολογητικά</strong></li>
                        <li id="payment"><strong>Πληρωμή</strong></li>
                    </ul>
                    <!-- <div class="progress"> -->
                        <!-- <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div> -->
                    <!-- </div> <br> fieldsets -->
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Συμπλήρωσε τα στοιχεία σου:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Βήμα 1 / 5</h2>
                                </div>
                               
                                <label class="fieldlabels">Όνομα: *</label> 
                                <input name="name" id="name" type="text" value='<?php echo "$row1[1]"?>' /> 
                                
                                <label class="fieldlabels">Επίθετο: *</label>
                                <input name="surname" id="surname" value='<?php echo "$row1[2]"?>' /> 
                                
                                <label class="fieldlabels">Αριθμός Ταυτότητας: *</label>
                                <input name="adt" id="adt" value='<?php echo "$row1[4]"?>' />
                                
                                <label class="fieldlabels">Α.Φ.Μ: *</label>         
                                <input name="afm" id="afm" type="text" value='<?php echo "$row1[3]"?>'>

                                <label class="fieldlabels">Email: *</label>
                                <input type="email" id="email" name="email" value='<?php echo "$row1[7]"?>' /> 
                                
                                <label class="fieldlabels">Κινητό Τηλέφωνο: *</label> 
                                <input name="mobile" id="mobile" value='<?php echo "$row1[6]"?>' />
                                
                                <label class="fieldlabels">Διεύθυνση: *</label> 
                                <input name="address" id="address" value='<?php echo "$row1[5]"?>' />    
                            </div>                         
                            
                            </div> 
                            <input type="button" name="next" class="next action-button" value="Επόμενο" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Συμπλήρωσε τα στοιχεία σου:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Βήμα 2 / 5</h2>
                                </div>
                                <label class="fieldlabels">Είδος Πτυχίου: *</label>
                            <select class="custom-select" name="type" id="type">
                                <option label="Προπτυχιακό" <?php if($row2[2] == 'Προπτυχιακό'){echo("selected");}?>>Προπτυχιακό</option>
                                <option label="Μεταπτυχιακό"  <?php if($row2[2] == 'Μεταπτυχιακό'){echo("selected");}?>>Μεταπτυχιακό</option>
                                <option label="Διδακτορικό"  <?php if($row2[2] == 'Διδακτορικο'){echo("selected");}?>>Διδακτορικο</option>
                            </select>

                            <label class="fieldlabels">Χώρα Σπουδών</label>
                            <input name="country" id="country" type="text" placeholder="Xώρα Σπουδών" value='<?php echo "$row2[5]"?>'>

                            <label class="fieldlabels">Ισοτιμία με Πανεπιστήμιο/ΤΕΙ:</label>
                            <select class="fieldlabels custom-select" name="uni_tei" id="uni_tei">
                                <option label="Πανεπιστήμιο"  <?php if($row2[3] == 'Πανεπιστήμιο'){echo("selected");}?>>Πανεπιστήμιο</option>
                                <option label="ΤΕΙ" <?php if($row2[3] == 'ΤΕΙ'){echo("selected");}?>>ΤΕΙ</option>
                            </select>

                            <label class="fieldlabels">Όνομα Πανεπιστημίου</label>
                            <input name="university" id="university" type="text" placeholder="Όνομα Πανεπιστημίου" value='<?php echo "$row2[6]"?>'>

                            <label class="fieldlabels">Τμήμα Πανεπιστημίου</label>
                            <input name="department" id="department" type="text" placeholder="Τμήμα Πανεπιστημίου" value='<?php echo "$row2[4]"?>'>

                            <label class="fieldlabels">Τίτλος Σπουδών: *</label> 
                            <input name="title" id="title" placeholder="Τίτλος Σπουδών" value='<?php echo "$row2[8]"?>'/>

                            <label class="fieldlabels">Πιστωτικές Μονάδες (ECTS): *</label> 
                            <input type="text" name="ects" id="ects" placeholder="Πιστωτικές Μονάδες (ECTS)" value='<?php echo "$row2[7]"?>'/>
                            
                            <label class="fieldlabels">Ημερομηνία Eγγραφής: *</label> 
                            <input type="date" name="regDate" id="regDate" placeholder="Ημερομηνία Eγγραφής" value='<?php echo "$row2[9]"?>'/>

                            <label class="fieldlabels">Ημερομηνία Aποφοίτησης: *</label> 
                            <input type="date" name="gradDate" id="gradDate" placeholder="Ημερομηνία Aποφοίτησης" value='<?php echo "$row2[10]"?>'/>

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
                                    <h2 class="steps">Βήμα 3 / 5</h2>
                                </div>
                            </div>
                            <label class="fieldlabels">Ταυτότητα:</label> 
                            <input type="file" name="adtPhoto" id="adtPhoto" accept="image/*">

                            <label class="fieldlabels">Πτυχίο:</label> 
                            <input type="file" name="gradPhoto" id="gradPhoto" accept="image/*">

                            <label class="fieldlabels">Αποδικτικό Πιστοτικών Μοναδών (ECTS):</label> 
                            <input type="file" name="ectsPhoto" id="ectsPhoto" accept="image/*">

                        </div> 
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
                                    <h2 class="steps">Βήμα 4 / 5</h2>
                                </div>
                            </div>
                            <div class="card">
                                Η πληρωμή σας έγινε επιτυχώς.
                            </div>
                        </div> 
                        <input type="button" name="previous" class="previous action-button-previous" value="Προηγούμενο" />
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
      <script id="rendered-js" >
$(document).ready(function () {

  var current_fs, next_fs, previous_fs; //fieldsets
  var opacity;
  var current = 1;
  var steps = $("fieldset").length;

  setProgressBar(current);

  $(".next").click(function () {

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    //Add Class Active
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({ opacity: 0 }, {
      step: function (now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
          'display': 'none',
          'position': 'relative' });

        next_fs.css({ 'opacity': opacity });
      },
      duration: 500 });

    setProgressBar(++current);
  });

  $(".previous").click(function () {

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();

    //hide the current fieldset with style
    current_fs.animate({ opacity: 0 }, {
      step: function (now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
          'display': 'none',
          'position': 'relative' });

        previous_fs.css({ 'opacity': opacity });
      },
      duration: 500 });

    setProgressBar(--current);
  });

  function setProgressBar(curStep) {
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar").
    css("width", percent + "%");
  }

  $(".submit").click(function () {
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
