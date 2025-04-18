<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Debug information
        error_log("POST data: " . print_r($_POST, true));
        
        // Validate required fields
        $required_fields = ['fullname', 'username', 'email', 'phoneNo', 'pwd', 'confirmpwd'];
        foreach ($required_fields as $field) {
            if (!isset($_POST[$field]) || empty($_POST[$field])) {
                throw new Exception("All fields are required");
            }
        }
        
        // Sanitize input
        $fullname = htmlspecialchars(trim($_POST['fullname']));
        $username = htmlspecialchars(trim($_POST['username']));
        $email = htmlspecialchars(trim($_POST['email']));
        $phoneNo = htmlspecialchars(trim($_POST['phoneNo']));
        $pwd = $_POST['pwd']; // Don't escape password
        $confirmpwd = $_POST['confirmpwd']; // Don't escape password
        
        // Debug information
        error_log("Attempting to register user:");
        error_log("Fullname: " . $fullname);
        error_log("Username: " . $username);
        error_log("Email: " . $email);
        error_log("Phone: " . $phoneNo);
        
        require_once __DIR__ . '/../classes/Register.php';
        $register = new Register($fullname, $username, $email, $phoneNo, $pwd, $confirmpwd);
        $register->register();
    } catch (Exception $e) {
        error_log("Error in registerhandler.php: " . $e->getMessage());
        error_log("Stack trace: " . $e->getTraceAsString());
        $_SESSION['errors'] = ["Registration failed: " . $e->getMessage()];
        header("Location: ../register.php");
        exit();
    }
} else {
    header("Location: ../register.php");
    exit();
}