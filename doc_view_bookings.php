<?php
require("login-check/logincheck_D.php");
include("config.php");
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Patient Reports</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="shortcut icon" type="image/jpg" href="images/favicon.ico"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
            integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
    ></script>
</head>
<body class="bg">
<?php include 'nav & footer/nav.php' ?>
<form method="post">
<div class="container features">
    <div class="row center">
        <div class="col-md-8">

            <h3 class="feature-title"> View Appointment</h3>
            <div class="form-group">
                Select a Date:
                <input class="form-control"  name="date" id="date" onchange="checkAvailability()" autocomplete="off" required>
            </div>


        </div>
    </div>
</div>
</form>
<div class="container features CardBgCol" id="full_table">
    <div class="row justify-content-md-center">
        <div class="col-md-12">
            <form method="post" enctype="multipart/form-data">
                <div >
                    <?php
                    $date = date("Y-m-d");
                    $changeDate = date("Y-m-d", strtotime($date));
                    echo'<script>
                            document.getElementById("date").value = "'.$changeDate.'";
                            </script>';

                    $docNic =$_SESSION["d_un"];

                    include 'repository/AppointmentService.php';
                    include 'repository/PatientService.php';
                    $ap = new AppointmentService();
                    $p = new PatientService();
                    $result=$ap->getTodayAppointments($docNic);
                    $count = $result->rowCount();

                    if($count>0) {
                        echo '<div >';
                        echo '<table class="table" style="border:solid #dee2e6 1px;">';
                        echo '<thead class="thead-dark">';
                        echo '<tr>
                         <th scope="col">Token Number</th>
                         <th scope="col">Name</th>
                         <th scope="col">Date</th>
                        
                    
                         <th scope="col"></th>
                            </tr>';
                        echo '</thead>';
                        foreach ($result as $row) {

                            echo '<tbody>';
                            echo '<tr class="rw">';
                            echo '<td style="vertical-align: middle;"> <input type="hidden" value="' . $row[3] . '">' . $row[3] . '</td>';

                            $r=$p->getPatient($row[1]);
                            foreach ($r as $row1) {
                                echo '<td style="vertical-align: middle;"> <input type="hidden" value="' . $row1[0] . '">' . $row1[0] . '</td>';
                            }
                            echo '<td style="vertical-align: middle;"> <input type="hidden" value="' . $row[2] . '">' . $row[2] . '</td>';

                            if($row[5]!="completed"){
                                echo '<td style="vertical-align: middle;"><button class="btn btn-primary"  style="margin: auto" name="btnCom" type="submit"  value="' . $row[0] . '">Finish Session  </button></td>';
                            }else{
                                echo '<td style="vertical-align: middle; text-align: center;"> <input type="hidden" >Session Finished</td>';
                            }
                            echo '</tr>';
                            echo ' </tbody>';
                        }
                        echo '</table>';
                        echo '</div>';
                    }
                    else{
                        echo '<div class="container features CardBgCol" id="resCon">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-12">';
                        echo'<div style=" text-align: center">';
                        echo "<span style='color:red'> No appointments for today!</span>";
                        echo'</div>';
                        echo '</div> </div></div>';
                    }

                    error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
                    $_POST["list"]=$docNic;
                    ?>
                </div>
                <form method="post" enctype="multipart/form-data">
        </div>
    </div>
</div>
<span id="daylist" name="daylist" hidden></span>
<span id="a" name="a"  hidden></span>
<form method="post" enctype="multipart/form-data">
    <div id="result"></div>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['btnCom'])) {
        try {
            $complete =$ap->changeAppointmentState($_POST['btnCom'],"completed");
            echo "<script> alert('Session Completed!!');</script>";
            echo '<script>window.location.href = "doc_view_bookings.php";</script>';
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
}
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
//?>
<img src="images/img.jpg" class="img-bg">
<?php include 'nav & footer/footer.php' ?>
<script>
    window.onload = function() {
        $(function() {
            let dayList=[];

            $.ajax({
                url: "ajax/get_my_days.php",
                data: "date=" + $("#date").val(),
                type: "POST",
                success: function (data) {
                    $("#daylist").html(data);
                    $("#daylist").val(data);
                    $("#a").html(data);
                    $("#a").val(data);


                    //get available days
                    function availableDays(Date) {
                        let getDay = moment()
                            .startOf('month')
                            .day(Date);
                        if (getDay.date() > 7) getDay.add(7, 'd');
                        let month = getDay.month();
                        const days=[];
                        while (month === getDay.month()) {
                            var day = moment(getDay).format('DD/MM/YYYY');
                            days.push(day)
                            getDay.add(7, 'd');
                        }
                        return days;
                    }

                    let value = document.getElementById("a").innerHTML;
                    const result = value.split(/(?=[A-Z])/);
                    console.log(result);

                    dayList=[];
                    //create available day list
                    for (var i = 0; i < result.length; i++) {
                        var temp = availableDays(result[i]);
                        dayList = dayList.concat(temp);
                    }
                    console.log(dayList);


                    function enableAllTheseDays(date) {
                        var sdate = $.datepicker.formatDate( "d/m/yy", date)
                        if($.inArray(sdate, dayList) != -1) {
                            return [true];
                        }
                        return [false];
                    }
                    $( "#date" ).datepicker({
                        changeMonth: false,
                        changeYear: false,
                        stepMonths: 0,
                        minDate: 0,
                        beforeShowDay: enableAllTheseDays,
                    });
                    // }
                    $( "#date" ).datepicker("refresh");
                }
            });
        });
    };

    function checkAvailability(){
        // var query = $(this).val();
        // if (query != "") {
            $.ajax({
                url: 'ajax/get_my_appointments.php',

                data: 'date=' + $("#date").val(),
                type: "POST",
                success: function (data) {
                    $('#date').html(data);
                    $('#result').html(data);
                    $('#result').css('display', 'block');
                    $('#full_table').css('display', 'none');

                }
            });

    }



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
