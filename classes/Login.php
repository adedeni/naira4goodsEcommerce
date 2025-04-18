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
        try {
            $query = "SELECT * FROM users WHERE username = :username OR email = :username OR phoneNo = :username;";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":username", $this->username);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Login error: " . $e->getMessage());
            $this->errors[] = "An error occurred. Please try again.";
            return false;
        }
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
        try {
            $this->InputfieldEmpty(); 
            if (empty($this->errors)) {
                $this->userNotExist();
            }
            if (empty($this->errors)) {
                $this->invalidPwd();
            }
            
            if (!empty($this->errors)) {
                $_SESSION['errors'] = $this->errors;
                header("Location: ../login.php");
                exit();
            }
            
            $userDetails = $this->getLoginDetails();
            if ($userDetails) {
                $_SESSION['userDetails'] = $userDetails;
                header("Location: ../userDashboard.php");
                exit();
            } else {
                $_SESSION['errors'] = ["An error occurred. Please try again."];
                header("Location: ../login.php");
                exit();
            }
        } catch (Exception $e) {
            error_log("Login error: " . $e->getMessage());
            $_SESSION['errors'] = ["An error occurred. Please try again."];
            header("Location: ../login.php");
            exit();
        }
    }
}
