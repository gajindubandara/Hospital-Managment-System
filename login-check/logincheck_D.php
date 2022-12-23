<?php
session_start();
if(!isset($_SESSION["d_un"]))
{
    header("location:doc_login.php");
}
?>
