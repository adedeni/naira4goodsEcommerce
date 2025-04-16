<?php
session_start();
if(!isset($_SESSION['otp'])){
header("Location: register.php");
die();
}
function displayErrors() {
    $output = '';
    if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
        $output .= '<div style="color:red;padding-left:20px">';
        foreach ($_SESSION['errors'] as $error) {
             $output .= '<li>' . htmlspecialchars($error) .'</li>';     
        }
        $output .= '</div>';
        unset($_SESSION['errors']);
    }
    return $output;
}
function displaySuccess(){
    $output = '';
    if (isset($_SESSION['success']) && !empty($_SESSION['success'])) {
        $output .= '<div style="color:#06D001;padding-left:20px">';
        foreach ($_SESSION['success'] as $success) {
            $linkToLogin ='<a <div style="color:#06D001" href="login.php">Login here</a>';
            $output .= '<li>' . htmlspecialchars($success) . '<br/>'.'<strong>'. $linkToLogin.'</strong>' .'</br>'.
            '</li>'.'<br/>';
        }
        $output .= '</div>';
        unset($_SESSION['success']);
    }
    return $output;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recover Password | naira4goods</title>
    <link rel="stylesheet" href="enterOtp.css?v=8.0">
</head>
<body>
    <div class="div-form">
        <center><img src="brand_logo.png" alt="Naira4coin"></center>
        <form action="engines/recoverPassowordHandler.php" method="post">
            <h2>Set New Password Here</h2>
            <?php 
            echo displayErrors();
            echo displaySuccess();
            ?>
            <label for="pwd">New Password</label>
            <br>
            <div class="div-input">
                <span class="icon material-symbols-outlined">person</span>
                <input type="password" name="pwd" placeholder="Input your New Password"></div>
            <br>
            <label for="confirmpwd">Confirm New Password</label>
            <br>
            <div class="div-input">
                <span class="icon material-symbols-outlined">lock</span>
                <input type="password" name="confirmpwd" placeholder="Input the New Password">
            </div>
            <br><br>
                <div class="div-sign-remember">
               
                <button type="submit" class="changepassword">Change Password</button>
                    </div>
           <p class="hr"></p>
           <center><p><a href="login.php">
            Login to your account?</a></p></center>
            <!-- <center><button type="submit" class="signup">Sign up</button></center>  -->
        </form>
        <center>
           <div class="sign_up">
                    <a href="login.php">Login</a>
             </div>
           </center>
    </div>
    <div class="div-footer">
        <center><p>TECHSOL | Designed by TECHSOL Team</p></center>
    </div>
   
</body>
</html>