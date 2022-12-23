<?php
require("login-check/logincheck_A.php");
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>New Doctor</title>
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
<form method="post">
    <div class="container features">
        <div class="row center">
            <div class="col-md-8 CardBgCol">
                <h3 class="feature-title">Doctor Registration Form</h3>
                <div class="form-group">
                    Name:
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    NIC:
                    <input type="text" class="form-control" name="nic" required>
                </div>
                <div class="form-group">
                    Email:
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    Address:
                    <input type="text" class="form-control" name="address" required>
                </div>
                <div class="form-group">
                    Contact Number:
                    <input type="number" class="form-control" name="num" required>
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
                    Qualifications:
                    <input type="text" class="form-control" name="qual" required>
                </div>
                <div class="form-group">
                    Specialized Field:
                    <select class="form-control" name="addsf" required>
                        <option value="Anesthesiologist" name="">Anesthesiologist</option>
                        <option value="Cardiologist" name="">Cardiologist</option>
                        <option value="Dermatologist" name="">Dermatologist</option>
                        <option value="Endocrinologist" name="">Endocrinologist</option>
                        <option value="Family medicine" name="">Family medicine</option>
                        <option value="Gastroenterologist" name="">Gastroenterologist</option>
                        <option value="Infectious disease" name="">Infectious disease</option>
                        <option value="Internal Medicine" name="">Internal Medicine</option>
                        <option value="Nephrologist" name="">Nephrologist</option>
                        <option value="Obstetrician" name="">Obstetrician</option>
                        <option value="Oncologist" name="">Oncologist</option>
                        <option value="Ophthalmologist" name="">Ophthalmologist</option>
                        <option value="Otolaryngologist" name="">Otolaryngologist</option>
                        <option value="Pediatrician" name="">Pediatrician</option>
                        <option value="Physician executive" name="">Physician executive</option>
                        <option value="Psychiatrist" name="">Psychiatrist</option>
                        <option value="Pulmonologist" name="">Pulmonologist</option>
                        <option value="Radiologist" name="">Radiologist</option>
                        <option value="Surgeon" name="">Surgeon</option>
                    </select>
                </div>
                <div class="form-group">
                    Rate per Session:
                    <input type="number" class="form-control" name="rps" required>
                </div>
                <div class="form-group">
                    No of Patients per Day:
                    <input type="number" class="form-control" name="ppd" required>
                </div>
                <div class="form-group">
                    Available Days:<br>
                    <div style="margin-left: 13%">
                        <input type="checkbox" name="day_list[]" value="Sunday" checked><label>Sunday</label><br/>
                        <input type="checkbox" name="day_list[]" value="Monday" checked><label>Monday</label><br/>
                        <input type="checkbox" name="day_list[]" value="Tuesday" checked><label>Tuesday</label><br/>
                        <input type="checkbox" name="day_list[]" value="Wednesday" checked><label>Wednesday</label><br/>
                        <input type="checkbox" name="day_list[]" value="Thursday" checked><label>Thursday</label><br/>
                        <input type="checkbox" name="day_list[]" value="Friday" checked><label>Friday</label><br/>
                        <input type="checkbox" name="day_list[]" value="Saturday" checked><label>Saturday</label><br/>
                    </div>
                </div>


                <div class="form-group">
                    Create a new password:
                    <input type="password" class="form-control" name="addPW" required>
                    <?php
                    error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
                    $md5pw = md5($_POST["addPW"]);
                    ?>
                </div>
                <div class="form-group">
                    Confirm Password:
                    <input type="password" class="form-control" name="addCPW" required>
                    <?php
                    error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
                    $md5cpw = md5($_POST["addCPW"]);
                    ?>
                </div>

                <!--                <div class="form-group">-->
                <!--                    Date:-->
                <!--                    --><?php //$date = date("Y-m-d");
                //                    echo $date;
                //                    ?>
                <!--                </div>-->
                <input type="submit" class="btn btn-primary" value="Register" name="btnCreate"
                       style="margin-bottom: 10px">
            </div>
        </div>
    </div>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['btnCreate'])) {
        try {
            if($md5pw == $md5cpw){

                //Get available days
                $lang = implode(",",$_POST['day_list']);


                //Create object
                include 'model/Doctor.php';
                $doc =new Doctor();
                $name =$doc->setName($_POST["name"]);
                $nic=$doc->setNic($_POST["nic"]);
                $email=$doc->setEmail($_POST["email"]);
                $password=$doc->setPassword($md5pw);
                $no=$doc->setTelNo($_POST["num"]);
                $gender=$doc->setGender($_POST["addGender"]);
                $sf=$doc->setSpecializedField($_POST["addsf"]);
                $qual=$doc->setQualifications($_POST["qual"]);
                $address=$doc->setAddress($_POST["address"]);
                $rps=$doc->setRatePerSession($_POST["rps"]);
                $ppd=$doc->setNoOfPatientsPerDay($_POST["ppd"]);

                $days=$doc->setAvailableDays($lang);


                //Write to db
                try {
                    include 'repository/DoctorService.php';
                    $addDoc = new DoctorService();
                    $check=$addDoc->addDoctor($doc);


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