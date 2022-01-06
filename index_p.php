<?php
require("logincheck_P.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>

<body>
<?php include 'nav & footer/patientsNav.php' ?>

<div class="container features">
    <div class="row center">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <h3 class="feature-title">Search by patient number</h3>
            <form method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Patient Number" name="txtSearch">
                </div>
                <input type="submit" class="btn btn-secondary btn-block" value="Search" name="btnSearch">
            </form>
        </div>
    </div>
</div>


<?php
try {
    $conn = new PDO($db, $un, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $query = "SELECT  `Patient`,Name, `Diagnosis`, `Medications`, `Date` FROM `Diagnosis` 
                                  JOIN Patients on Diagnosis.Patient= Patients.PID WHERE Patient=3";
    $result = $conn->query($query);
    $query =$query ="SELECT `PID`, `Name` FROM `Patients` ";
    if(isset($_POST["btnSearchD"]))
    {
        $query=$query. "where Name like '%".$_POST['txtSearch']."%'";
    }


    echo '<div class="container">';


    $i = 0;
    foreach ($result as $row) {
        echo '<div class="card">';
        echo '<h5 class="card-header">'.$row[4].'</h5>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">'.$row[2].'</h5>';
        echo '<p class="card-text">'.$row[3].'</p>';
        echo '<p class="card-text">'.$row[1].'</p>';
        echo '</div>';
        echo '</div>';
        $i++;
    }

    echo '</div>';

} catch (PDOException $th) {
    echo $th->getMessage();
}
?>





<?php include 'nav & footer/footer.php' ?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>