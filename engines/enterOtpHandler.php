<?php
require_once '../classes/CheckExpiredOtp.php';
if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $otp = $_POST['otp'];
            $checkExpiredOtp = new CheckExpiredOtp($otp); 
            $checkExpiredOtp->goToRecoverPasswordPage();
}
else{
    header("Location: ../enterOtp.php");
}