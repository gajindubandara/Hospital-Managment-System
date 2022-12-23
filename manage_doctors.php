<?php
require("login-check/logincheck_A.php");
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Doctors</title>
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.ico"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body class="bg">
<?php include 'nav & footer/nav.php' ?>
<div class="main-container">
    <div class="heading">
        <h1 class="heading__title">Clinic Management System</h1>
    </div>
    <div class="cards">
        <div class="card card-1">
            <h2 class="card__title">Doctors Register</h2>
            <p class="card__apply">
                <a class="card__link" href="doc_register.php"> Click Here <i class="fas fa-arrow-right"></i></a>
            </p>
        </div>
        <div class="card card-2">
            <h2 class="card__title">Add A New Doctor</h2>
            <p class="card__apply">
                <a class="card__link" href="doc_reg.php">Click Here <i class="fas fa-arrow-right"></i></a>
            </p>
        </div>
        <div class="card card-3">
            <h2 class="card__title">Bookings</h2>
            <p class="card__apply">
                <a class="card__link" href="admin_view_bookings.php"> Click Here <i
                            class="fas fa-arrow-right"></i></a>
            </p>
        </div>
    </div>
</div>
<img src="images/img.jpg" class="img-bg">
<?php include 'nav & footer/footer.php' ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>