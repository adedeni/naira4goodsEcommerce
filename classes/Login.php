<?php
session_start();
require_once 'Dbh.php';

// Temporary debug code - REMOVE AFTER TESTING
error_reporting(E_ALL);
ini_set('display_errors', 1);
error_log("=== New Login Attempt ===");
error_log("POST data: " . print_r($_POST, true));

class Login extends Dbh{
    private $username;
    private $pwd;
    private $errors = array();
    private $userDetails = null;

    public function __construct($username, $pwd)
    {
        $this->username = $username;
        $this->pwd = $pwd;  
    }

    private function getLoginDetails(){
        try {
            error_log("\n=== Login Attempt Debug ===");
            error_log("Attempting login for username: " . $this->username);
            
            // Test database connection first
            try {
                $pdo = $this->connect();
                $pdo->query("SELECT 1");
                error_log("Database connection successful");
                
                // Debug: Check if users table exists and its content
                $tables = $pdo->query("SHOW TABLES LIKE 'users'")->fetchAll();
                error_log("Tables check: " . print_r($tables, true));
                
                // Debug: Check column names in users table
                $columns = $pdo->query("SHOW COLUMNS FROM users")->fetchAll(PDO::FETCH_COLUMN);
                error_log("Table columns: " . print_r($columns, true));
                
                // Debug: Check total users and a sample of data
                $totalUsers = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
                error_log("Total users in database: " . $totalUsers);
                
                // Debug: Show all usernames (for debugging only, remove in production)
                $allUsers = $pdo->query("SELECT username, email, phoneNo FROM users")->fetchAll();
                error_log("All users: " . print_r($allUsers, true));
                
            } catch (PDOException $e) {
                error_log("Database connection or query failed: " . $e->getMessage());
                throw $e;
            }
            
            $query = "SELECT * FROM users WHERE username = :username OR email = :email OR phoneNo = :phone;";
            $stmt = $pdo->prepare($query);
            
            // Bind each parameter separately
            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":email", $this->username);    // Using same value for all three
            $stmt->bindParam(":phone", $this->username);    // Using same value for all three
            
            // Log the actual values being used
            error_log("Query parameters:");
            error_log("username/email/phone: " . $this->username);
            
            try {
                $stmt->execute();
                error_log("Query executed successfully");
                
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($result) {
                    error_log("User found in database");
                    error_log("Found user data (excluding password): " . 
                        print_r(array_diff_key($result, ['pwd' => '']), true));
                } else {
                    error_log("No user found in database matching: '" . $this->username . "'");
                    
                    // Debug: Try a direct query to see if case sensitivity is the issue
                    $directQuery = $pdo->query("SELECT * FROM users WHERE LOWER(username) = LOWER('" . 
                        $pdo->quote($this->username) . "')");
                    $directResult = $directQuery ? $directQuery->fetch(PDO::FETCH_ASSOC) : null;
                    
                    if ($directResult) {
                        error_log("Found user with case-insensitive search!");
                    }
                }
                
                return $result;
                
            } catch (PDOException $e) {
                error_log("Query execution failed: " . $e->getMessage());
                error_log("SQL State: " . $e->getCode());
                throw $e;
            }
            
        } catch (PDOException $e) {
            error_log("Database error in getLoginDetails:");
            error_log("Error message: " . $e->getMessage());
            error_log("Error code: " . $e->getCode());
            error_log("Stack trace: " . $e->getTraceAsString());
            $this->errors[] = "An error occurred. Please try again.";
            return false;
        }
    }

    private function invalidPwd(){
        if(!$this->userDetails){
            return true;
        }
        
        $isValid = password_verify($this->pwd, $this->userDetails['pwd']);
        error_log("Password verification result: " . ($isValid ? "valid" : "invalid"));
        
        if(!$isValid){
            $this->errors[] = "Invalid password";
            return true;
        }
        return false;
    }

    public function userNotExist(){
        $this->userDetails = $this->getLoginDetails();
        if(!$this->userDetails){
            $this->errors[] = "Invalid username/email/phoneNo";
            return true;
        }
        return false;
    }

    protected function InputfieldEmpty(){
        if(empty($this->username) || empty($this->pwd)){
            $this->errors[] = "All fields are required";
            return true;
        }
        return false;
    }

    public function loginUser(){
        try {
            error_log("Starting login process for username: " . $this->username);
            
            if($this->InputfieldEmpty()) {
                error_log("Empty input fields detected");
                $_SESSION['errors'] = $this->errors;
                header("Location: ../login.php");
                exit();
            }
            
            if($this->userNotExist()) {
                error_log("User does not exist: " . $this->username);
                $_SESSION['errors'] = $this->errors;
                header("Location: ../login.php");
                exit();
            }
            
            if($this->invalidPwd()) {
                error_log("Invalid password for user: " . $this->username);
                $_SESSION['errors'] = $this->errors;
                header("Location: ../login.php");
                exit();
            }
            
            error_log("Login successful for user: " . $this->username);
            $_SESSION['userDetails'] = $this->userDetails;
            header("Location: ../userDashboard.php");
            exit();
            
        } catch (Exception $e) {
            error_log("Unexpected error during login: " . $e->getMessage());
            error_log("Stack trace: " . $e->getTraceAsString());
            $_SESSION['errors'] = ["An error occurred. Please try again."];
            header("Location: ../login.php");
            exit();
        }
    }
}
