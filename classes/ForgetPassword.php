<?php
//session_start();
//require_once 'Dbh.php';
require_once 'Register.php';
class ForgotPassword extends Register{
            protected $email;
            private $username;
            private $phoneNo;
            protected $errors = array();
            public function __construct($email){
                    $this->email = $email;
            }

            private function getUserEmail(){
                $query = "SELECT email FROM users WHERE email = :email;";
                $stmt= $this->connect()->prepare($query);
                $stmt ->bindParam("email", $this->email);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            }
            private function emailFieldEmpty(){
                if(empty($this->email)){
                        $this -> errors[]= "Field must be filled";
                }
            }
            // private function invalidEmail(){
               
            //     $this -> errors[]= "Invalid Email";
            // } 
            public function emailNotExist(){
                // echo "I'm here";
                $userEmail = $this->getUserEmail();
                // var_dump($userEmail);
                if ($this->email != $userEmail['email'])
                $this -> errors[]= "Email doesn't exist";
                 
            }
            protected function getOtp(){
                $otp = random_int(100000, 999999);
                return $otp;
            }
            protected function updateOtp(){
                $otp = $this->getOtp();
                $query = "UPDATE users SET otp = :otp WHERE email= :email ;";
                $stmt =$this->connect()->prepare($query);
                $stmt->bindParam(":email", $this->email);
                $stmt->bindParam(":otp", $otp);
                $stmt ->execute();
            }
            public function submitEmail(){
               // $this->EmailNotValid();
                $this->emailNotExist();
                 $this->emailFieldEmpty(); 
                if(!empty($this->errors)){
                    $_SESSION['errors'] = $this->errors;
                   header("Location: ../forgotPassword.php");
                    die();
               }
               $this->updateOtp();
               $_SESSION['userEmail'] = $this->email;
              // $_SESSION['otp'] = $this->getOtp();
               //var_dump($_SESSION['userEmail']);
               header("Location: ../enterOtp.php");
               
            }


}