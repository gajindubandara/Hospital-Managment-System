<?php
require("logincheck_D.php");
include("config.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Patient Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>

<body>
<?php include 'nav & footer/doctorsNav.php' ?>

<?php if(isset($_POST["btnEdit"])){
    $_SESSION["editNo"] =$_POST["btnEdit"];
    header("location:update.php");
}?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['find'])) {
        try {
            $num = $_POST["ps"];
            $_SESSION["ps"] =$_POST["ps"];
            $conn = new PDO($db, $un, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $query = "SELECT `PID`, `Name`, `Age`, `No`, `Email`, `Address`, `BG`, `Gender`,`NIC`, `Day` FROM `Patients` WHERE  ";
            $result = $conn->query($query);
            echo '<table class="table">';

            foreach ($result as $row) {
                echo '<tbody>';
                echo '<tr>';
                echo '<td><b>Patient Number:</b></td>';
                echo '<td>' . $row[0] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td><b>Name:</b></td>';
                echo '<td>' . $row[1] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td><b>Age:</b></td>';
                echo '<td>' . $row[2] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td><b> Phone Number:</b></td>';
                echo '<td>' . $row[3] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td><b>Email:</b></td>';
                echo '<td>' . $row[4] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td><b>Address:</b></td>';
                echo '<td>' . $row[5] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td><b>Blood Group:</b></td>';
                echo '<td>' . $row[6] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td><b>Gender:</b></td>';
                echo '<td>' . $row[7] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td><b>NIC:</b></td>';
                echo '<td>' . $row[8] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td><b>Date:</b></td>';
                echo '<td>' . $row[9] . '</td>';
                echo '</tr>';
                echo ' </tbody>';

            }
            echo '</table>';


        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
}
?>
<div class="container features">
    <div class="row center">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <h3 class="feature-title">Search by Patient Name</h3>
            <form method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Patient Name" name="txtSearch">
                </div>
                <input type="submit" class="btn btn-secondary btn-block" value="Search" name="btnSearch">
            </form>
        </div>
    </div>
</div>

<div class="container features">
        <form method="post" enctype="multipart/form-data">
            <?php

            try {
                $conn = new PDO($db,$un,$password);
                $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $query ="SELECT `PID`, `Name`, `Day`,`Status` FROM `Patients` ";
                if(isset($_POST["btnSearch"]))
                {
                    $query=$query. "where Name like '%".$_POST['txtSearch']."%'";
                    $click=true;
                }
                $result = $conn->query($query);
                if($click==true){
                    echo '<table class="table" style="border:solid #dee2e6 1px;">';
                    echo '<thead class="thead-dark">';
                    echo '<tr>
                            <th scope="col">Patient No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                          </tr>';
                    echo '</thead>';
                    foreach($result as $row)
                    {   echo '<tbody>';
                        echo '<tr class="rw">';
                        echo '<td> <input type="hidden" name="pID[]" value="' . $row[0] . '">'. $row[0] . '</td>';
                        echo '<td> <input type="hidden" name="pName[]" value="' . $row[1] . '">'. $row[1] . '</td>';
                        echo '<td> <input type="hidden" name="pDay[]" value="' . $row[2] . '">'. $row[2] . '</td>';
                        if($row[3] =="Active"){
                            $showStatus = "Remove";
                            $iconColor ="green";
                        }
                        else{
                            $showStatus ="Add";
                            $iconColor ="red";
                        }
                        echo '<td style="vertical-align: middle;"><i class="fas fa-circle" style="color:'.$iconColor.'"></i> '.$row[3].'</td>';
                        echo '<td style="vertical-align: middle;"><button class="btn btn-secondary btn-block" style="margin: auto; width:80px !important;" name="btnStat" type="submit"  value="' .$row[0] . '">'.$showStatus.' </button></td>';
                        echo '<td style="vertical-align: middle;"><button class="btn btn-secondary btn-block" style="margin: auto" name="btnEdit" type="submit"  value="' .$row[0]. '">Edit  </button></td>';
                        echo '</tr>';
                        echo ' </tbody>';

                    }
                    echo '</table>';


                }

            } catch (PDOException $th) {
                echo $th->getMessage();
            }
            ?>



            <?php

            try {
                if($click==false){
                    $conn = new PDO($db,$un,$password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $query ="SELECT `PID`, `Name`, `Day`,`Status` FROM `Patients` ORDER BY `Status` ASC ";
                    $result = $conn->query($query);


                    echo '<table class="table" style="border:solid #dee2e6 1px;">';
                    echo '<thead class="thead-dark">';
                    echo '<tr>
                            <th scope="col">Patient No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            
                          </tr>';
                    echo '</thead>';
                    foreach($result as $row)
                    {   echo '<tbody>';
                        echo '<tr class="rw">';
                        echo '<td style="vertical-align: middle;"> <input type="hidden" name="pID[]" value="' . $row[0] . '">'. $row[0] . '</td>';
                        echo '<td style="vertical-align: middle;"> <input type="hidden" name="pName[]" value="' . $row[1] . '">'. $row[1] . '</td>';
                        echo '<td style="vertical-align: middle;"> <input type="hidden" name="pDay[]" value="' . $row[2] . '">'. $row[2] . '</td>';

                        if($row[3] =="Active"){
                            $showStatus = "Remove";
                            $iconColor ="green";
                        }
                        else{
                            $showStatus ="Add";
                            $iconColor ="red";
                        }
                        echo '<td style="vertical-align: middle;"><i class="fas fa-circle" style="color:'.$iconColor.'"></i> '.$row[3].'</td>';
                        echo '<td style="vertical-align: middle;"><button class="btn btn-secondary btn-block" style="margin: auto; width:80px !important;" name="btnStat" type="submit"  value="' .$row[0] . '">'.$showStatus.' </button></td>';
                        echo '<td style="vertical-align: middle;"><button class="btn btn-secondary btn-block" style="margin: auto" name="btnEdit" type="submit"  value="' .$row[0]. '">Edit  </button></td>';

                        echo '</tr>';
                        echo ' </tbody>';
                    }
                    echo '</table>';
                }

            } catch (PDOException $th) {
                echo $th->getMessage();
            }
            ?>


            <?php
            if (isset($_POST['btnStat'])) {
                changeState();
            }

            function changeState()
            {
                include("config.php");
                $A = $_POST['btnStat'];

                $conn = new PDO($db, $un, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = "SELECT `Status` FROM `Patients` WHERE `PID`=$A ";
                $resultS = $conn->query($query);
                foreach ($resultS as $rowS) {
                    try {

                        if ($rowS[0] == "Inactive") {
                            $conn = new PDO($db, $un, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $query = "UPDATE `Patients` SET `Status`=? WHERE `PID`=$A";
                            $st = $conn->prepare($query);
                            $st->bindValue(1, "Active", PDO::PARAM_STR);
                            $st->execute();
                            echo "<script> alert('Patient Added!');</script>";

                        } else {
                            $conn = new PDO($db, $un, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $query = "UPDATE `Patients` SET `Status`=? WHERE `PID`=$A";
                            $st = $conn->prepare($query);
                            $st->bindValue(1, "Inactive", PDO::PARAM_STR);
                            $st->execute();
                            echo "<script> alert('Patient removed!');</script>";


                        }

                    } catch (PDOException $th) {
                        echo $th->getMessage();

                    }
                }
            }
            ?>
        </form>

</div>

<img src="images/list.jpeg" class="img-bg">
<?php include 'nav & footer/footer.php' ?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>