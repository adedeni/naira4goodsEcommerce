<?php
session_start();
require_once 'Dbh.php';
class EditProfile extends Dbh{
    private $fullname;
    private $username;
    private $email;
    private $phoneNo;
    private $address;
    private $currentpwd;
    // private $newpwd;
    // private $confirmpwd;
    private $errors = [];
    private $success=[];
    //private $userDetails=[];
    public function __construct($fullname, $username, $email, $phoneNo, $address,$currentpwd)
    {
        $this->fullname = $fullname;
        $this->username = $username;
        $this->email = $email;
        $this->phoneNo = $phoneNo;
        $this->address = $address;
        $this->currentpwd = $currentpwd;
        // $this->newpwd = $newpwd;
        // $this->confirmpwd = $confirmpwd;
    }
    public function updateUserForm(){
        // $cost = [
        //     'cost' => 12,
        // ];
        $query = "UPDATE users SET fullname = :fullname, email = :email, phoneNo = :phoneNo, address = :address WHERE username = :username;";
        // $hashedPwd = password_hash($this->newpwd, PASSWORD_BCRYPT, $cost );
                $stmt=$this->connect()->prepare($query);
                $stmt->bindParam(":fullname", $this->fullname);
                $stmt->bindParam(":username", $this->username);
                $stmt->bindParam(":email", $this->email);
                $stmt->bindParam(":phoneNo", $this->phoneNo);
                // $stmt->bindParam(":pwd", $hashedPwd);
                $stmt->bindParam(":address", $this->address);
                $stmt->execute();
                $this->success[] = "Data updated Successfully";
                //echo "I'm here";
    }
    private function getEditedDetails(){
        $query = "SELECT * FROM users WHERE username=:username";
        $stmt= $this->connect()->prepare($query);
        $stmt->bindParam(":username", $this->username);
        $stmt->execute();
        $result= $stmt->fetch(PDO::FETCH_ASSOC);
       return $result;
    }
  
    private function getPwd(){
        $query = "SELECT pwd FROM users WHERE username = :username";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":username", $this->username);
        $stmt->execute();
        $result =$stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    //error handlers
    
        // private function notValidPwd(){
        //     if(!(preg_match('/[a-zA-Z]/', $this->newpwd) && preg_match('/[0-9]/', $this->newpwd))){
        //         $this->errors[] = "Password must contain both letters and numbers";   
        //     }
        // }
        // private function newPwd_is_more_than6(){
        //     if(strlen($this->newpwd) < 6){
        //         $this->errors[] = "Password must have atleast six characters";
        //     }
        // }
    private function inputFieldEmpty(){
        if(empty($this->fullname) || empty($this->address)||empty($this->username)|| empty($this->phoneNo)|| empty($this->currentpwd)){
                    $this->errors[] = "All fields must be filled";
                   
        }
    }
    private function notValidFullname(){
        if(!(preg_match("/^[a-zA-Z\s]+$/", $this->fullname))){
                    $this->errors[] = "Full name must not have special chareacters or number";
                   
        }
    }
    private function fullnameIsMoreThan50(){
        if (strlen($this->fullname)>50){
        $this->errors[] = "Full name is more 50 characters";
      
}
}
    private function EmailNotValid(){
        if(!(filter_var($this->email, FILTER_VALIDATE_EMAIL))){
                        $this->errors[] = "Enter a valid email address";
        }
    }
    private function phonenoNotInterger(){
                    if (!(preg_match('/^[0-9]{11}$/', $this->phoneNo))){
                                $this->errors[] = "Invalid phone number";         
                    }
                 }
    // // private function pwdNotThesame(){
    // //     if($this->confirmpwd != $this->newpwd ){
    // //             $this->errors[] = "Password is not the same";
    //     }
    // }
    public function comparePassword(){
        $result =$this->getPwd();
        if (!password_verify($this->currentpwd, $result['pwd'])){
            $this->errors[]= "Invalid password";
        }
    }
    public function submitEditedForm(){
        $this->comparePassword();
        $this->inputFieldEmpty();
        $this->EmailNotValid();
        $this->phonenoNotInterger();
        // $this-> pwdNotThesame();
        $this-> notValidFullname();
        $this-> fullnameIsMoreThan50();
        // $this-> notValidPwd();
        // $this->newPwd_is_more_than6();
        if(!empty($this->errors)){
            $_SESSION['errors'] =$this->errors;
            header("Location: ../userDashboard.php?modalStatus=open");
            die();
        }
    
        $this->updateUserForm();
        $_SESSION['userDetails']=$this->getEditedDetails();
        $_SESSION['success'] = $this->success;
        header("Location: ../userDashboard.php?modalStatus=open");
        exit();
    }
}
?>