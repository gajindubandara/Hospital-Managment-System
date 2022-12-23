<?php
require("login-check/logincheck_A&D.php");
include("config.php");
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Patient Reports</title>
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
            <h3 class="feature-title">Patient Report</h3>
        </div>
    </div>
</div>
<div class="container features" style="margin-top: 0px !important;">
    <div class="row center" >
        <div class=" CardBgCol col-md-8">
            <form method="post" enctype="multipart/form-data">
                <?php
                try {
                    $num = $_SESSION["pNic"];
                    include 'repository/PatientService.php';
                    $profile = new PatientService();
                    $result=$profile->getPatient($num);

                    echo '<table class="table">';
                    foreach ($result as $row) {
                        echo '<tbody>';
                        echo '<td><b>Name:</b></td>';
                        echo '<td>' . $row[0] . '</td>';
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
                        echo '<td>' . $row[5] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td><b>NIC:</b></td>';
                        echo '<td>' . $row[1] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td><b>Date of Birth:</b></td>';
                        echo '<td>' . $row[6] . '</td>';
                        echo '</tr>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td><b>Gender:</b></td>';
                        echo '<td>' . $row[8] . '</td>';
                        echo '</tr>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td><b>Blood Group:</b></td>';
                        echo '<td>' . $row[7] . '</td>';
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


<?php

        try {
            $num = $_SESSION["pNic"];
            include 'repository/DiagnosisService.php';
            include 'repository/DoctorService.php';
            $ap = new DiagnosisService();
            $result=$ap->getPatientDiagnosis($num);
            $doc = new DoctorService();

            echo '<div class="container features">
            <div class="row center" >
            <div class=" CardBgCol col-md-8">';
            echo '<form method="post">';

            foreach ($result as $row) {
                echo '<div class="datacard features CardBgCol">';
                echo '<h5 class="dataCard-header">' . $row[2] . '</h5>';
                echo '<div class="dataCard-body">';
                echo '<h5 class="card-title">' . $row[3] . '</h5>';
                echo '<p class="card-text">' . $row[4] . '</p>';
                echo '<p class="card-text">*** ' . $row[5] . '</p>';
                $docName=$doc->getDoctor($row[1]);
                foreach ($docName as $r) {
                    echo '<p class="card-text" style="color: #4b4a4a; text-align: end;"> Diagnosed by Dr. ' . $r[0] . '</p>';
                }
                if (isset($_SESSION["a_un"])) {
                    echo '<td><button class="recordDel  btn-secondary btn-block" name="delRecord" type="submit"  value="' . $row[6] . '">Delete Record </button></td>';
                }
                echo '</div>';
                echo '</div>';
            }
            echo '</form>';
            echo '</div></div></div>';
        } catch (PDOException $th) {

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delRecord'])) {
//        include 'repository/DiagnosisService.php';
//        $ds = new DiagnosisService();
        $recordId=$_POST['delRecord'];
//        echo "<script> alert(".$recordId.");</script>";
        try {

            $check=$ap->deleteDiagnosis($recordId);

                if ($check==1){
                    echo "<script> alert('Record deleted!');</script>";
                    echo '<script>window.location.href = "patient_report.php";</script>';

                }
                else{
                    echo "<script> alert('failed!');</script>";
                }
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
    }
}
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
?>

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