<?php
session_start();
include("config.php");
require("login-check/logincheck_A.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doctor Appointments</title>

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
            <div class="col-md-8 CardBgCol">
                <h3 class="feature-title">Select Doctor</h3>
                <div class="form-group">
                    Specialized Field:  <span id="check-Doc"></span>
                    <select class="form-control" name="SF" id="SF" onInput="checkDoc(),clearInput()" required>
                        <option >Select -</option>
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
                    Select a Doctor:
                    <select class="form-control" name="list"  id="list"  onInput="getDays(),clearInput()" required>

                    </select>
                </div>
                <div class="form-group">
                    Select a Date:
                    <input class="form-control"  name="date" id="date" onchange="checkAvailability()" autocomplete="off" required>
                </div>
                <span id="daylist" name="daylist" hidden></span>
                <span id="a" name="a" hidden ></span>
                <span id="check-Ava"></span>
            </div>
        </div>
    </div>
</form>


<img src="images/img.jpg" class="img-bg">
<?php include 'nav & footer/footer.php' ?>

<script language="javascript">

    //disable html elements
    document.getElementById("list").setAttribute('disabled', '');
    document.getElementById("date").setAttribute('disabled', '');


    //find the Doctors for specific field
    function checkDoc() {
        $.ajax({
            url: "ajax/check_doc.php",
            data: 'SF=' + $("#SF").val(),
            type: "POST",
            success: function (data) {
                $("#check-Doc").html(data);
                $("#list").html(data);
            }
        });
    }

    //get the available days of a specific doctor
    let dayList=[];
    function getDays(){

        $.ajax({
            url: "ajax/get_days.php",
            data: "list=" + $("#list").val(),
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
                        var day = moment(getDay).format('D/MM/YYYY');
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
                    var sdate = $.datepicker.formatDate( "dd/mm/yy", date)
                    if($.inArray(sdate, dayList) != -1) {
                        return [true];
                    }
                    return [false];
                }

                $( "#date" ).datepicker({
                    // changeMonth: false,
                    // changeYear: false,
                    // stepMonths: 0,
                    // minDate: 0,
                    // beforeShowDay: enableAllTheseDays,
                    beforeShowDay: enableAllTheseDays,
                });
                // }
                $( "#date" ).datepicker("refresh");
            }
        });
    }

    //check the availability for a day
    function checkAvailability(){
        //     console.log("cA");
        //console.log( "<?php //echo "hell";?>//");
        $.ajax({
            url: "ajax/get_appointments_for_doc.php",

            data: 'date=' + $("#date").val(),
            type: "POST",
            success: function (data) {
                $("#check-Ava").html(data);

            }
        });
    }

    //clear the input fields
    function clearInput(){
        var getValue= document.getElementById("date");
        if (getValue.value !="") {
            getValue.value = "";
            $('#date').prop('disabled',true);
            document.getElementById("check-Ava").innerHTML = "";

        }
    }
</script>
</body>
</html>