<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="shortcut icon" type="image/jpg" href="images/favicon.ico"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
<!--    stat card-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css" rel="stylesheet">

    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
            integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
    ></script>

</head>
<body class="bg">
<?php
if (isset($_SESSION["p_un"])) {
    include 'nav & footer/nav.php';
} else {
    include 'nav & footer/loginNav.php';
}

include 'repository/getStats.php';
?>

<div class="container features CardBgCol">
    <div class="heading" style="margin-top: 0px !important;">
        <h1 class="heading__title" style="margin-top: 30px !important;">Clinic Management System</h1>
        <p class="heading__credits" style="margin-bottom: 0px !important;  font-weight: 400;"> Our System Software helps
            deliver superior healthcare delivery for doctors, clinics and hospitals.</p>
                <p class="heading__credits" style="    margin-bottom: 10px !important;font-weight: 400;font-size: 25px;">
                    Designed by Team Enigma</p>
        <div class="heart-box">
            <img src="images/favicon.ico" class="heart">
        </div>
        <div class="header-body" style="margin: 40px 0px 40px 0px">
            <div class="row">
                <div class="col-md-4">
                    <div class="statCard card-stats mb-4 mb-xl-0">
                        <div class="statCard-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="statCard-title text-uppercase text-muted mb-0">Our Doctors</h5>
                                    <span class="h2 font-weight-bold mb-0">
                                        <?php
                                        $profile = new getStats();
                                        echo $result=$profile->getNoOfDocs();
                                        ?>
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-stethoscope"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="statCard card-stats mb-4 mb-xl-0">
                        <div class="statCard-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="statCard-title text-uppercase text-muted mb-0"> Total Users</h5>
                                    <span class="h2 font-weight-bold mb-0">
                                        <?php
                                        $profile = new getStats();
                                        echo $result=$profile->getNoOfUsers();
                                        ?>
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="statCard card-stats mb-4 mb-xl-0">
                        <div class="statCard-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="statCard-title text-uppercase text-muted mb-0">Appointments</h5>
                                    <span class="h2 font-weight-bold mb-0">
                                        <?php
                                        $profile = new getStats();
                                        echo $result=$profile->getNoOfAppointments();
                                        ?>
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="container features ">
    <div class="row center CardBgCol">
        <div class=" col-md-12 ">
            <h1 class="cardTitle">About Us!</h1>
            <!--            <p class="aboutUs"><i class="fa fa-plus-square" style='font-size:48px;color:black'></i></p>-->
            <p class="aboutUs" style="margin-bottom: 20px">
                Family-Care Clinic Management Sri Lanka is dedicated to providing quality healthcare to families in the
                community. We offer online appointments for your convenience, making it easy to access our services from
                the comfort of your own home. Our team of experienced medical professionals is committed to delivering
                the best possible care to every patient. With a warm and welcoming environment, you can trust that you
                and your loved ones are in good hands at Family-Care Clinic Management Sri Lanka. We believe in putting
                the needs of our patients first, and work tirelessly to ensure that everyone who walks through our doors
                receives the care and attention they deserve.
            </p>
        </div>
    </div>
</div>


<?php include 'nav & footer/footer.php' ?>
<!-- Core -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/headroom/0.10.4/headroom.min.js"></script>
<!-- Optional JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.0.3/nouislider.min.js"></script>

<!--Mustache.js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.min.js"></script>

</body>
</html>
