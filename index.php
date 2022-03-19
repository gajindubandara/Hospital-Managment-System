<?php
include("config.php");
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Home</title>
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.ico"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>

<body class="bg">
<?php
 if(isset($_SESSION["p_un"])){
    include 'nav & footer/nav.php';
}
 else{
     include 'nav & footer/loginNav.php';
 }
?>
<!--<div class="col-md-12" >-->
<!--    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">-->
<!--        <div class="carousel-inner">-->
<!--            <div class="carousel-item active">-->
<!--                <img class="d-block w-100" src="images/bg.jpg" alt="First slide">-->
<!--                <div class="carousel-caption d-none d-md-block">-->
<!--                    <h1>hello</h1>-->
<!--                    <p>...</p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="carousel-item">-->
<!--                <img class="d-block w-100" src="images/bg.jpg"" alt="Second slide">-->
<!--                <div class="carousel-caption d-none d-md-block">-->
<!--                    <h1>asfsa</h1>-->
<!--                    <p>...</p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="carousel-item">-->
<!--                <img class="d-block w-100" src="images/bg.jpg"" alt="Third slide">-->
<!--                <div class="carousel-caption d-none d-md-block">-->
<!--                    <h1>asf</h1>-->
<!--                    <p>...</p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">-->
<!--            <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
<!--            <span class="sr-only">Previous</span>-->
<!--        </a>-->
<!--        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">-->
<!--            <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
<!--            <span class="sr-only">Next</span>-->
<!--        </a>-->
<!--    </div>-->
<!--</div>-->


<div class="container features CardBgCol">
    <div class="heading" style="margin-top: 0px !important;">
        <h1 class="heading__title" style="margin-top: 30px !important;">Clinic Management System</h1>
        <p class="heading__credits" style="margin-bottom: 0px !important; font-size: 20px"> Our System Software helps deliver superior healthcare delivery for doctors, clinics and hospitals.</p>
        <p class="heading__credits" style="    margin-bottom: 10px !important;"> Designed by Team Error 404</p>
        <img src="images/favicon.ico" class="img-bg">
    </div>
</div>




<!--<div class="container features CardBgCol ">-->
<!--    <h1 class="cardTitle">Our Features...</h1>-->
<!--    <div class="row justify-content-center">-->
<!---->
<!---->
<!---->
<!--         <div class="row justify-content-end">-->
<!--                <div class="card text-white bg-primary mb-3" style="max-width: 35rem; height: 210px;">-->
<!--                    <div class="card-body">-->
<!--                        <h2 class="card-title">Primary card title</h2>-->
<!--                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of-->
<!--                            the-->
<!--                            card's content.</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            <div class="card text-white bg-success mb-3" style="max-width: 35rem; height: 210px;">-->
<!--                <div class="card-body">-->
<!--                    <h2 class="card-title">Primary card title</h2>-->
<!--                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of-->
<!--                        the-->
<!--                        card's content.</p>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            </div>-->
<!---->
<!--            <div class="row justify-content-start">-->
<!--                <div class="card text-white bg-secondary mb-3" style="max-width: 35rem; height: 210px;">-->
<!--                    <div class="card-body">-->
<!--                        <h2 class="card-title">Primary card title</h2>-->
<!--                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of-->
<!--                            the-->
<!--                            card's content.</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--          </div>-->
<!---->
<!--           <div class="row justify-content-end">-->
<!--                <div class="card text-white bg-success mb-3" style="max-width: 35rem; height: 210px;">-->
<!--                    <div class="card-body">-->
<!--                        <h2 class="card-title">Primary card title</h2>-->
<!--                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of-->
<!--                            the-->
<!--                            card's content.</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--</div>-->




<div class="container features CardBgCol">
    <h1 class="cardTitle">Our System...</h1>
    <div class="row center">
        <div class="col-lg-4 col-md-3 col-sm-6">
            <div class="numCard">
                <h1 class="h1">20+</h1>
                <h5 class="h5">Hospitals</h5>
            </div>
        </div>
        <div class="col-lg-4 col-md-3 col-sm-6">
            <div class="numCard">
                <h1 class="h1">100+</h1>
                <h5 class="h5">Doctors</h5>
            </div>
        </div>
        <div class="col-lg-4 col-md-3 col-sm-6">
            <div class="numCard">
                <h1 class="h1">1000+</h1>
                <h5 class="h5">Patients</h5>
            </div>
        </div>

    </div>
</div>



<!--<div class="container features ">-->
<!---->
<!--    <div class="row center CardBgCol">-->
<!---->
<!--        <div class=" col-md-6 ">-->
<!--                <h1 class="cardTitle">About Us!</h1>-->
<!--                <p class="aboutUs">-->
<!--                    We are a group of Cardiff Metropolitan University first-year students in the United Kingdom. To-->
<!--                    address the current difficulties in government hospital clinic systems, we developed a Clinic-->
<!--                    Management System. This program includes a number of features that will benefit clinical personnel,-->
<!--                    doctors, and patients.-->
<!--                </p>-->
<!---->
<!--        </div>-->
<!---->
<!---->
<!--        <div class=" col-md-6 ">-->
<!--            <img src="images/img.jpg" style="width: 50px">-->
<!--        </div>-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--</div>-->










<?php include 'nav & footer/footer.php' ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>


</body>

</html>