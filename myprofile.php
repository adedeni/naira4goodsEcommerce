<?php
session_start();
if(!isset($_SESSION['userDetails'])){
header("Location: login.php");
 die();
}
//$userDetails = $_SESSION['userDetails'];
include_once("header.php");
include_once("sidemenus.php");

?>
