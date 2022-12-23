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
    $query = "SELECT `pid`, `date`, `token`, `did`,`state` FROM `bookings` WHERE `date`='" . $changeDate . "' AND `did`='" . $_SESSION['docNic'] . "'";
    $result = $conn->query($query);
    $count = $result->rowCount();

    if($count>0) {
        echo '<div class="container features CardBgCol" id="resCon">
            <div class="row justify-content-md-center">
                <div class="col-md-12">';
        echo '<table class="table" style="border:solid #dee2e6 1px;">';
        echo '<thead class="thead-dark">';
        echo '<tr>
                     <th scope="col">Token Number</th>
                     <th scope="col">Name</th>
                     <th scope="col">State</th>

              </tr>';
        echo '</thead>';
        foreach ($result as $row) {
            echo '<tbody>';
            echo '<tr class="rw">';
            echo '<td style="vertical-align: middle;"> <input type="hidden" name="pID[]" value="' . $row[2] . '">' . $row[2] . '</td>';
            $q = "SELECT `name`, `nic`, `email`, `password`, `no`, `address`, `dob`, `bg`, `gender` FROM `patient` WHERE `nic` ='" . $row[0]. "'";
            $r = $conn->query($q);
            foreach ($r as $row1) {
                echo '<td style="vertical-align: middle;"> <input type="hidden" value="' . $row1[0] . '">' . $row1[0] . '</td>';
            }

            if($row[4]=="active"){
                echo '<td style="vertical-align: middle; "> <input type="hidden" name="pID[]" >Session Queued</td>';
            }
            else if($row[4]=="canceled"){
                echo '<td style="vertical-align: middle;"> <input type="hidden" name="pID[]" >Session Canceled</td>';
            }
            else if($row[4]=="completed"){
                echo '<td style="vertical-align: middle; "> <input type="hidden" name="pID[]" >Session Completed</td>';
            }
            echo '</tr>';
            echo ' </tbody>';
        }
        echo '</table>';
        echo '</div> </div></div>';
    }else{
        echo '<div class="container features CardBgCol" id="resCon">
            <div class="row justify-content-md-center">
                <div class="col-md-12">';
        echo'<div style=" text-align: center">';
        echo "<span style='color:red'> No appointments found!</span>";
        echo'</div>';
        echo '</div> </div></div>';
    }
}
else{
    echo "<span style='color:red'> No date</span></br>";
}
?>
