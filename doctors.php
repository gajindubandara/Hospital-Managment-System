<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Our Doctors</title>

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
<?php
if (isset($_SESSION["p_un"])) {
    include 'nav & footer/nav.php';
} else {
    include 'nav & footer/loginNav.php';
}


?>

<div class="container features CardBgCol" id="doctors" style="margin-bottom: 200px">
    <div class="heading" style="margin-top: 0px !important;">
        <h1 class="cardTitle" style="margin-top: 30px !important;">Our Doctors</h1>
    </div>
    <form action="" method="post">
        <ul class="ks-cboxtags">
            <li><input type="checkbox" id="checkboxOne" value="All" onclick="onSelect('All')" name="All" checked><label for="checkboxOne">All</label></li>
            <li><input type="checkbox" id="checkboxTwo" value="Anesthesiologist" onclick="onSelect('Anesthesiologist')" name="a" ><label for="checkboxTwo">Anesthesiologist</label></li>
            <li><input type="checkbox" id="checkboxThree" value="Cardiologist" onclick="onSelect('Cardiologist')" name="cxz"><label for="checkboxThree">Cardiologist</label></li>
            <li><input type="checkbox" id="checkboxFour" value="Dermatologist" onclick="onSelect('Dermatologist')"><label for="checkboxFour">Dermatologist</label></li>
            <li><input type="checkbox" id="checkboxFive" value="Endocrinologist" onclick="onSelect('Endocrinologist')"><label for="checkboxFive">Endocrinologist</label></li>
            <li><input type="checkbox" id="checkboxSix" value="Family medicine" onclick="onSelect('Family medicine')"><label for="checkboxSix">Family medicine</label></li>
            <li><input type="checkbox" id="checkboxSeven" value="Gastroenterologist" onclick="onSelect('Gastroenterologist')"><label for="checkboxSeven">Gastroenterologist</label></li>
            <li><input type="checkbox" id="checkboxEight" value="Infectious disease" onclick="onSelect('Infectious disease')"><label for="checkboxEight">Infectious disease</label></li>
            <li><input type="checkbox" id="checkboxNine" value="Internal Medicine" onclick="onSelect('Internal Medicine')"><label for="checkboxNine">Internal Medicine</label></li>
            <li><input type="checkbox" id="checkboxTen" value="Nephrologist" onclick="onSelect('Nephrologist')"><label for="checkboxTen">Nephrologist</label></li>
            <li><input type="checkbox" id="checkboxEleven" value="Obstetrician" onclick="onSelect('Obstetrician')"><label for="checkboxEleven">Obstetrician</label></li>
            <li><input type="checkbox" id="checkboxTwelve" value="Oncologist" onclick="onSelect('Oncologist')"><label for="checkboxTwelve">Oncologist</label></li>
            <li><input type="checkbox" id="checkboxThirteen" value="Ophthalmologist" onclick="onSelect('Ophthalmologist')"><label for="checkboxThirteen">Ophthalmologist</label></li>
            <li><input type="checkbox" id="checkboxFourteen" value="Otolaryngologist" onclick="onSelect('Otolaryngologist')"><label for="checkboxFourteen">Otolaryngologist</label></li>
            <li><input type="checkbox" id="checkboxFifteen" value="Pediatrician" onclick="onSelect('Pediatrician')"><label for="checkboxFifteen">Pediatrician</label></li>
            <li><input type="checkbox" id="checkboxSixteen" value="Physician executive" onclick="onSelect('Physician executive')"><label for="checkboxSixteen">Physician executive</label></li>
            <li><input type="checkbox" id="checkboxSeventeen" value="Psychiatrist" onclick="onSelect('Psychiatrist')"><label for="checkboxSeventeen">Psychiatrist</label></li>
            <li><input type="checkbox" id="checkboxEighteen" value="Pulmonologist" onclick="onSelect('Pulmonologist')"><label for="checkboxEighteen">Pulmonologist</label></li>
            <li><input type="checkbox" id="checkboxNineteen" value="Radiologist" onclick="onSelect('Radiologist')"><label for="checkboxNineteen">Radiologist</label></li>
            <li><input type="checkbox" id="checkboxTwenty" value="Surgeon" onclick="onSelect('Surgeon')"><label for="checkboxTwenty">Surgeon</label></li>
        </ul>

    </form>
    <span id="check-NIC"></span>
    <!-- Profile cards goes here -->
    <div id="docCards"></div>
    <div id="noData" class="noData">No Available Doctors!</div>
    <div class="row justify-content-center" id="btnDoc" style="visibility:hidden;">
        <button id="doc-show-more" class="btn btn-link" style="margin: 0px">SEE MORE</button>
        <a id="doc-show-less" class="btn btn-link " style="margin: 0px" href="#doctors">SEE LESS</a>
    </div>
