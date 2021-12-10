<?php
session_start();
if(!isset($_SESSION["un"]))
{
    header("location:login.php");
}
?>