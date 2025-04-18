<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../classes/CheckExpiredOtp.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    try {
        if (!isset($_POST['otp'])) {
            throw new Exception("OTP not provided");
        }
        
        $otp = $_POST['otp'];
        
        if (!isset($_SESSION['userEmail'])) {
            throw new Exception("User session not found");
        }
        
        $checkExpiredOtp = new CheckExpiredOtp($otp); 
        $checkExpiredOtp->goToRecoverPasswordPage();
    } catch (Exception $e) {
        $_SESSION['errors'] = ["An error occurred: " . $e->getMessage()];
        header("Location: ../enterOtp.php");
        exit();
    }
} else {
    header("Location: ../enterOtp.php");
    exit();
}