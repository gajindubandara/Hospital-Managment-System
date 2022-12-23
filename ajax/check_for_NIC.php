<?php
include "config.php";
$database="mysql:dbname=cms";
$username="root";
$password="";
$conn = new PDO($database, $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(!empty($_POST["NIC"])) {
    $query = "SELECT `name` FROM patient WHERE nic='" . $_POST["NIC"] . "'";
    $result = $conn->query($query);
    $count = $result->rowCount();
    if($count>0) {
        foreach ($result as $row) {
            echo'<div style="margin-top: 10px">';
            echo "<span style='color:green'> ".$row['name']."</span>";
            echo "<script>$('#submit').prop('disabled',false);</script>";
            echo'</div>';
        }
    }
    else{
        echo'<div style="margin-top: 10px">';
        echo "<span style='color:red'> No user found!</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
        echo'</div>';
    }
}
?>
