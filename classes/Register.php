<?php
require_once 'Dbh.php';
session_start();
class Register extends Dbh{
    private $fullname;
    // private $state;
    // private $gender;
    private $username;
    private $email;
    private $phoneNo;
    protected $pwd;
    protected $confirmpwd;
    protected $errors = array();
    public function __construct($fullname, $username, $email,$phoneNo, $pwd, $confirmpwd)
    {
        $this->fullname = $fullname;
        // $this->state = $state;
        // $this->gender = $gender;
        $this->username = $username;
        $this->email = $email;
        $this->phoneNo = $phoneNo;
        $this->pwd = $pwd;
        $this->confirmpwd = $confirmpwd;
    }
    private function insertUser(){
        $cost = [
            'cost' => 12,
        ];
        $query = "INSERT INTO users (`fullname`,`username`,`email`,`phoneNo`, `pwd`) VALUES (:fullname, :username, :email, :phoneNo, :pwd);";
        $hashedPwd = password_hash($this->pwd, PASSWORD_BCRYPT, $cost );
        $stmt = $this->connect()->prepare($query);
        $stmt ->bindParam(":fullname",$this-> fullname);
        // $stmt ->bindParam(":state", $this->state);
        // $stmt ->bindParam(":gender", $this->gender);
        $stmt ->bindParam(":username",$this-> username);
        $stmt ->bindParam(":email", $this->email);
        $stmt ->bindParam(":phoneNo", $this->phoneNo);
        $stmt ->bindParam(":pwd", $hashedPwd);
        $stmt ->execute();
    }
    public function getUserDetails(){
        $query = "SELECT * FROM users WHERE username = :username || email = :email || phoneNo = :phoneNo;";
        $stmt = parent::connect()->prepare($query);
        $stmt ->bindParam(":username", $this->username);
        $stmt ->bindParam("email", $this->email);
        $stmt ->bindParam(":phoneNo", $this->phoneNo);
        $stmt -> execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    protected function notValidPwd(){
        if(!(preg_match('/[a-zA-Z]/', $this->pwd) && preg_match('/[0-9]/', $this->pwd))){
            $this->errors[] = "Password must contain both letters and numbers";   
        }
    }
    protected function newPwd_is_more_than6(){
        if(strlen($this->pwd) < 6){
            $this->errors[] = "Password must have atleast six characters";
        }
    }
    public function  detailsAlreadyExist(){
        $results = $this->getUserDetails();
            if(is_array($results)){
                if(!empty($results['username']) && $results['username']==$this->username){
                    $this->errors[] = "Username already exist";
                     
                }
                if(!empty($results['email']) && $results['email']==$this->email){
                    $this->errors[] = "Email already exist";
                }
                if(!empty($results['phoneNo']) && $results['phoneNo']==$this->phoneNo){
                    $this->errors[] = "Phone Number already exist";
                }
            }
        }     
    private function fullnameIsMoreThan50(){
                    if (strlen($this->fullname)>50){
                    $this->errors[] = "Full name is more 50 characters";
                  
        }
    }
    private function notValidFullname(){
        if(!(preg_match("/^[a-zA-Z\s]+$/", $this->fullname))){
                    $this->errors[] = "Full name must not have special chareacters or number";
                   
        }
    }
    protected function inputFieldEmpty(){
        if(empty($this->fullname) || empty($this->username)|| empty($this->phoneNo)|| empty($this->pwd) || empty($this->email) || empty($this->confirmpwd)){
                    $this->errors[] = "All fields must be field";
                   
        }
    }
    protected function EmailNotValid(){
        if(!(filter_var($this->email, FILTER_VALIDATE_EMAIL))){
                        $this->errors[] = "Enter a valid email address";
        }
    }
    private function phonenoNotInterger(){
                    if (!(preg_match('/^[0-9]{11}$/', $this->phoneNo))){
                                $this->errors[] = "Invalid phone number";         
                    }
                 }
    protected function pwdNotThesame(){
        if($this->confirmpwd != $this->pwd ){
                $this->errors[] = "Password is not the same";
        }
    }
    public function getErrors() {
        return $this->errors;
    }
    public function register(){
        $this->inputFieldEmpty();
        $this->detailsAlreadyExist();
        $this->fullnameIsMoreThan50();
        $this->notValidFullname();
        $this->emailNotValid();
        $this->phonenoNotInterger();
        $this->pwdNotTheSame();
        $this-> notValidPwd();
        $this->newPwd_is_more_than6();
         if(!empty($this->errors)){
            $_SESSION['errors'] = $this->errors;
            header("Location: ../register.php");
            die();
        }
        $this->insertUser();
        header("Location:../login.php");
        die();  
    }
    
}
