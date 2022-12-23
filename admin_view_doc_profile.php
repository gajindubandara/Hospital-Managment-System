<?php
require("login-check/logincheck_A.php");
include("config.php");
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Doctor</title>
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
<div class="container features">
    <div class="row center">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <h3 class="feature-title">Doctor Profile</h3>
        </div>
    </div>
</div>
<div class="container features" style="margin-top: 0px !important;">
    <div class="row center" >
        <div class=" CardBgCol col-md-8">
            <form method="post" enctype="multipart/form-data">
                <?php
                try {
                    $num = $_SESSION["dNic"];
                    include 'repository/DoctorService.php';
                    $profile = new DoctorService();
                    $result=$profile->getDoctor($num);

                    echo '<table class="table">';
                    foreach ($result as $row) {
                        echo '<tbody>';
                        echo '<tr>';
                        echo '<td><b>Name:</b></td>';
                        echo '<td>' . $row[0] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td><b>NIC:</b></td>';
                        echo '<td>' . $row[1] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td><b> Phone Number:</b></td>';
                        echo '<td>' . $row[4] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td><b>Email:</b></td>';
                        echo '<td>' . $row[2] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td><b>Address:</b></td>';
                        echo '<td>' . $row[8] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td><b>Gender:</b></td>';
                        echo '<td>' . $row[5] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td><b>Specialized Field:</b></td>';
                        echo '<td>' . $row[6] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td><b>Qualifications:</b></td>';
                        echo '<td>' . $row[7] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td><b>Rate per Session:</b></td>';
                        echo '<td>' . $row[9] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td><b>Patients per Day:</b></td>';
                        echo '<td>' . $row[10] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td><b>Available Days:</b></td>';
                        echo '<td>' . $row[11] . '</td>';
                        echo '</tr>';
                        echo ' </tbody>';
                    }
                    echo '</table>';
                } catch (PDOException $th) {
                    echo $th->getMessage();
                }
                error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
                ?>
            </form>
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