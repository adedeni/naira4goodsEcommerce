<?php
session_start();
require_once __DIR__ . '/Dbh.php';
require_once __DIR__ . '/ForgetPassword.php';

class CheckExpiredOtp extends ForgotPassword {
    protected $otp;
    protected $errors = array();
    
    public function __construct($otp) {
        $this->otp = $otp;
    }
    
    private function getOtpGenTime() {
        if (!isset($_SESSION['userEmail'])) {
            $this->errors[] = "Session expired. Please try again.";
            return false;
        }
        
        $useremail = $_SESSION['userEmail'];
        try {
            $query = "SELECT updated_at, otp FROM users WHERE email = :email AND otp = :otp;";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":email", $useremail);
            $stmt->bindParam(":otp", $this->otp);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            $this->errors[] = "Database error occurred. Please try again.";
            return false;
        }
    }
    
    private function otpFieldEmpty() {
        if (empty($this->otp)) {
            $this->errors[] = "OTP field must be filled";
        }
    }
    
    protected function otpTimeExpired() {
        date_default_timezone_set('Africa/Lagos');
        $userOtpDetails = $this->getOtpGenTime();
        
        if ($userOtpDetails) {
            $otpGenTime = new DateTime($userOtpDetails['updated_at']);
            $currentTime = new DateTime();
            $diffInTime = $currentTime->diff($otpGenTime);
            $diffInTimeInMin = ($diffInTime->days * 24 * 60 + ($diffInTime->h * 60) + ($diffInTime->i));
            
            if ($diffInTimeInMin > 2) {
                $this->errors[] = "OTP has expired!";
                return true;
            }
        }
        return false;
    }
    
    private function invalidOtp() {
        $userOtpDetails = $this->getOtpGenTime();
        if ($userOtpDetails && $this->otp != $userOtpDetails['otp']) {
            $this->errors[] = "Invalid OTP";
        }
    }
    
    public function goToRecoverPasswordPage() {
        $this->otpFieldEmpty();
        
        if (empty($this->errors)) {
            $this->otpTimeExpired();
        }
        
        if (empty($this->errors)) {
            $this->invalidOtp();
        }
        
        if (!empty($this->errors)) {
            $_SESSION['errors'] = $this->errors;
            header("Location: ../enterOtp.php");
            exit();
        }
        
        $_SESSION['otp'] = $this->otp;
        header("Location: ../recoverPassword.php");
        exit();
    }
}
