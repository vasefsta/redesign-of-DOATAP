<?php
  session_start();
?>

<link rel="stylesheet" href="/DOATAP/navbar/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<nav>
      <a href="/DOATAP/index.php" class="logo"><img src="/DOATAP/img/logo.png" alt="Doatap" /></a>
      <ul>
        <li><a class="active" href="/DOATAP/index.php">Αρχική</a></li>
        <li>
          <a href="#">Αιτήσεις <i class='fa fa-angle-down'></i></a>
          
          <ul>
            <li><a href="/DOATAP/Pages/Applications/NewApplication.php">Νέα Αίτηση</a></li>
            <li><a href="/DOATAP/Pages/MyApplications.php">Οι Αιτήσεις μου</a></li>
          </ul>
        </li>
        <li>
          <a href="#"
            >Ενημέρωση <i class='fa fa-angle-down'></i></a>
          <ul>
            <li><a href="#">Νομοθεσία</a></li>
            <li><a href="#">Ανακοινώσεις</a></li>
            <li><a href="/DOATAP/Pages/FAQ.php">Συχνές Ερωτήσεις</a></li>
            <li><a href="/DOATAP/Pages/Applications/DummyApplication.php">Ενδεικτική Αίτηση</a></li>

          </ul>
        </li>
        <li><a href="/DOATAP/Pages/Contact/Contact.php">Επικοινωνία</a></li>
        <li class="language"><a href="#">ΕΛ <i class='fa fa-angle-down'></i></a>
        <ul>
          <li><a href="#">EN</a></li>
        </ul>
        </li>
        <?php
          if (isset($_SESSION{"userid"})) {
            echo '<li class="sign-in"><a href="#">' . $_SESSION["name"] . ' ' . $_SESSION["surname"] . ' <i class="fa fa-angle-down"></i></a>
                    <ul>
                      <li><a href="/DOATAP/Pages/Profile/Me.php">Το Προφίλ μου</a></li>
                      <li><a href="/DOATAP/includes/logout.inc.php">Αποσύνδεση</a></li>
                    </ul>                  
                  </li>';
          } else {
            echo '<li class="sign-in"><a href="/DOATAP/Pages/LoginForm/Login.php">Σύνδεση</a></li>';
          }
        ?>
      </ul>
    </nav>
