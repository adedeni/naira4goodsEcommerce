<?php
require_once 'Dbh.php';
require_once 'CheckExpiredOtp.php';
class RegenerateOtp extends CheckExpiredOtp{
    public $otp;
    private $success='OTP regenerated successfully!';
    public function __construct($otp){
       $this->otp = $otp;
    }

    public function regenerateOtpAndUpdateDb(){
            if ($this -> otpTimeExpired()){
                 try {
                    //$this->errors[] = "OTP has expired! New Otp has been sent to your registered email address";
                   // return true;
                       $newOtp = $this->getOtp(); // Generate a new OTP
                           $query = "UPDATE users SET otp = :otp, updated_at = NOW() WHERE email = :email;";
                            $stmt = $this->connect()->prepare($query);
                            $stmt->bindParam(":email", $_SESSION['userEmail']); 
                           $stmt->bindParam(":otp", $newOtp);
                           $stmt->execute();
                   } catch (PDOException $e) {
                       echo "Error updating OTP: " . $e->getMessage();
                   }
                 $this->updateOtp($_SESSION['userEmail'], $newOtp); // Update the new OTP to db
                 $_SESSION['success']= $this->success;
                 header("Location: ../enterOtp.php");
                 die();
            }
    }

}
?>