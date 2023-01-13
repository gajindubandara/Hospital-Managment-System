<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>

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

//include 'repository/DoctorService.php';
//$profiles = new DoctorService();
//$result=$profiles->getAllDoctors();
//$arr = array();
//foreach ($result as $row){
//    $objArray =array();
//    for($i=0;$i<14;$i++){
//        array_push($objArray,$row[$i]);
//    }
//    array_push($arr,$objArray);
//}
//echo '<script>console.log('.json_encode($arr).')</script>';


include 'repository/DoctorService.php';
$profiles = new DoctorService();
$result=$profiles->getAllDoctors();
$arr = array();

foreach ($result as $row){
    $objArray = array('name'=>$row[1],'field'=>$row[7],);
//    $objArray =array();
//    for($i=0;$i<14;$i++){
//        array_push($objArray,$row[$i]);
//    }
    array_push($arr,$objArray);
}
//echo json_encode($arr);

?>

<!--<div class="container features CardBgCol">-->
<!--    <div class="heading" style="margin-top: 0px !important;">-->
<!--        <h1 class="heading__title" style="margin-top: 30px !important;">Clinic Management System</h1>-->
<!--        <p class="heading__credits" style="margin-bottom: 0px !important;  font-weight: 400;"> Our System Software helps-->
<!--            deliver superior healthcare delivery for doctors, clinics and hospitals.</p>-->
<!--        <div class="heart-box">-->
<!--            <img src="images/favicon.ico" class="heart">-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<!--<div class="container features CardBgCol">-->
<!--        <div class="heading" style="margin-top: 0px !important;">-->
<!--            <h1 class="heading__title" style="margin-top: 30px !important;">Our Doctors</h1>-->
<!--            <p class="heading__credits" style="margin-bottom: 0px !important;  font-weight: 400;"> Our System Software helps-->
<!--                deliver superior healthcare delivery for doctors, clinics and hospitals.</p>-->
<!---->
<!--        </div>-->
<!--    <div class="row center">-->
<!--        <div class="card-doc p-3">-->
<!--            <div class="d-flex align-items-center">-->
<!--                <div class="image">-->
<!--                    <img src="https://www.meme-arsenal.com/memes/c84b011e5940d554f2cf8018ddf32ed2.jpg" class="rounded" width="155" >-->
<!--                </div>-->
<!--                <div class="ml-3 w-100">-->
<!--                    <h4 class="mb-0 mt-0">hello </h4>-->
<!--                    <span>Mbbs</span>-->
<!--                    <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">-->
<!--                        <div class="d-flex flex-column">-->
<!--                            <span class="articles">Articles</span>-->
<!--                            <span class="number1">00</span>-->
<!--                        </div>-->
<!--                        <div class="d-flex flex-column">-->
<!--                            <span class="followers">Followers</span>-->
<!--                            <span class="number2">000</span>-->
<!--                        </div>-->
<!--                        <div class="d-flex flex-column">-->
<!--                            <span class="rating">Rating</span>-->
<!--                            <span class="number3">00</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                                    <div class="button mt-2 d-flex flex-row align-items-center">-->
<!--                                        <button class="btn btn-sm btn-outline-primary w-100">Chat</button>-->
<!--                                        <button class="btn btn-sm btn-primary w-100 ml-2">Follow</button>-->
<!--                                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--      <script>-->
<!--          //let users = --><?php ////echo json_encode($arr); ?>;
<!--//          //   console.log(users);-->
<!--//      </script>-->
<!--//-->
<!--//-->
<!--//    </div>-->
<!--//    </div>-->
<!--//</div>-->

<div id="doctors_div" class="container features CardBgCol">
    <div class="heading" style="margin-top: 0px !important;">
        <h1 class="cardTitle" style="margin-top: 30px !important;">Our Doctors</h1>
    </div>

    <!-- Profile cards goes here -->
    <div id="docCards">
    </div>
    <div class="row justify-content-center" id="btnDoc" style="visibility:hidden;">
        <button id="doc-show-more" class="btn btn-link" style="margin: 0px">SEE MORE</button>
        <a id="doc-show-less" class="btn btn-link " style="margin: 0px" href="#doctors_div">SEE LESS</a>
    </div>
</div>

</div>

<div class="container features ">
    <div class="row center CardBgCol">
        <div class=" col-md-12 ">
            <h1 class="cardTitle">Our Hospital</h1>
            <div class="map-responsive">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3957.5881070161327!2d80.6322636!3d7.2876155!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae36882b22910bf%3A0x82b71793a1e570c5!2sNational%20Hospital%20-%20Kandy!5e0!3m2!1sen!2slk!4v1648022317800!5m2!1sen!2slk"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container features ">
    <div class="row center CardBgCol">
        <div class=" col-md-12 ">
            <h1 class="cardTitle">About Us!</h1>
            <!--            <p class="aboutUs"><i class="fa fa-plus-square" style='font-size:48px;color:black'></i></p>-->
            <p class="aboutUs" style="margin-bottom: 20px">
                Team error 404 clinic management system ideal for health care professionals on the move or who are
                working from different hospitals. It's equivalent app can be access throw website on any mobile
                devices so you can access your medical patient record system anywhere you are.
            </p>
        </div>
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
    <div class="row center">
    {{#data}}
        <div class="card-doc p-3">
            <div class="d-flex align-items-center">
                <div class="image">
                    <img src="https://www.meme-arsenal.com/memes/c84b011e5940d554f2cf8018ddf32ed2.jpg" class="rounded" width="155" >
                </div>
                <div class="ml-3 w-100">
                    <h4 class="mb-0 mt-0">{{name}} </h4>
                    <span>{{field}}</span>
                    <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                        <div class="d-flex flex-column">
                            <span class="articles">Qualification</span>
                            <span class="number1">{{qual}}</span>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="followers">Rate</span>
                            <span class="number2">Rs.{{rps}}</span>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="rating">Ppd</span>
                            <span class="number3">{{ppd}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{/data}}
    </div>
</script>


<script>
    $(function () {
        //let doctors = <?php //echo json_encode($arr); ?>//;
        //let doctors = <?php //include 'ajax/get_active_docs.php' ; ?>//;
        //console.log(doctors);
        loadDocs();
    });



    function loadDocs() {
        $.ajax({
            type: 'post',
            url: 'ajax/get_active_docs.php',
            success: function (data) {
                document.getElementById('btnDoc').style.visibility = "visible";


                var obj = JSON.parse(data);
                var res = [];

                for(var i in obj)
                    res.push(obj[i]);
                    console.log(res);

                //slice array to two parts
                if (res.length >= 6) {
                    let tempProfileCount =6;
                    let profileCount =res.length;
                    let initialPart = res.slice(0, 6);

                    //mustache render - initial part
                    let initialProfileSet = Mustache.render(
                        $('#templateDocCards').html(), { 'data': initialPart }
                    );

                    //display first 6
                    $('#docCards').html(initialProfileSet);
                    $('#doc-show-less').hide();

                    //display 6 more with a click
                    $('#doc-show-more').click(function () {
                        tempProfileCount+=6;
                        let nextPart =res.slice(tempProfileCount-6,tempProfileCount);

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
                    });
                } else {
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
