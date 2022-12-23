<?php
session_start();
include("config.php");
require("login-check/logincheck_A.php");
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
<form method="post">
    <div class="container features">
        <div class="row center">
            <div class="col-md-8 CardBgCol">
                <h3 class="feature-title"> Create new Inquire</h3>
                <div class="form-group">

                    <input type="text" name="title"  placeholder="Title" class="form-control"  required/>

                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Description" rows="4" name="dis"
                              required></textarea>
                </div>

                <div class="form-group">
                    Date:
                    <?php $date = date("Y-m-d");
                    echo $date;
                    ?>
                </div>
                <input type="submit" class="btn btn-primary" value="Create Inquire" name="btnI"
                       style="margin-bottom: 20px">
            </div>
        </div>
    </div>
</form>

<?php
    include 'model/Inquire.php';
    include 'repository/InquireService.php';
    $i = new Inquire();
    $is = new InquireService();
    $result=$is->getMyInquires($_SESSION["p_un"]);
    echo '<div class="container features">
                <div class="row center" >
                <div class=" CardBgCol col-md-8">';


    echo '<form method="post">';
    foreach ($result as $row) {

        echo '<div class="datacard features CardBgCol">';
        echo '<h5 class="dataCard-header">' . $row[1] . '</h5>';
        echo '<div class="dataCard-body">';
        echo '<h5 class="card-title">' . $row[2] . '</h5>';
        echo '<p class="card-text">Inquire ID :- ' . $row[0] . '</p>';
        if ($row[5] == "open") {
            $iconColor = "green";
            $state="Review Pending";
        } else if($row[5] == "inProgress") {
            $iconColor = "yellow";
            $state="In Progress";
        }
        else if($row[5] == "finished") {

            $iconColor = "blue";
            $state="Finished";
        }
        echo '<p class="card-text"><i class="fas fa-circle" style="color:' . $iconColor . '"></i> ' . $state . '</p>';

        echo '<p class="card-text" style="color: #4b4a4a; text-align: end;"> Date. ' . $row[3] . '</p>';

        if (isset($_SESSION["a_un"])) {
            echo '<td><button class="recordDel  btn-secondary btn-block" name="delRecord" type="submit"  value="' . $row[4] . '">Delete Record </button></td>';
        }
        echo '</div>';
        echo '</div>';
    }
    echo '</form>';
    echo '</div></div></div>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['btnI'])) {


        $i->setTitle($_POST['title']);
        $i->setDescription($_POST['dis']);
        $i->setDate($date);
        $i->setPid($_SESSION["p_un"]);
        $i->setState("open");

        $result=$is->addInquire($i);


        if($result==1){
            echo "<script> alert('Inquire created!');</script>";
            echo '<script>window.location.href = "inquires.php";</script>';
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