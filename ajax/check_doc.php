<?php
$database="mysql:dbname=cms";
$username="root";
$password="";
$conn = new PDO($database, $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(!empty($_POST["SF"])) {
    $query = "SELECT `name`,`nic` FROM `doctor` WHERE `sField`='" . $_POST["SF"] . "'";
    $result = $conn->query($query);
    $count = $result->rowCount();
    if($count>0) {
        echo " <script> $('#list').html('";
        echo"<option >Select -</option>";
        foreach ($result as $row) {
            echo"<option value=$row[1]>$row[0]</option>";
        }
        echo" ')</script>";

        echo "<script>$('#list').prop('disabled',false);</script>";
    }
    else{
        echo" <script> $('#check-Doc').html('<span style=color:red> There are no available doctors for this field!</span>')</script>";
        echo "<script>$('#list').prop('disabled',true);</script>";
        echo "<script>$('#date').prop('disabled',true);</script>";
    }
}
?>
