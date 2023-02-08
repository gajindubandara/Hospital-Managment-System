<?php
session_start();
include '../config.php';
$conn = getCon();
$changeDate = date("Y-m-d", strtotime($_POST["date"]));

if(!empty($_POST["date"])) {
    $query =  "SELECT `id`, `pid`, `date`, `token`, `did`,`state` FROM `bookings` WHERE `did`='" . $_SESSION["d_un"] . "' AND `date`='" . $changeDate . "'";
    $result = $conn->query($query);
    $count = $result->rowCount();

    if($count>0) {
        echo '<div class="container features CardBgCol" id="resCon">
            <div class="row justify-content-md-center">
                <div class="col-md-12">';
        echo '<table class="table" style="border:solid #dee2e6 1px;">';
        echo '<thead class="thead-dark">';
        echo '<tr>
                     <th scope="col">Token Number </th>
                     <th scope="col">Name</th>
                     <th scope="col">Date</th>
    
                     <th scope="col"></th>
              </tr>';
        echo '</thead>';
        foreach ($result as $row) {
            echo '<tbody>';
            echo '<tr class="rw">';
            echo '<td style="vertical-align: middle;"> <input type="hidden" name="pName[]" value="' . $row[3] . '">' . $row[3] . '</td>';
            $q ="SELECT `name` FROM `patient` WHERE `nic`='" .$row[1]."'";
            $res = $conn->query($q);
            foreach ($res as $r) {
                echo '<td style="vertical-align: middle;"> <input type="hidden" value="' . $r[0] . '">' . $r[0] . '</td>';
            }
            echo '<td style="vertical-align: middle;"> <input type="hidden" name="pName[]" value="' . $row[2] . '">' . $row[2] . '</td>';
            $date = date("Y-m-d");

            $formatDate = date("Y-m-d", strtotime($date));
            if($row[2]==$formatDate) {
                echo '<script>window.location.href = "doc_view_bookings.php";</script>';
            }
            if($row[5]=="active"){
                echo  '<td style="vertical-align: middle; text-align: center;"> <input type="hidden" >Session Queued</td>';
            }
            else if($row[5] =="cancelled"){
                echo '<td style="vertical-align: middle; text-align: center;"> <input type="hidden" >Session Cancelled</td>';
            }
            else{
                echo '<td style="vertical-align: middle; text-align: center;"> <input type="hidden" >Session Finished</td>';
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
        echo "<span style='color:red'> No appointments found</span>";
        echo'</div>';
        echo '</div> </div></div>';
    }
}
?>
