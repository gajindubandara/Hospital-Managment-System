<?php
require("login-check/logincheck_D.php");
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>New Diagnosis</title>
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


<div class="container features" id="form">
    <div class="row center">
        <div class="col-md-8 CardBgCol">
            <h3 class="feature-title">Add new Diagnose</h3>

            <form action="" method="post">

                <div class="form-group">
                    <!--                    <div class="row center">-->
                    <input type="text" name="Patient" id="NIC" placeholder="NIC" class="form-control" onInput="checkNIC()" required/>
                    <span id="check-NIC"></span>
                    <!--                    </div>-->

                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Diagnosis" rows="4" name="Diagnosis"
                              required></textarea>
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Medications" rows="4" name="Medications"
                              required></textarea>
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Diagnosis Remarks" rows="4" name="Remarks"
                              required></textarea>
                </div>
                <div class="form-group">
                    Date:
                    <?php $date = date("Y-m-d");
                    echo $date;
                    ?>
                </div>
                <input type="submit" class="btn btn-primary" value="Add Diagnosis" name="addDiagnosis"
                       style="margin-bottom: 10px" id="submit">


            </form>
        </div>
    </div>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['addDiagnosis'])) {
        try {
            $doc = $_SESSION["d_un"];

            include 'model/Diagnosis.php';
            $diag =new Diagnosis();


            $pid=$diag->setPatientId($_POST["Patient"]);
            $did=$diag->setDoctorId($doc);
            $date=$diag->setDate($date);
            $diagnosis=$diag->setCauseOfDisease($_POST["Diagnosis"]);
            $medications=$diag->setMedication($_POST["Medications"]);
            $remarks=$diag->setDiagnosisRemarks($_POST["Remarks"]);





            //Write to db
            try {
                include 'repository/DiagnosisService.php';
                $add = new DiagnosisService();
                $check=$add->addDiagnosis($diag);


                if ($check==1){
                    echo "<script> alert('Diagnosis added Successfully!');</script>";
                }
                else{
                    echo "<script> alert('Diagnosis adding failed!');</script>";
                }
            }
            catch(Exception $ex){
                echo $ex;
            }
        } catch (PDOException $th) {
            echo $th;
        }
    }
}
?>

<img src="images/img.jpg" class="img-bg">
<?php include 'nav & footer/footer.php' ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function checkNIC() {
        $.ajax({
            url: "ajax/check_for_NIC.php",
            data: 'NIC=' + $("#NIC").val(),
            type: "POST",
            success: function (data) {
                $("#check-NIC").html(data);
            }
        });
    }
</script>
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"-->
<!--        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"-->
<!--        crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"-->
<!--        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"-->
<!--        crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"-->
<!--        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"-->
<!--        crossorigin="anonymous"></script>-->
</body>
</html>
</body>
</html>