</div>

<?php include 'nav & footer/footer.php' ?>
<!-- Core -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/headroom/0.10.4/headroom.min.js"></script>
<!-- Optional JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.0.3/nouislider.min.js"></script>

<!--Mustache.js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.min.js"></script>

<script type="text/html" id="templateDocCards">
    <div class="row">
        {{#data}}
        <div class="col-md-3">
            <div class="docCard">
                <div>
                    <div class="row" style=" justify-content: center">
                        <img src="{{imgUrl}}" class="avatar">
                    </div>
                    <div class="row profile ">
                        <div class="name">{{name}}</div>
                        <div class="name qualification">{{qual}}</div>
                    </div>
                </div>
            </div>
        </div>
        {{/data}}
    </div>
</script>


<script>

    $(document).ready(function(){
        $('input:checkbox').click(function() {
            $('input:checkbox').not(this).prop('checked', false);
        });
    });

    $(function () {
        $('#noData').hide();
        onSelect("All");
    });

    function onSelect(field){

        $.ajax({
            url: "ajax/get_doc_by_field.php",
            data: 'option=' + field,
            type: "POST",
            success: function (data) {

                document.getElementById('btnDoc').style.visibility = "visible";
                let obj ;
                try{
                    obj = JSON.parse(data);
                    $("#noData").hide();
                }catch(err){
                    // console.log("null")
                    $("#noData").show();
                }
                let res = [];
                for(let i in obj)
                    res.push(obj[i]);
                console.log(res);

                //slice array to two parts
                if (res.length >= 8) {
                    let tempProfileCount =8;
                    let profileCount =res.length;
                    console.log(profileCount)
                    let initialPart = res.slice(0, 8);
                    $("#doc-show-more").show();

                    //mustache render - initial part
                    let initialProfileSet = Mustache.render(
                        $('#templateDocCards').html(), { 'data': initialPart }
                    );

                    //display first 8
                    $('#docCards').html(initialProfileSet);
                    $('#doc-show-less').hide();

                    //display 8 more with a click
                    $('#doc-show-more').click(function () {
                        tempProfileCount+=8;
                        let nextPart =res.slice(tempProfileCount-8,tempProfileCount);

                        //mustache render - next part
                        let nextProfileSet = Mustache.render(
                            $('#templateDocCards').html(), { 'data': nextPart });
                        $(nextProfileSet).appendTo('#docCards').hide().fadeIn(1000);
                        $("#doc-show-less").show();

                        if(tempProfileCount>=profileCount){
                            $('#doc-show-more').hide();
                        }
                    });

                    $("#doc-show-less").click(function () {
                        $("#docCards").html(initialProfileSet);
                        $("#doc-show-more").show();
                        $("#doc-show-less").hide();
                        tempProfileCount=8;
                    });
                }
                else {
                    //mustache render
                    let content = Mustache.render(
                        $('#templateDocCards').html(), { 'data': res });

                    //display first 6
                    $('#docCards').html(content);

                    //hide button
                    $('#doc-show-more').hide();
                    $('#doc-show-less').hide();
                }
            }
        });
    }
</script>
</body>
</html>
