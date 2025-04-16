<?php   
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $fullname = htmlspecialchars($_POST['fullname']);
                    $username = htmlspecialchars($_POST['username']);
                    $email = htmlspecialchars($_POST['email']);
                    $phoneNo = htmlspecialchars($_POST['phoneNo']);
                    $pwd = htmlspecialchars($_POST['pwd']);
                    // $state = ($_POST['state']);
                    // $gender = $_POST['gender'];
                    $confirmpwd = $_POST['confirmpwd']; 
                        require_once '../classes/Dbh.php';
                        require_once '../classes/Register.php';  
                        $register = new Register($fullname, $username,$email,$phoneNo, $pwd, $confirmpwd);  
                        $register->register();        
            }
            else{
                header("Location: ../register.php");
                die();
            }
        
        
       
?>