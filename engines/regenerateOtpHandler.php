<?php
session_start();
if ($_SERVER['REQUEST_METHOD']== "POST"){
       // require_once '../classes/CheckExpiredOtp.php';
       
        require_once '../classes/RegenerateOtp.php';
        $otp = $_SESSION['otp'];
       // $userOtpDetails = $this->getOtpGenTime();
       // $userOtp=$_SESSION['userOtp'];
          
        //var_dump($otp);
       // var_dump($_SESSION);
        $regenerateOtpAndUpateTime = new RegenerateOtp($otp);
          $regenerateOtpAndUpateTime-> regenerateOtpAndUpdateDb();
             
}
?>