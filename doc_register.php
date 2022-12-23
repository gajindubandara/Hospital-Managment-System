<?php
require("login-check/logincheck_A.php");
include("config.php");
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doctor Register</title>
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.ico"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body class="bg" >
<?php include 'nav & footer/nav.php' ?>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <h3 class="feature-title" style="text-align: center;margin-top: 30px">Search for a Doctor</h3>
            <input type="text" class="form-control" id="search" placeholder="Type the NIC">
            <div class="row justify-content-md-center">
            </div>
        </div>
    </div>
</div>

<div class="container features CardBgCol" id="full_table">
    <div class="row justify-content-md-center">
        <div class="col-md-12">
            <form method="post" enctype="multipart/form-data">
                <div >
                    <?php

                    include 'repository/DoctorService.php';
                    $profiles = new DoctorService();
                    $result=$profiles->getAllDoctors();

                    echo '<div >';
                    echo '<table class="table" style="border:solid #dee2e6 1px;">';
                    echo '<thead class="thead-dark">';
                    echo '<tr>
                     <th scope="col">NIC</th>
                     <th scope="col">Name</th>
                     <th scope="col">Specialized Field</th>
                     <th scope="col"></th>
              </tr>';
                    echo '</thead>';
                    foreach ($result as $row) {
                        echo '<tbody>';
                        echo '<tr class="rw">';
                        echo '<td style="vertical-align: middle;"> <input type="hidden" value="' . $row[2] . '">' . $row[2] . '</td>';
                        echo '<td style="vertical-align: middle;"> <input type="hidden" value="' . $row[1] . '">' . $row[1] . '</td>';
                        echo '<td style="vertical-align: middle;"> <input type="hidden"  value="' . $row[7] . '">' . $row[7] . '</td>';
                        echo '<td style="vertical-align: middle;"><button class="btn btn-primary"  style="margin: auto" name="btnView" type="submit"  value="' . $row[2] . '">View  </button></td>';

                        echo '</tr>';
                        echo ' </tbody>';
                    }
                    echo '</table>';
                    echo '</div>';
                    error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
                    ?>
                </div>
                <form method="post" enctype="multipart/form-data">
        </div>
    </div>
</div>
<?php
if (isset($_POST["btnView"])) {
    $_SESSION["dNic"] =$_POST["btnView"];
    echo '<script>window.location.href = "admin_view_doc_profile.php";</script>';
}

?>
<form method="post" enctype="multipart/form-data">
    <div id="result"></div>
</form>
<img src="images/img.jpg" class="img-bg">
<?php include 'nav & footer/footer.php' ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#search").keyup(function () {
            var query = $(this).val();
            if (query != "") {
                $.ajax({
                    url: 'ajax/get_doc_register.php',
                    method: 'POST',
                    data: {
                        query: query
                    },
                    success: function (data) {
                        $('#result').html(data);
                        $('#result').css('display', 'block');
                        $('#full_table').css('display', 'none');

                    }
                });
            } else {
                $('#result').css('display', 'none');
                $('#full_table').css('display', 'block');
            }
        });
    });

    document.getElementById("clearBtn").onclick = function clear() {
        document.getElementById("search").value = " ";
        document.getElementById("full_table").style.display = "block";
        document.getElementById("result").style.display = "none";
    }
</script>
</body>
</html>
