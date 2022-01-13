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

</head>

<body>
<?php include 'nav & footer/doctorsNav.php' ?>

<?php if(isset($_POST["btnEdit"])){
    $_SESSION["editNo"] =$_POST["btnEdit"];
    header("location:update.php");
}?>

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
                $query =$query ="SELECT `PID`, `Name`, `Day`,`Age`, `No`, `Email`, `Address`, `BG`, `Gender`, `NIC`, `password` FROM `Patients` ";
                if(isset($_POST["btnSearch"]))
                {
                    $query=$query. "where Name like '%".$_POST['txtSearch']."%'";
                }
                $result = $conn->query($query);
                echo '<table class="table">';
                echo '<thead class="thead-dark">';
                echo '<tr>
                            <th scope="col">Patient No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date</th>
                            <th scope="col"></th>
                          </tr>';
                echo '</thead>';
                $i=0;
                foreach($result as $row)
                {   echo '<tbody>';
                    echo '<tr class="rw">';
                    echo '<td> <input type="hidden" name="pID[]" value="' . $row[0] . '">'. $row[0] . '</td>';
                    echo '<td> <input type="hidden" name="pName[]" value="' . $row[1] . '">'. $row[1] . '</td>';
                    echo '<td> <input type="hidden" name="pDay[]" value="' . $row[2] . '">'. $row[2] . '</td>';
                    echo '<td hidden> <input type="hidden" name="pAge[]" value="' . $row[3] . '">'. $row[3] . '</td>';
                    echo '<td hidden> <input type="hidden" name="pNo[]" value="' . $row[4] . '">'. $row[4] . '</td>';
                    echo '<td hidden> <input type="hidden" name="pEmail[]" value="' . $row[5] . '">'. $row[5] . '</td>';
                    echo '<td hidden> <input type="hidden" name="pAddress[]" value="' . $row[6] . '">'. $row[6] . '</td>';
                    echo '<td hidden> <input type="hidden" name="pBG[]" value="' . $row[7] . '">'. $row[7] . '</td>';
                    echo '<td hidden> <input type="hidden" name="pGender[]" value="' . $row[8] . '">'. $row[8] . '</td>';
                    echo '<td hidden> <input type="hidden" name="pNIC[]" value="' . $row[9] . '">'. $row[9] . '</td>';
                    echo '<td hidden> <input type="hidden" name="pPW[]" value="' . $row[10] . '">'. $row[10] . '</td>';
                    echo '<td><button class="btn btn-secondary btn-block" name="btnEdit" type="submit"  value="' .$row[0] . '">Edit Profile </button></td>';
                    echo '</tr>';
                    echo ' </tbody>';
                    $i++;
                }
                echo '</table>';

            } catch (PDOException $th) {
                echo $th->getMessage();
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