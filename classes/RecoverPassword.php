<?php
session_start();
require_once __DIR__ . '/Dbh.php';

class RecoverPassword extends Dbh {
    protected $pwd;
    protected $confirmpwd;
    protected $errors = array();
    private $success = [];
    
    public function __construct($pwd, $confirmpwd) {
        $this->pwd = $pwd;
        $this->confirmpwd = $confirmpwd;
    }
    
    private function validatePassword() {
        if (empty($this->pwd) || empty($this->confirmpwd)) {
            $this->errors[] = "Both password fields are required";
            return false;
        }
        
        if ($this->pwd !== $this->confirmpwd) {
            $this->errors[] = "Passwords do not match";
            return false;
        }
        
        if (strlen($this->pwd) < 6) {
            $this->errors[] = "Password must be at least 6 characters long";
            return false;
        }
        
        if (!preg_match('/[A-Za-z]/', $this->pwd) || !preg_match('/[0-9]/', $this->pwd)) {
            $this->errors[] = "Password must contain both letters and numbers";
            return false;
        }
        
        return true;
    }
    
    public function updatePwd() {
        if (!$this->validatePassword()) {
            $_SESSION['errors'] = $this->errors;
            header("Location: ../recoverPassword.php");
            exit();
        }
        
        try {
            $cost = ['cost' => 12];
            $hashedPwd = password_hash($this->pwd, PASSWORD_BCRYPT, $cost);
            
            $query = "UPDATE users SET pwd = :pwd WHERE email = :email AND otp = :otp";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":pwd", $hashedPwd);
            $stmt->bindParam(":email", $_SESSION['userEmail']);
            $stmt->bindParam(":otp", $_SESSION['otp']);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                // Clear OTP from session
                unset($_SESSION['otp']);
                $_SESSION['success'] = ["Password updated successfully. You can now login with your new password."];
                header("Location: ../login.php");
                exit();
            } else {
                $_SESSION['errors'] = ["Failed to update password. Please try again."];
                header("Location: ../recoverPassword.php");
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION['errors'] = ["An error occurred. Please try again."];
            header("Location: ../recoverPassword.php");
            exit();
        }
    }
}