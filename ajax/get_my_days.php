<?php
session_start();
include '../config.php';
$conn = getCon();
if(!empty($_SESSION["d_un"])) {
    $query = "SELECT `name`,`nic`,`days` FROM `doctor` WHERE `nic`='" . $_SESSION["d_un"] . "'";
    $result = $conn->query($query);
    $count = $result->rowCount();

    if($count>0) {
        foreach ($result as $row) {
            $day_arr = explode(",",$row[2]);
            echo' <script> $("#a").html('.json_encode($day_arr).')</script>';
            echo "<script>$('#date').prop('disabled',false);</script>";
            echo'<div style="margin-top: 10px">';
            echo "<span style='color:green' value='".$day_arr."'> ".print_r($day_arr)."</span>";
            echo'</div>';
        }
    }
    else{
        echo'<div style="margin-top: 10px">';
        echo "<span style='color:red'> No user found!</span>";
        echo'</div>';
    }
}
?>
