<?php
session_start();
if(!isset($_SESSION['userEmail'])){
header("Location: register.php");
die();
}
function displayErrors() {
    $output = '';
    if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
        $output .= ' <center><div style="color:red;padding-left:20px">';
        foreach ($_SESSION['errors'] as $error) {
            $error = trim($error);           
            if ($error === "OTP has expired!") {
                $formButton2RegenerateOtp = '
                <form action="engines/regenerateOtpHandler.php" method="POST">
                    <center><button type="submit" class="sign_in">Regenerate OTP</button></center>
                </form>';
                $output .= '<li>' . htmlspecialchars($error) . '<br/>' .'</br>'. $formButton2RegenerateOtp . '</li>';
            } else {
                $output .= '<li>' . htmlspecialchars($error) . '</li>';
            }
        }
        $output .= '</div></center>';
        unset($_SESSION['errors']);
    }
    return $output;
}
function displaySuccess(){
    $output ='';
    if (isset($_SESSION['success']) && !empty($_SESSION['success'])){
            $output.='<div style="color:#06D001">';
            $output.='<li>'.htmlspecialchars($_SESSION['success']).'</li>'.'</div>';
    }
        unset($_SESSION['success']);
        return $output;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Confirmation | Naira4goods</title>
    <link rel="stylesheet" href="enterOtp.css?v=2.0">
</head>
<body>
    <div class="div-form">
        <center><img src="brand_logo.png" alt="Naira4coin"></center>
        <?php
        echo (displayErrors());
        echo (displaySuccess());
        ?>
        <form action="engines/enterOtpHandler.php" method="POST">
            <h2>OTP Confirmation</h2>
            <p>Kindly enter the OTP sent to your Email Address to change your password</p>
            
            <div class="div-input">
                <span class="icon material-symbols-outlined">person</span>
                <input type="number" name="otp" placeholder="Enter your OTP" required></div>
            <br>
            <button type="submit" class="signin" name="submit">Submit</button>
                <br><br><br><br>
                <p class="hr"></p>
                <br> <br>
                <center><p><a href="login.php">
                Login to your account?</a></p></center>
                <!-- <center><button class="signup"><a href="login.php">Login</a></button></center> -->
                <center>
           <div>   
           <a href="login.php">Login</a>
             </div>
           </center>
            <!-- <center><button type="submit" class="signup">Sign up</button></center>  -->
        </form>
        <!--<center>-->
           <!--<div class="sign_up">-->
           <!--         <a href="register.php">Sign up</a>-->
           <!--  </div>-->
        <!--   </center>-->
    </div>
    <div class="div-footer">
        <center><p>TECHSOL | Designed by TECHSOL Team</p></center>
    </div>
   
</body>
</html>