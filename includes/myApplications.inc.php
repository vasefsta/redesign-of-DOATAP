

 <style>
   .content-table {
     border-collapse: collapse;
     margin-top: 5%;
     margin-left: 11%;
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

   .title {
     padding-top: 8%;
     margin-left: 40%;
   }

   *{
     font-family: Arial, Helvetica, sans-serif;
   }
 </style>

<div class="title">
  <h2>Οι Αιτήσεις μου</h2>

</div>

 <?php
  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';
  session_start();
  $usersId = $_SESSION["userid"];


  $sql = "SELECT * FROM application WHERE usersId = $usersId";

  if ($result = mysqli_query($conn, $sql)) {

    if (mysqli_num_rows($result) == 0) {
      echo "Δεν έχετε κάνει κάποια αίτηση ακόμη";
    } else {
      echo "<table class='content-table'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>Αριθμός Αίτησης</th>";
      echo "<th>Είδος Πτυχίου</th>";
      echo "<th>Τίτλος Σπουδών</th>";
      echo "<th>Πανεπιστήμιο</th>";
      echo "<th>Προβολή</th>";
      echo "<th>Κατάσταση Αίτησης</th>";
      echo "<th>Διαγραφή</th>";
      echo "</tr>";
      echo "</thead>";

      echo "<tbody>";
      while ($row = mysqli_fetch_row($result)) {
        echo "<tr>";
        echo "<td><strong>$row[0]</strong></td>";
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
        if($row[14] == "saved"){
          echo "<td><a href='/DOATAP/includes/editApplication.inc.php?id=$row[0]'>Επεξεργασία</a></td>";
        } else{
          echo "<td><a href='/DOATAP/includes/viewApplication.inc.php?id=$row[0]'>Προβολή</a></td>";
        }
        if ($row[14] == NULL) {
          echo "<td>Δεν συμπληρώθηκε</td>";
        } else {
          if ($row[14] == "accepted") {
              echo "<td><strong>Εγκρίθηκε</strong></td>";
              echo "<td>Οριστικοποιημένη</td>";
          } 
          else if ($row[14] == "saved") {
            echo "<td><strong>Προσωρινά Αποθηκευμένη</strong></td>";
            echo "<td><a href='/DOATAP/includes/deleteApplication.inc.php?id=$row[0]'><img class='x-icon' src='https://cdn-icons-png.flaticon.com/512/1828/1828851.png' width='25px'/></a></td>";
          }
          else if ($row[14] == "rejected") {
              $sql = "SELECT report from applicationReport where applicationId=$row[0];";
              $result1 = mysqli_query($conn, $sql);
              $row2 = mysqli_fetch_row($result1);

              echo "<td><strong>Απορρίφθηκε: $row2[0]</strong></td>";
              echo "<td>Οριστικοποιημένη</td>";
          }
          else if ($row[14] == "submitted") {
              echo "<td><strong>Υποβλήθηκε</strong></td>";
              echo "<td>Οριστικοποιημένη</td>";
          }
          else if ($row[14] == "pending") {
              echo "<td><strong>Σε εκκρεμότητα</strong></td>";
              echo "<td>Οριστικοποιημένη</td>";
          }
      }
        echo "</tr>";
      }
      echo "</tbody>";
      echo "</table>";
      mysqli_free_result($result);
    }
  }

  mysqli_close($conn);
