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
    </div>
</div>

<!--<div class="container features ">-->
<!--    <div class="row center CardBgCol">-->
<!--        <div class=" col-md-12 ">-->
<!--            <h1 class="cardTitle">Our Hospital</h1>-->
<!--            <div class="map-responsive">-->
<!--                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3957.5881070161327!2d80.6322636!3d7.2876155!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae36882b22910bf%3A0x82b71793a1e570c5!2sNational%20Hospital%20-%20Kandy!5e0!3m2!1sen!2slk!4v1648022317800!5m2!1sen!2slk"-->
<!--                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

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
