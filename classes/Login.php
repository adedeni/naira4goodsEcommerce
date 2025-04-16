<?php
session_start();
require_once 'Dbh.php';
class Login extends Dbh{
    private $username;
    private $pwd;
    private $errors = array();
    public function __construct($username, $pwd)
    {
     $this->username = $username;
     $this ->pwd = $pwd;  
    }
    private function getLoginDetails(){
        $query = "SELECT * FROM users WHERE username=:username || email=:username || phoneNo=:username || pwd =:pwd;";
        $stmt= $this->connect()->prepare($query);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":pwd", $this->pwd);
        $stmt->execute();
        $result= $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    private function invalidPwd(){
            $results = $this->getLoginDetails();
            if($results){
                if(!password_verify($this->pwd, $results['pwd'])){
                    $this->errors[] = "Invalid password";
                }
            }
            } 
    public function userNotExist(){
        $results = $this->getLoginDetails();
                if(!$results){
                    $this->errors[] ="Invalid username/email/phoneNo";
                }
    }
    protected function InputfieldEmpty(){
        if(empty($this->username) || empty($this->pwd)){
            $this->errors[] ="All fields are required";
    }
}
// public function rememeberMe(){
    

// }
    public function loginUser(){
            $this->InputfieldEmpty(); 
            $this->invalidPwd();
            $this->userNotExist();
            if(!empty($this->errors)){
                $_SESSION['errors'] = $this->errors;
                header("Location: ../login.php");
                die();
           }
          $_SESSION['userDetails'] = $this->getLoginDetails();
         // $this->rememeberMe(); 
           header("Location: ../userDashboard.php");    
        }
    }
