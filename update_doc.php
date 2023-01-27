<?php
//require("login-check/logincheck_A.php");
include("config.php");
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Doctor</title>
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
                <h3 class="feature-title">Update doctor profile</h3>
                <?php

                try {
                    $dnum = $_SESSION["d_un"];
                    include 'repository/DoctorService.php';
                    $profile = new DoctorService();
                    $result=$profile->getDoctor($dnum);

                    foreach ($result as $row) {

                        echo'<div class="form-group">
                    Name:
                    <input type="text" class="form-control" name="name" value="'.$row[0].'" required>
                </div>
                <div class="form-group">
                    NIC:
                    <input type="text" class="form-control" name="nic" value="'.$row[1].'" readonly>
                </div>
                <div class="form-group">
                    Email:
                    <input type="email" class="form-control" name="email" value="'.$row[2].'" required>
                </div>
                <div class="form-group">
                    Address:
                    <input type="text" class="form-control" name="address" value="'.$row[8].'" required>
                </div>
                <div class="form-group">
                    Contact Number:
                    <input type="number" class="form-control" name="num" value="'.$row[4].'" required>
                </div>
                <div class="form-group">
                    Gender:
                    <div class="addRadio" style="margin-left: 13%">
                        <input type="radio" name="addGender" value="Male"  ';if($row[5]=="Male") echo 'checked'; echo' >
                        <label>Male</label><br>
                        <input type="radio" name="addGender" value="Female" ';if($row[5]=="Female") echo ' checked'; echo'>
                        <label>Female</label><br>
                        <input type="radio" name="addGender" value="Other"';if($row[5]=="Other") echo ' checked'; echo'>
                        <label>Other</label><br>
                    </div>
                </div>

                <div class="form-group">
                    Qualifications:
                    <input type="text" class="form-control" name="qual" value="'.$row[7].'" required>
                </div>
                <div class="form-group">
                    Specialized Field:
                    <select class="form-control" name="addsf"required>
                        <option value="Anesthesiologist" name=""';if($row[6]=="Anesthesiologist") echo ' selected="selected"'; echo'>Anesthesiologist</option>
                        <option value="Cardiologist" name=""';if($row[6]=="Cardiologists") echo ' selected="selected"'; echo'>Cardiologist</option>
                        <option value="Dermatologist" name=""';if($row[6]=="Dermatologist") echo ' selected="selected"'; echo'>Dermatologist</option>
                        <option value="Endocrinologist" name=""';if($row[6]=="Endocrinologist") echo ' selected="selected"'; echo'>Endocrinologist</option>
                        <option value="Family medicine" name=""';if($row[6]=="Family medicine") echo ' selected="selected"'; echo'>Family medicine</option>
                        <option value="Gastroenterologist" name=""';if($row[6]=="Gastroenterologist") echo ' selected="selected"'; echo'>Gastroenterologist</option>
                        <option value="Infectious disease" name=""';if($row[6]=="Infectious disease") echo ' selected="selected"'; echo'>Infectious disease</option>
                        <option value="Internal Medicine" name=""';if($row[6]=="Internal Medicine") echo ' selected="selected"'; echo'>Internal Medicine</option>
                        <option value="Nephrologist" name=""';if($row[6]=="Nephrologist") echo ' selected="selected"'; echo'>Nephrologist</option>
                        <option value="Obstetrician" name=""';if($row[6]=="Obstetrician") echo ' selected="selected"'; echo'>Obstetrician</option>
                        <option value="Oncologist" name=""';if($row[6]=="Oncologist") echo ' selected="selected"'; echo'>Oncologist</option>
                        <option value="Ophthalmologist" name=""';if($row[6]=="Ophthalmologist") echo ' selected="selected"'; echo'>Ophthalmologist</option>
                        <option value="Otolaryngologist" name=""';if($row[6]=="Otolaryngologist") echo ' selected="selected"'; echo'>Otolaryngologist</option>
                        <option value="Pediatrician" name=""';if($row[6]=="Pediatrician") echo ' selected="selected"'; echo'>Pediatrician</option>
                        <option value="Physician executive" name=""';if($row[6]=="Physician executive") echo ' selected="selected"'; echo'>Physician executive</option>
                        <option value="Psychiatrist" name=""';if($row[6]=="Psychiatrist") echo ' selected="selected"'; echo'>Psychiatrist</option>
                        <option value="Pulmonologist" name=""';if($row[6]=="Pulmonologist") echo ' selected="selected"'; echo'>Pulmonologist</option>
                        <option value="Radiologist" name=""';if($row[6]=="Radiologist") echo ' selected="selected"'; echo'>Radiologist</option>
                        <option value="Surgeon" name=""';if($row[6]=="Surgeon") echo ' selected="selected"'; echo'>Surgeon</option>
                    </select>
                </div>
                <div class="form-group">
                    Rate per Session:
                    <input type="number" class="form-control" name="rps" value="'.$row[9].'" required>
                </div>
                <div class="form-group">
                    No of Patients per Day:
                    <input type="number" class="form-control" name="ppd" value="'.$row[10].'" required>
                </div>
                <div class="form-group">
                    Available Days:<br>
                    <div style="margin-left: 13%">'; $checked_arr = explode(",",$row[11]);

                    echo'
                        <input type="checkbox" name="day_list[]" value="Sunday" ';if (in_array("Sunday", $checked_arr)){echo 'checked';}echo'><label>Sunday</label><br/>
                        <input type="checkbox" name="day_list[]" value="Monday" ';if (in_array("Monday", $checked_arr)){echo 'checked'; }echo'><label>Monday</label><br/>
                        <input type="checkbox" name="day_list[]" value="Tuesday" ';if (in_array("Tuesday", $checked_arr)){echo 'checked'; }echo'><label>Tuesday</label><br/>
                        <input type="checkbox" name="day_list[]" value="Wednesday" ';if (in_array("Wednesday", $checked_arr)){echo 'checked'; }echo'><label>Wednesday</label><br/>
                        <input type="checkbox" name="day_list[]" value="Thursday" ';if (in_array("Thursday", $checked_arr)){echo 'checked'; }echo'><label>Thursday</label><br/>
                        <input type="checkbox" name="day_list[]" value="Friday" ';if (in_array("Friday", $checked_arr)){echo 'checked'; }echo'><label>Friday</label><br/>
                        <input type="checkbox" name="day_list[]" value="Saturday" ';if (in_array("Saturday", $checked_arr)){echo 'checked'; }echo'><label>Saturday</label><br/>
                    </div>
                </div>
                 <div class="form-group">
                    Profile Image Url:
                    <input type="text" class="form-control" name="imgUrl" value="'.$row[13].'" required>
                </div>';
                        echo '<input type="submit" class="btn btn-primary"  value="Update" name="btnUpdate">';
                        echo '<input type="submit" style="margin-top: 10px; margin-bottom: 10px" class="btn btn-primary"  value="Cancel" name="btnCan">';


                    }
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['btnUpdate'])) {
        try {
            include 'model/Doctor.php';
            $doc =new Doctor();

            //Get available days
            $lang = implode(",",$_POST['day_list']);

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
            $img=$doc->setImageUrl($_POST["imgUrl"]);


            $days=$doc->setAvailableDays($lang);

//            Write to db
            try {

                $addDoc = new DoctorService();
                $check=$addDoc->updateDoctor($doc);


                if ($check==1){

                    echo "<script> alert('Updated Successful!');</script>";
                    echo '<script>window.location.href = "doc_profile.php";</script>';
                }
                else{
                    echo "<script> alert(' Failed!');</script>";
                }
            }
            catch(Exception $ex){
                    echo $ex;

            }


        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['btnCan'])) {
        echo '<script>window.location.href = "doc_profile.php";</script>';
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