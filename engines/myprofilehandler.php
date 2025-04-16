<?php
session_start();
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $fullname = htmlspecialchars($_POST['fullname']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $phoneNo = htmlspecialchars($_POST['phoneNo']);
    $address = htmlspecialchars($_POST['address']);
    $currentpwd = htmlspecialchars($_POST['currentpwd']);
    // $newpwd = htmlspecialchars($_POST['newpwd']);
    // $confirmpwd = htmlspecialchars($_POST['confirmpwd']);
    require_once '../classes/Dbh.php';
    require_once '../classes/EditProfile.php';
    $editProfile = new EditProfile($fullname,$username, $email, $phoneNo,  $address,  $currentpwd);
    $editProfile->submitEditedForm();
    // if (!empty($_SESSION['errors'])){
    //     header("Location: ../userDashboard.php?modalStatus=open");
    //     exit();
    // }
    // else if (!empty($_SESSION['success'])){
    //     header("Location: ../userDashboard.php?modalStatus=open");
    //     exit();
    // }

}
else{
    header("Location: ../userDashboard.php");
    exit();
}
?>