<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="shortcut icon" type="image/jpg" href="images/favicon.ico"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


</head>
<body class="bg">
<?php include 'nav & footer/loginNav.php' ?>
<form method="post">
    <div class="container features">
        <div class="row center">
            <div class="col-md-8 CardBgCol">
                <h3 class="feature-title">Register</h3>
                <div class="form-group">
                    Name:
                    <input type="text" class="form-control" name="addName" required>
                </div>
                <div class="form-group">
                    NIC:
                    <input type="text" class="form-control" name="addNIC" required>
                </div>
                <div class="form-group">
                    Email:
                    <input type="email" class="form-control" name="addEmail" required>
                </div>
                <div class="form-group">
                    Contact Number:
                    <input type="number" class="form-control" name="addNum" required>
                </div>
                <div class="form-group">
                    Address:
                    <input type="text" class="form-control" name="addAddress" required>
                </div>

                <div class="form-group">
                    Birth Date:
                    <input type="date" class="form-control" name="addDob" required >
                </div>



                <div class="form-group">
                    Blood group:
                    <select class="form-control" name="addBG" required>
                        <option value="O+" name="">O positive</option>
                        <option value="O-" name="">O negative</option>
                        <option value="A+" name="">A positive</option>
                        <option value="A-" name="">A negative</option>
                        <option value="B+" name="">B positive</option>
                        <option value="B-" name="">B negative</option>
                        <option value="AB+" name="">AB positive</option>
                        <option value="AB-" name="">AB negative</option>
                    </select>
                </div>
                <div class="form-group">
                    Gender:
                    <div class="addRadio" style="margin-left: 13%">
                        <input type="radio" name="addGender" value="Male" checked>
                        <label>Male</label><br>
                        <input type="radio" name="addGender" value="Female">
                        <label>Female</label><br>
                        <input type="radio" name="addGender" value="Other">
                        <label>Other</label><br>
                    </div>
                </div>
                <div class="form-group">
                    Create a new password:
                    <input type="password" class="form-control" name="addPW" required>
                </div>
                <div class="form-group">
                    Confirm Password:
                    <input type="password" class="form-control" name="addCPW" required>
                </div>
                <input type="submit" class="btn btn-primary" value="Register" name="btnAdd"
                       style="margin-bottom: 10px">
            </div>
        </div>
    </div>
</form>

<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['btnAdd'])) {
        $md5pw = md5($_POST["addPW"]);
        $md5cpw = md5($_POST["addCPW"]);
        error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
        try {
            if($md5pw == $md5cpw){


                //Create object
                include 'model/Patient.php';
                $patient =new Patient();

                $name = $patient->setName($_POST["addName"]);
                $nic = $patient->setNic($_POST["addNIC"]);
                $email = $patient->setEmail($_POST["addEmail"]);
                $password = $patient->setPassword($md5pw);
                $no = $patient->setTelNo($_POST["addNum"]);
                $address = $patient->setAddress($_POST["addAddress"]);
                $dob = $patient->setDob($_POST["addDob"]);
                $bloodGroup = $patient->setBloodGroup($_POST["addBG"]);
                $gender = $patient->setGender($_POST["addGender"]);

                //Write to db
                try {
                    include 'repository/PatientService.php';
                    $addPat = new PatientService();
                    $check=$addPat->addPatient($patient);


                    if ($check==1){
                        echo "<script> alert('Registration Successful!');</script>";
                    }
                    else{
                        echo "<script> alert('Registration Failed!');</script>";
                    }
                }
                catch(Exception $ex){
//                    echo $ex;
                    echo "<script> alert('There is an existing account to this NIC number!');</script>";
                }
            } else {
                echo "<script> alert('Passwords does not match');</script>";
            }

        } catch (Exception $ex) {
//            echo $th;
        }
    }
}
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
?>
<img src="images/img.jpg" class="img-bg">
<?php include 'nav & footer/footer.php' ?>



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