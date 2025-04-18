<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        if (empty($_POST['email'])) {
            throw new Exception("Email is required");
        }
        
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format");
        }
        
        require_once '../classes/Dbh.php';
        require_once '../classes/ForgetPassword.php';
        
        $forgotPassword = new ForgotPassword($email);
        $forgotPassword->submitEmail();
    } catch (Exception $e) {
        error_log("Forgot password error: " . $e->getMessage());
        $_SESSION['errors'] = [$e->getMessage()];
        header("Location: ../forgotPassword.php");
        exit();
    }
} else {
    header("Location: ../forgotPassword.php");
    exit();
}