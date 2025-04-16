<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
        $pwd=$_POST['pwd'];
        $confirmpwd = $_POST['confirmpwd'];
        require_once '../classes/Dbh.php';
        require_once '../classes/Register.php';
        require_once '../classes/RecoverPassword.php';
        $recoverPassword = new RecoverPassword($pwd, $confirmpwd);
        $recoverPassword-> updatePwd();
}
else{
    header("Location: ../recoverPassword.php");
    die();
}