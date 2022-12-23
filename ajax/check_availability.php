<?php
session_start();
include "config.php";
$database="mysql:dbname=cms";
$username="root";
$password="";
$conn = new PDO($database, $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!empty($_POST["date"])) {
    $bookedTokens="";
    $tokensPerDay="";
    $d =$_POST["date"] ;
    $changeDate = date("Y-m-d", strtotime($d));
    $query = "SELECT `pid`, `date`, `token`, `did` FROM `bookings` WHERE `date`='" . $changeDate . "' AND `did`='" . $_SESSION['docNic'] . "'";
    $result = $conn->query($query);
    $count = $result->rowCount();
    $bookedTokens=$count;

    $q = "SELECT `ppd`,`nic` FROM `doctor` WHERE `nic`='" . $_SESSION['docNic'] . "'";
    $res = $conn->query($q);
    foreach ($res as $row) {
        $tokensPerDay=$row[0];
    }
    echo "<span style='color:green'> Tokens per Day = " . $tokensPerDay . "</span></br>";
    echo "<span style='color:green'> Tokens booked = " . $bookedTokens . "</span></br>";

    $tokensLeft=$tokensPerDay-$bookedTokens;
    echo "<span style='color:green'> Tokens Left = " . $tokensLeft . "</span></br>";

    $_SESSION['tokenNo'] = $bookedTokens+1;
    if ($tokensPerDay==$bookedTokens){
        echo "<span style='color:red'> No available tokens for this day!</span>";
        echo "<script>$('#btnAdd').prop('disabled',true);</script>";

    }else{
        echo "<span style='color:green'></span></br>";
        echo "<script>$('#btnAdd').prop('disabled',false);</script>";
    }
}
?>
