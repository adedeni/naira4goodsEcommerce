<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    try {
        // Debug information
        error_log("POST data: " . print_r($_POST, true));
        error_log("SESSION data: " . print_r($_SESSION, true));
        
        if (!isset($_POST['pwd']) || !isset($_POST['confirmpwd'])) {
            throw new Exception("Password fields are required");
        }
        
        if (!isset($_SESSION['userEmail']) || !isset($_SESSION['otp'])) {
            throw new Exception("Session expired. Please try again.");
        }
        
        $pwd = $_POST['pwd'];
        $confirmpwd = $_POST['confirmpwd'];
        
        require_once __DIR__ . '/../classes/RecoverPassword.php';
        $recoverPassword = new RecoverPassword($pwd, $confirmpwd);
        $recoverPassword->updatePwd();
    } catch (Exception $e) {
        error_log("Error in recoverPassowordHandler.php: " . $e->getMessage());
        $_SESSION['errors'] = [$e->getMessage()];
        header("Location: ../recoverPassword.php");
        exit();
    }
} else {
    header("Location: ../recoverPassword.php");
    exit();
}