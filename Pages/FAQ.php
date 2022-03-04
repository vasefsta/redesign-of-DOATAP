<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .section_padding_130 {
            padding-top:100px;
            padding-bottom: 130px;
        }

        .faq_area {
            position: relative;
            z-index: 1;
            background-color: #f2f2f2;
        }

        .faq-accordian {
            position: relative;
            z-index: 1;
        }

        .faq-accordian .card {
            position: relative;
            z-index: 1;
            margin-bottom: 1.5rem;
        }

        .faq-accordian .card:last-child {
            margin-bottom: 0;
        }

        .faq-accordian .card .card-header {
            background-color: #ffffff;
            padding: 0;
            border-bottom-color: #ebebeb;
        }

        .faq-accordian .card .card-header h6 {
            cursor: pointer;
            padding: 1.75rem 2rem;
            color: #3f43fd;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -ms-grid-row-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .faq-accordian .card .card-header h6 span {
            font-size: 1.5rem;
        }

        .faq-accordian .card .card-header h6.collapsed {
            color: #070a57;
        }

        .faq-accordian .card .card-header h6.collapsed span {
            -webkit-transform: rotate(-180deg);
            transform: rotate(-180deg);
        }

        .faq-accordian .card .card-body {
            padding: 1.75rem 2rem;
        }

        .faq-accordian .card .card-body p:last-child {
            margin-bottom: 0;
        }

        @media only screen and (max-width: 575px) {
            .support-button p {
                font-size: 14px;
            }
        }

        .support-button i {
            color: #3f43fd;
            font-size: 1.25rem;
        }

        @media only screen and (max-width: 575px) {
            .support-button i {
                font-size: 1rem;
            }
        }

        .support-button a {
            text-transform: capitalize;
            color: #2ecc71;
        }

        @media only screen and (max-width: 575px) {
            .support-button a {
                font-size: 13px;
            }
        }

        .breadcrumb {
            background-color: #f2f2f2 !important;
        }
        ul.breadcrumb {
        margin-left: 14.2%;
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
        include("../navbar/navbar.php")
        ?>


<div class="faq_area section_padding_130" id="faq">
    <div breadcr>
        <ul class="breadcrumb">
        <li><a href="../index.php">Αρχική</a></li>
        <li><a href="#">Ενημέρωση</a></li>
        <li style="color: #585858;">Συχνές Ερωτήσεις</li>
        </ul>
    </div>
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-lg-6">
                    <!-- Section Heading-->
                    <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <h3><span>Συχνές</span> Ερωτήσεις</h3>
                        <br>
                        <br>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- FAQ Area-->
                <div class="col-12 col-sm-10 col-lg-8">
                    <div class="accordion faq-accordian" id="faqAccordion">
                        <div class="card border-0 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <div class="card-header" id="headingOne">
                                <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Πως μπορώ να υποβάλω μια νέα αίτηση;<span class="lni-chevron-up"></span><i class='fa fa-angle-down'></i></h6>
                            </div>
                            <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#faqAccordion">
                                <div class="card-body">
                                    <p>Αρχικά θα χρειαστεί να συνδεθείτε στον λογαριασμό σας. Αν δεν έχετε λογαριασμό μπορείτε να εγγραφείτε στην υπηρεσία μας.</p>
                                    <p>Στη συνέχεια από το μενού επιλέξτε την καρτέλα αιτήσεις και ακολούθως την επιλογή "Νέα Αίτηση".</p>
                                    <p>Τέλος συμπληρώστε την αίτηση σας, πληρώστε διαδικτυακά και κάντε υποβολή.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                            <div class="card-header" id="headingTwo">
                                <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Τι χρειάζεται για να δημιουργήσω λογαριασμό;<span class="lni-chevron-up"></span><i class='fa fa-angle-down'></i></h6>
                            </div>
                            <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                                <div class="card-body">
                                    <p>Για τη δημιουργεία του λογαριασμού σας θα χρειαστείτε μια διεύθυνση ηλεκτρονικού ταχυδρομείου και να μην έχετε δημιουργήσει ήδη κάποιο λογαριασμό στην υπηρεσία μας.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                            <div class="card-header" id="headingThree">
                                <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Δεν μπορώ να συνδεθώ στο λογαριασμό μου. Τι πρέπει να κάνω;<span class="lni-chevron-up"></span><i class='fa fa-angle-down'></i></h6>
                            </div>
                            <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#faqAccordion">
                                <div class="card-body">
                                    <p>
                                        Βεβαιωθείτε ότι η διεύθυνση ηλεκτρονικού ταχυδρομείου και ο κωδικός που εισάγετε είναι σωστεί. Αν το προβλήμα
                                        εξακολουθεί να υπάρχει μπορείτε να επικοινωνήσετε μαζί μας στο τηλέφωνο +30 210 012 3456
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                            <div class="card-header" id="headingFour">
                                <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">Τι δικαιολογητικά χρειάζομαι για να κάνω μια αίτηση;<span class="lni-chevron-up"></span><i class='fa fa-angle-down'></i></h6>
                            </div>
                            <div class="collapse" id="collapseFour" aria-labelledby="headingFour" data-parent="#faqAccordion">
                                <div class="card-body">
                                    <p>
                                    <ul>
                                        <li>
                                            Δελτίο Αστυνομικής Ταυτότητας.
                                        </li>
                                        <li>
                                            Το πτυχίο σας.
                                        </li>
                                        <li>
                                            Αποδεικτικό των πιστωτικών μονάδων.
                                        </li>
                                    </ul>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                            <div class="card-header" id="headingFive">
                                <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">Τι χρειάζομαι για να κάνω μια αίτηση;<span class="lni-chevron-up"></span><i class='fa fa-angle-down'></i></h6>
                            </div>
                            <div class="collapse" id="collapseFive" aria-labelledby="headingFive" data-parent="#faqAccordion">
                                <div class="card-body">
                                    <p>
                                        Για να κάνετε μια νέα αίτηση χρειάζεται:
                                    <ul>
                                        <li>
                                            Να έχετε λογαριασμό στην υπηρεσία μας
                                        </li>
                                        <li>
                                            Nα έχετε σε ηλεκτρονική μορφή ( σκαναρισμένα ή σε φωτογραφία) τα απαραίτητα δικαιολογητικά.
                                        </li>
                                        <li>
                                            Να πληρώσετε το ποσό των €0,00
                                        </li>
                                    </ul>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                            <div class="card-header" id="headingSix">
                                <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">Σε πόσο καιρό θα αναγνωριστεί το πτυχίο μου;<span class="lni-chevron-up"></span><i class='fa fa-angle-down'></i></h6>
                            </div>
                            <div class="collapse" id="collapseSix" aria-labelledby="headingSix" data-parent="#faqAccordion">
                                <div class="card-body">
                                    <ul>
                                        <li>
                                            Κάθε αίτηση έχει έναν νεκρό χρόνο αναμονής από την υποβολή της μέχρι τον προέλεγχο, που ανέρχεται σήμερα στις 40 ημέρες για όλες τις αιτήσεις οριζόντια.
                                        </li>
                                        <li>
                                            Οι χρόνοι διεκπεραίωσης διαφέρουν σημαντικά ανάλογα με τον κλάδο και τον τύπο του τίτλου (βασικό, μεταπτυχιακό, διδακτορικό).
                                            Μεταξύ τίτλων ίδιου κλάδου και ίδιου τύπου ο χρόνος διεκπεραίωσης είναι ίδιος.
                                        </li>
                                        <li>
                                            Υπάρχουν κλάδοι που έχουν χρόνο διεκπεραίωσης (μετά τη λήψη Αριθμού Πρωτοκόλλου) 1-2 μήνες,
                                            αλλά και κλάδοι που έχουν χρόνο διεκπεραίωσης 12-14 μήνες. Ενδιάμεσα, υπάρχουν κλάδοι με χρόνους 3-4 μηνών μέχρι και 8-9 μηνών.
                                        </li>
                                    </ul>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                            <div class="card-header" id="headingSeven">
                                <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">Θα ειδοποιηθώ όταν ολοκληρωθεί η αναγνώριση και θα μου την στείλετε στην διεύθυνση μου;<span class="lni-chevron-up"></span><i class='fa fa-angle-down'></i></h6>
                            </div>
                            <div class="collapse" id="collapseSeven" aria-labelledby="headingSeven" data-parent="#faqAccordion">
                                <div class="card-body">
                                    <p>
                                        Όταν η αίτηση σας αλλάξει κατάσταση θα ειδοποιηθήτε και στο προφίλ σας και θα σας σταλεί μήνυμα στο ηλεκτρονικό σας ταχυδρομείο
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="support-button text-center d-flex align-items-center justify-content-center mt-4 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                        <i class="lni-emoji-sad"></i>
                        <p class="mb-0 px-2">Δεν βρήκατε αυτό που ψάχνετε;</p>
                        <a href="/DOATAP/Pages/Contact/Contact.php"> επικοινωνήσετε μαζί μας</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>