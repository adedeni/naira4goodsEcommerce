<?php
require_once __DIR__ . '/Dbh.php';
session_start();

class Register extends Dbh {
    private $fullname;
    // private $state;
    // private $gender;
    private $username;
    private $email;
    private $phoneNo;
    protected $pwd;
    protected $confirmpwd;
    protected $errors = array();
    
    public function __construct($fullname, $username, $email, $phoneNo, $pwd, $confirmpwd) {
        $this->fullname = $fullname;
        // $this->state = $state;
        // $this->gender = $gender;
        $this->username = $username;
        $this->email = $email;
        $this->phoneNo = $phoneNo;
        $this->pwd = $pwd;
        $this->confirmpwd = $confirmpwd;
    }
    
    private function insertUser() {
        try {
            $cost = ['cost' => 12];
            $query = "INSERT INTO users (`fullname`, `username`, `email`, `phoneNo`, `pwd`, `gender`, `state`, `address`) VALUES (:fullname, :username, :email, :phoneNo, :pwd, :gender, :state, :address);";
            $hashedPwd = password_hash($this->pwd, PASSWORD_BCRYPT, $cost);
            $defaultGender = 'other'; // Default gender value
            $defaultState = 'Lagos'; // Default state value
            $defaultAddress = 'Not specified'; // Default address value
            
            // Debug information
            error_log("Attempting to insert user with data:");
            error_log("Fullname: " . $this->fullname);
            error_log("Username: " . $this->username);
            error_log("Email: " . $this->email);
            error_log("Phone: " . $this->phoneNo);
            error_log("Hashed Password: " . $hashedPwd);
            error_log("Gender: " . $defaultGender);
            error_log("State: " . $defaultState);
            error_log("Address: " . $defaultAddress);
            
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":fullname", $this->fullname);
            // $stmt ->bindParam(":state", $this->state);
            // $stmt ->bindParam(":gender", $this->gender);
            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":phoneNo", $this->phoneNo);
            $stmt->bindParam(":pwd", $hashedPwd);
            $stmt->bindParam(":gender", $defaultGender);
            $stmt->bindParam(":state", $defaultState);
            $stmt->bindParam(":address", $defaultAddress);
            
            $result = $stmt->execute();
            
            if ($result) {
                error_log("User inserted successfully");
                return true;
            } else {
                error_log("Failed to insert user. Error info: " . print_r($stmt->errorInfo(), true));
                $this->errors[] = "Failed to create account. Please try again.";
                return false;
            }
        } catch (PDOException $e) {
            error_log("Database error in insertUser: " . $e->getMessage());
            error_log("SQL State: " . $e->getCode());
            error_log("Error Info: " . print_r($stmt->errorInfo(), true));
            error_log("Stack Trace: " . $e->getTraceAsString());
            $this->errors[] = "An error occurred during registration. Please try again.";
            return false;
        }
    }
    
    public function getUserDetails() {
        try {
            $query = "SELECT * FROM users WHERE username = :username OR email = :email OR phoneNo = :phoneNo;";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":phoneNo", $this->phoneNo);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database error in getUserDetails: " . $e->getMessage());
            $this->errors[] = "An error occurred. Please try again.";
            return false;
        }
    }
    
    protected function notValidPwd() {
        if (!(preg_match('/[a-zA-Z]/', $this->pwd) && preg_match('/[0-9]/', $this->pwd))) {
            $this->errors[] = "Password must contain both letters and numbers";
        }
    }
    
    protected function newPwd_is_more_than6() {
        if (strlen($this->pwd) < 6) {
            $this->errors[] = "Password must have at least six characters";
        }
    }
    
    public function detailsAlreadyExist() {
        $results = $this->getUserDetails();
        if ($results) {
            if (!empty($results['username']) && $results['username'] == $this->username) {
                $this->errors[] = "Username already exists";
            }
            if (!empty($results['email']) && $results['email'] == $this->email) {
                $this->errors[] = "Email already exists";
            }
            if (!empty($results['phoneNo']) && $results['phoneNo'] == $this->phoneNo) {
                $this->errors[] = "Phone Number already exists";
            }
        }
    }
    
    private function fullnameIsMoreThan50() {
        if (strlen($this->fullname) > 50) {
            $this->errors[] = "Full name cannot be more than 50 characters";
        }
    }
    
    private function notValidFullname() {
        if (!(preg_match("/^[a-zA-Z\s]+$/", $this->fullname))) {
            $this->errors[] = "Full name must not have special characters or numbers";
        }
    }
    
    protected function inputFieldEmpty() {
        if (empty($this->fullname) || empty($this->username) || empty($this->phoneNo) || empty($this->pwd) || empty($this->email) || empty($this->confirmpwd)) {
            $this->errors[] = "All fields must be filled";
        }
    }
    
    protected function EmailNotValid() {
        if (!(filter_var($this->email, FILTER_VALIDATE_EMAIL))) {
            $this->errors[] = "Enter a valid email address";
        }
    }
    
    private function phonenoNotInterger() {
        if (!(preg_match('/^[0-9]{11}$/', $this->phoneNo))) {
            $this->errors[] = "Invalid phone number";
        }
    }
    
    protected function pwdNotThesame() {
        if ($this->confirmpwd != $this->pwd) {
            $this->errors[] = "Passwords do not match";
        }
    }
    
    public function getErrors() {
        return $this->errors;
    }
    
    public function register() {
        $this->inputFieldEmpty();
        $this->detailsAlreadyExist();
        $this->fullnameIsMoreThan50();
        $this->notValidFullname();
        $this->EmailNotValid();
        $this->phonenoNotInterger();
        $this->pwdNotThesame();
        $this->notValidPwd();
        $this->newPwd_is_more_than6();
        
        if (!empty($this->errors)) {
            $_SESSION['errors'] = $this->errors;
            header("Location: ../register.php");
            exit();
        }
        
        try {
            if ($this->insertUser()) {
                $_SESSION['success'] = ["Registration successful! You can now login."];
                header("Location: ../login.php");
                exit();
            } else {
                $_SESSION['errors'] = $this->errors;
                header("Location: ../register.php");
                exit();
            }
        } catch (Exception $e) {
            error_log("Registration error: " . $e->getMessage());
            $_SESSION['errors'] = ["An unexpected error occurred. Please try again."];
            header("Location: ../register.php");
            exit();
        }
    }
}
