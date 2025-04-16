<?php
session_start();
require_once 'Register.php';
class RecoverPassword extends Register{
            protected $pwd;
            protected $confirmpwd;
            private $success=[];
           // private $errors=array();
            public function __construct($pwd, $confirmpwd)
            {
                $this->pwd = $pwd;
                $this->confirmpwd = $confirmpwd;
            }
            
            private function updateNewPwdTODb(){
                $option =[
                    'cost'=>12,
                ];
                $hashedpwd =password_hash($this->pwd, PASSWORD_BCRYPT, $option);
                $userEmail=$_SESSION['userEmail'];
                $query="UPDATE users SET pwd=:pwd WHERE email=:email;";
                $stmt=$this->connect()->prepare($query);
                $stmt->bindParam(":email",$userEmail);
                $stmt->bindParam(":pwd",$hashedpwd);
                $stmt->execute();
                $this->success[] = "Password reset Successfully!";
            }
            //error handler
            private function fieldEmpty(){
                if(empty($this->pwd) || empty($this->confirmpwd)){
                            $this->errors[] = "All fields must be field";    
                }
            }
            public function updatePwd(){
                    //error checkers called from Register class.
                    $this->notValidPwd();
                    $this->newPwd_is_more_than6();
                   // $this->inputFieldEmpty();
                   $this->fieldEmpty();
                    $this->pwdNotThesame();
                    $errors = $this->getErrors(); //getErrors is a function from Register class that stores array of errors so as to enchance code usability.
                    if(!empty($errors)){
                        $_SESSION['errors'] = $errors;
                       // print_r($_SESSION['errors']);
                        header("Location: ../recoverPassword.php");
                            die();
                    }
                    $this->updateNewPwdTODb();
                     $_SESSION['success'] = $this->success;
                    header("Location: ../recoverPassword.php");
                   
            }
}