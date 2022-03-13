<?php
include("config.php");
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Login</title>
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
<div class="col-md-12" >
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="images/bg.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1>hello</h1>
                    <p>...</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/bg.jpg"" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1>asfsa</h1>
                    <p>...</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/bg.jpg"" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1>asf</h1>
                    <p>...</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="container features">
    <h1 style="text-align: center;margin:10px 0px 10px 0px">Clinic Management System</h1>
</div>

<div class="container features ">
    <div class="row center">
        <div class=" col-md-12">
            <div class="aboutus">
                <h1>About Us</h1>
                <p>
                    Why do we use it?
                    It is a long established fact that a reader will be distracted by the readab
                    le content of a page when looking at its layout. The point of using Lorem
                    Ipsum is that it has a more-or-less normal distribution of letters, as opposed t
                    o using 'Content here, content here', making it look like readable English. Many
                    desktop publishing packages and web page editors now use Lorem Ipsum as their de
                    fault model text, and a search for 'lorem ipsum' will uncover many web sites still
                    in their infancy. Various versions have evolved over the years, sometimes by accide
                    nt, sometimes on purpose (injected humour and the like).
                </p>

            </div>
        </div>
    </div>
</div>

<div id="wrapper">
</section>





    </div>
</section>
</div>
































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