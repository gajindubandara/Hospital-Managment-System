<?php
session_start();
if(!isset($_SESSION["a_un"]))
{
    header("location:login.php");
}
?>