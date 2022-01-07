<?php
require("logincheck_P.php");
include("config.php");
session_start();
?>
<head>

    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>
<?php include 'nav & footer/patientsNav.php' ?>

<header>

</header>

<div class="container features">
    <div class="row center">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <h3 class="feature-title">Personal Report</h3>
        </div>
    </div>
</div>

<div class="row center" style="margin-top: 50px">
    <div class="col-md-4">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $num = $_SESSION["p_un"];
            $conn = new PDO($db, $un, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $query = "SELECT `PID`, `Name`, `Age`, `No`, `Email`, `Address`, `BG`, `Gender`,`NIC` FROM `Patients` WHERE PID= $num ";
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
                echo ' </tbody>';


            }
            echo '</table>';


        } catch (PDOException $th) {
            echo $th->getMessage();
        }
        }
        ?>
    </div>
</div>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try {
    $num = $_SESSION["p_un"];
    $conn = new PDO($db, $un, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $query = "SELECT  `Patient`,Name, `Diagnosis`, `Medications`, `Date` FROM `Diagnosis` 
                                  JOIN Patients on Diagnosis.Patient= Patients.PID WHERE PID = $num ORDER BY `Date` DESC";
    $result = $conn->query($query);

    echo '<div class="container">';

    foreach ($result as $row) {
        echo '<div class="card">';
        echo '<h5 class="card-header">' . $row[4] . '</h5>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row[2] . '</h5>';
        echo '<p class="card-text">' . $row[3] . '</p>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>';

} catch (PDOException $th) {
    echo $th->getMessage();
}
}

?>

<script src="js/collapsibleCards.js"></script>
<img src="images/bg.jpg" class="img-bg">
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

