<?php
function getCon(){
    $database="mysql:dbname=cms";
    $username="root";
    $password="";
    $conn = new PDO($database, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
?>



