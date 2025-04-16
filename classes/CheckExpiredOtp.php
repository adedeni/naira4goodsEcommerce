<?php
 session_start();
require_once 'Dbh.php';
require_once 'ForgetPassword.php';
class CheckExpiredOtp extends ForgotPassword{
        protected $otp;
        protected $errors = array();
        public function __construct($otp)
        {
            $this ->otp = $otp;
        }
        private function getOtpGenTime(){
            $useremail = $_SESSION['userEmail'];
            $query = "SELECT updated_at, otp FROM users WHERE email =:email and otp =:otp;";
            $stmt =$this->connect()->prepare($query);
            $stmt->bindParam(":email", $useremail);
            $stmt->bindParam(":otp", $this->otp);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        //error handlers
        private function otpFieldEmpty(){
            if(empty($this->otp)){
                $this->errors[] = "Field must be filled";
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
                    // try {
                     $this->errors[] = "OTP has expired!";
                     return true;
                    //     $newOtp = $this->getOtp(); // Generate a new OTP
                    //         $query = "UPDATE users SET otp = :otp, updated_at = NOW() WHERE email = :email;";
                    //          $stmt = $this->connect()->prepare($query);
                    //          $stmt->bindParam(":email", $_SESSION['userEmail']); 
                    //         $stmt->bindParam(":otp", $newOtp);
                    //         $stmt->execute();
                    // } catch (PDOException $e) {
                    //     echo "Error updating OTP: " . $e->getMessage();
                    // }
                //   $this->updateOtp($_SESSION['userEmail'], $newOtp); // Update the new OTP to db
                  echo $diffInTimeInMin;
                  //  print_r($userOtpDetails);
                   // die();
                }
            } 
        }
        private function invalidOtp(){
            $userOtpDetails = $this->getOtpGenTime();
           // print_r($userOtpDetails);
            if($this-> otp != $userOtpDetails['otp'] ){
                    $this->errors[] = "Invalid Otp";
            }
    } 
       
    public function goToRecoverPasswordPage(){
                    $this->otpTimeExpired();
                    if(empty($this->errors)){
                        $this-> invalidOtp();
                    }
                    $this->otpFieldEmpty();
                    if(!empty($this->errors)){
                        $_SESSION['errors'] = $this->errors;
                       header("Location: ../enterOtp.php");
                       die();
                    }
                     $_SESSION['otp'] =$this->otp;
                   //  $userOtpDetails = $this->getOtpGenTime();
                   //  $_SESSION['userOtp']=$userOtpDetails['otp'];
                    header("Location: ../recoverPassword.php");
                    die();
    }
}
