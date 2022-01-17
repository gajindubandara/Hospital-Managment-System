<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<nav class="navbar navbar-expand-md">
    <a class="navbar-brand" href="#">Clinic Management System</a>
    <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main-navigation">
        <ul class="navbar-nav" id="nav">

            <?php
            if(isset($_SESSION["a_un"]))
            {
                echo '
            <li class="nav-item">
                <a class="nav-link" href="index_d.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="report.php">Reports</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Patient Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add.php">New Patient</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="newDiagnose.php"> Add Diagnose</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="change_password_admin.php"> Reset patient Password</a>
            </li>';
            }

            else if (isset($_SESSION["d_un"]))
            {
                echo '
            <li class="nav-item">
                <a class="nav-link" href="index_d.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="report.php">Reports</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Patient Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add.php">New Patient</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="newDiagnose.php"> Add Diagnose</a>
            </li>';
            }
            else if(isset($_SESSION["p_un"]))
            {
                echo '
            <li class="nav-item">
                <a class="nav-link" href="index_p.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="change_password.php">Change Password</a>
            </li>
            <li class="nav-item">';
            }?>


            <li class="nav-item">
                <form method="post">
                    <button class="logout" type="submit" name="logout">Logout <i class='fas fa-sign-out-alt' style='color:white'></i></button>

                </form>
<!--                <a class="nav-link" name="logout">Logout</a>-->
                <?php

                if (isset($_POST["logout"]))
                {
                    unset($_SESSION["a_un"]);
                    unset($_SESSION["d_un"]);
                    unset($_SESSION["p_un"]);
                    header("location:login.php");
                }
                ?>
            </li>

        </ul>

    </div>
</nav>

</body>
</html>