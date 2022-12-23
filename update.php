<?php
require("login-check/logincheck_A&D.php");
include("config.php");
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update</title>
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
        <div class="col-md-8 CardBgCol">
            <form method="post" enctype="multipart/form-data">
                <h3 class="feature-title">Update </h3>
                <?php
                try {
                    $num = $_SESSION["p_un"];
                    include 'repository/PatientService.php';
                    $profile = new PatientService();
                    $result=$profile->getPatient($num);

                    foreach ($result as $row) {
                        echo'<div class="form-group">
                    Name:
                    <input type="text" class="form-control" name="addName" value="' . $row[0] . '" required>
                </div>
                <div class="form-group">
                    NIC:
                    <input type="text" class="form-control" name="addNIC" value="' . $row[1] . '" readonly>
                </div>
                <div class="form-group">
                    Email:
                    <input type="email" class="form-control" name="addEmail" value="' . $row[2] . '" required>
                </div>
                <div class="form-group">
                    Contact Number:
                    <input type="number" class="form-control" name="addNum" value="' . $row[4] . '" required>
                </div>
                <div class="form-group">
                    Address:
                    <input type="text" class="form-control" name="addAddress" value="' . $row[5] . '" required>
                </div>

                <div class="form-group">
                    Birth Date:
                    <input type="date" class="form-control" name="addDob" value="' . $row[6] . '" required>
                </div>

                <div class="form-group">
                    Blood group:
                    <select class="form-control" name="addBG" required>
                        <option value="O+" name="" ';if($row[7]=="O+") echo ' selected="selected"'; echo'>O positive</option>
                        <option value="O-" name="" ';if($row[7]=="O-") echo ' selected="selected"'; echo'>O negative</option>
                        <option value="A+" name=""';if($row[7]=="A+") echo ' selected="selected"'; echo'>A positive</option>
                        <option value="A-" name="" ';if($row[7]=="A-") echo ' selected="selected"'; echo'>A negative</option>
                        <option value="B+" name="" ';if($row[7]=="B+") echo ' selected="selected"'; echo' >B positive</option>
                        <option value="B-" name="" ';if($row[7]=="B-") echo ' selected="selected"'; echo'>B negative</option>
                        <option value="AB+" name="" ';if($row[7]=="AB+") echo ' selected="selected"'; echo'>AB positive</option>
                        <option value="AB-" name="" ';if($row[7]=="AB-") echo ' selected="selected"'; echo'>AB negative</option>
                    </select>
                </div>
                <div class="form-group">
                    Gender:
                    <div class="addRadio" style="margin-left: 13%">
                        <input type="radio" name="addGender" value="Male"  ';if($row[8]=="Male") echo 'checked'; echo' >
                        <label>Male</label><br>
                        <input type="radio" name="addGender" value="Female" ';if($row[8]=="Female") echo ' checked'; echo'>
                        <label>Female</label><br>
                        <input type="radio" name="addGender" value="Other"';if($row[8]=="Other") echo ' checked'; echo'>
                        <label>Other</label><br>
                    </div>
                </div>';

                        echo '<input type="submit" class="btn btn-primary" value="Update" name="btnUpdate">';
                        echo '<input type="submit" style="margin-top: 10px;margin-bottom: 10px;" class="btn btn-primary" value="Cancel" name="btnCan">';
                    }
                } catch (PDOException $th) {
                    echo $th->getMessage();
                }
                ?>
            </form>
        </div>
    </div>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['btnUpdate'])) {
        try {
            include 'model/Patient.php';
            $patient=new Patient();

            $name = $patient->setName($_POST['addName']);
            $nic = $patient->setNic($_POST['addNIC']);
            $email = $patient->setEmail($_POST['addEmail']);
            $no = $patient->setTelNo($_POST['addNum']);
            $address = $patient->setAddress($_POST['addAddress']);
            $dob = $patient->setDob($_POST['addDob']);
            $bloodGroup = $patient->setBloodGroup($_POST['addBG']);
            $gender = $patient->setGender($_POST['addGender']);


            //            Write to db
            try {

                $update = new PatientService();
                $check=$update->updatePatient($patient);


                if ($check==1){

                    echo "<script> alert('Updated Successful!');</script>";
                    echo '<script>window.location.href = "myprofile.php";</script>';
                }
                else{
                    echo "<script> alert(' Failed!');</script>";
                }
            }
            catch(Exception $ex){
                echo $ex;

            }
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['btnCan'])) {
        echo '<script>window.location.href = "myprofile.php";</script>';
    }
}
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