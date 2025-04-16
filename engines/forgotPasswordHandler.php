<?php
if ($_SERVER['REQUEST_METHOD']=== "POST"){
    $email = $_POST['email'];
    require_once '../classes/Dbh.php';
    require_once '../classes/Register.php';
    require_once '../classes/ForgetPassword.php';
    $forgotPassword = new ForgotPassword($email);
    //$forgotPassword->emailNotExist();
    $forgotPassword -> submitEmail(); 
}
else{
    header("Location:../forgotPassword.php");
   die();
}