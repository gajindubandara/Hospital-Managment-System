<?php
include '../config.php';
$conn = getCon();
if (isset($_POST['query'])) {
    $query = "SELECT  `name`, `nic`, `email`, `no`, `address` FROM patient WHERE nic LIKE '{$_POST['query']}%' LIMIT 100";
    $result = $conn->query($query);
    $count = $result->rowCount();

    if ($count > 0) {
        echo '<div class="container features CardBgCol" id="resCon">
            <div class="row justify-content-md-center">
                <div class="col-md-12"><form method="post">';
        echo '<table class="table" style="border:solid #dee2e6 1px;">';
        echo '<thead class="thead-dark">';
        echo '<tr>
                     <th scope="col">NIC</th>
                     <th scope="col">Name</th>
                     <th scope="col">Email</th>
                    
                     <th scope="col">No</th>
                     <th scope="col">Address</th>
                     <th scope="col"></th>
              </tr>';
        echo '</thead>';
        foreach ($result as $row) {
            echo '<tbody>';
            echo '<tr class="rw">';
            echo '<td style="vertical-align: middle;"> <input type="hidden" name="pID[]" value="' . $row[1] . '">' . $row[1] . '</td>';
            echo '<td style="vertical-align: middle;"> <input type="hidden" name="pName[]" value="' . $row[0] . '">' . $row[0] . '</td>';
            echo '<td style="vertical-align: middle;"> <input type="hidden" name="pID[]" value="' . $row[2] . '">' . $row[2] . '</td>';
            echo '<td style="vertical-align: middle;"> <input type="hidden" name="pName[]" value="' . $row[3] . '">' . $row[3] . '</td>';
            echo '<td style="vertical-align: middle;"> <input type="hidden" name="pID[]" value="' . $row[4] . '">' . $row[4] . '</td>';
            echo '<td style="vertical-align: middle;"><button class="btn btn-primary"  style="margin: auto" name="btnView" type="submit"  value="' . $row[1] . '">View  </button></td>';
            
            if (isset($_POST["btnView"])) {
                $_SESSION["pNic"] =$_POST["btnView"];
                echo '<script>window.location.href = "patient_report.php";</script>';
            }
            echo '</tr>';
            echo ' </tbody>';
        }
        echo '</table>';
        echo '</form></div> </div></div>';
    }
    else {
        echo "<span  style='color:red; margin-left: auto; margin-right: auto; display: table; margin-top: 50px;' class='features CardBgCol' > No user available for this NIC number</span>";
    }
}
?>
