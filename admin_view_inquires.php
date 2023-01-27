<?php
session_start();
include("config.php");
//require("login-check/logincheck_P.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inquires</title>

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
<?php include 'nav & footer/nav.php' ?>

<?php
include 'model/Inquire.php';
include 'repository/InquireService.php';
include 'repository/PatientService.php';
$i = new Inquire();
$is = new InquireService();
$patient=new PatientService();
$result=$is->getAllInquires();
echo '<div class="container features">
                <div class="row center" >
                <div class=" CardBgCol col-md-8">
                 <h3 class="feature-title">Inquires</h3>';


echo '<form method="post">';
foreach ($result as $row) {

    echo '<div class="datacard features CardBgCol">';
    echo '<h5 class="dataCard-header">' . $row[1] . '</h5>';
    echo '<div class="dataCard-body">';
    echo '<h5 class="card-title">' . $row[2] . '</h5>';
    echo'<div class="row" style="margin: 0px;">';
    echo '<p class="card-text">Inquire ID :- ' . $row[0] . '</p>';

    $patientName=$patient->getPatient($row[4]);
         foreach ($patientName as $r) {
               echo '<p class="card-text" style="margin-left: auto;">Name :- ' . $r[0] . '</p>';
            }

    echo'</div>';
    if ($row[5] == "1") {
        $iconColor = "green";
        $state="Review Pending";
        $style="display:block";
        $btn="Review";
    } else if($row[5] == "2") {
        $iconColor = "yellow";
        $state="In Progress";
        $style="display:block";
        $btn="Complete";
    }
    else if($row[5] == "3") {
        $iconColor = "blue";
        $state="Finished";
        $style="display:none";
    }

    echo'<div class="row" style="margin: 0px;">';
    echo '<p class="card-text"><i class="fas fa-circle" style="color:' . $iconColor . '"></i> ' . $state . '</p>';
    echo '<p class="card-text" style="color: #4b4a4a; text-align: end; margin-left: auto;"> Date. ' . $row[3] . '</p>';
    echo'</div>';
    echo '<td><button class="recordDel  btn-secondary btn-block" style="margin-top: 0px; ' . $style . '"  name="changeState" type="submit"  value="' . $row[0] . '">' . $btn . '</button></td>';
    echo '</div>';
    echo '</div>';
}
echo '</form>';
echo '</div></div></div>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['changeState'])) {
        $inquireId=$_POST['changeState'];
        $getInquire=$is->getById($inquireId);
        foreach ($getInquire as $row) {
            if ($row[5]== "open") {
                $result=$is->changeState($inquireId,"inProgress");
            }
            else if ($row[5]== "inProgress") {
                $result=$is->changeState($inquireId,"finished");
            }
        }

        if($result==1){
            echo "<script> alert('Inquire state updated!');</script>";
            echo '<script>window.location.href = "admin_view_inquires.php";</script>';
        }else{
            echo "<script> alert('failed');</script>";

        }
    }
}
?>
<img src="images/img.jpg" class="img-bg">
<?php include 'nav & footer/footer.php' ?>
</body>
</html>