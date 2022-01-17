<?php
require("logincheck_D.php");
include("config.php");
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>

    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>

<body>
<header>

</header>
<?php include 'nav & footer/doctorsNav.php' ?>


<div class="container features">
    <div class="row center">
        <div class="col-md-8">
            <form method="post" enctype="multipart/form-data">
                <h3 class="feature-title">Add new Diagnose</h3>
                <?php

                try {
                    $editP = $_SESSION["editNo"];
                    $conn = new PDO($db, $un, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $query = $query = "SELECT `PID`, `Name`, `Age`, `No`, `Email`, `Address`,`Day` FROM `Patients` Where `PID`= $editP";
                    $result = $conn->query($query);

                    foreach ($result as $row) {


                        echo '  <div class="form-group"> Name:';
                        echo '<input type="text" class="form-control" name="pName" value="' . $row[1] . '" required >';
                        echo '</div>';

                        echo '  <div class="form-group"> Age:';
                        echo '<input type="number" class="form-control" name="pAge" value="' . $row[2] . '" required >';
                        echo '</div>';

                        echo '  <div class="form-group"> Number:';
                        echo '<input type="number" class="form-control" name="pNo" value="' . $row[3] . '" required >';
                        echo '</div>';

                        echo '  <div class="form-group"> Email:';
                        echo '<input type="email" class="form-control" name="pEmail" value="' . $row[4] . '" required >';
                        echo '</div>';

                        echo '  <div class="form-group"> Address:';
                        echo '<input type="text" class="form-control" name="pAddress" value="' . $row[5] . '" required >';
                        echo '</div>';

                        echo '  <div class="form-group"> Modified Date:';
                        echo '<input type="date" class="form-control" name="pDay" value="' . $row[6] . '" required >';
                        echo '</div>';


                        echo '<input type="submit" class="btn btn-secondary btn-block" value="Update" name="btnUpdate">';
                        echo '<input type="submit" class="btn btn-secondary btn-block" value="Cancel" name="btnCan">';


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
            $conn = new PDO($db, $un, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "UPDATE `Patients` SET `Name`=?,`Age`=?,`No`=?,`Email`=?,`Address`=?,`Day`=? WHERE `PID`=$editP";
            $st = $conn->prepare($query);
            $st->bindValue(1, $_POST["pName"], PDO::PARAM_STR);
            $st->bindValue(2, $_POST["pAge"], PDO::PARAM_STR);
            $st->bindValue(3, $_POST["pNo"], PDO::PARAM_STR);
            $st->bindValue(4, $_POST["pEmail"], PDO::PARAM_STR);
            $st->bindValue(5, $_POST["pAddress"], PDO::PARAM_STR);
            $st->bindValue(6, $_POST["pDay"], PDO::PARAM_STR);
            $st->execute();

            echo "<script> alert('Patient updated Successfully!');</script>";


        } catch (PDOException $th) {
            echo $th->getMessage();

        }
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['btnCan'])) {
        header("location:register.php");
    }
}
?>

<script src="js/collapsibleCards.js"></script>
<img src="images/home.png" class="img-bg">
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