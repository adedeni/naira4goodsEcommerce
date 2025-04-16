<?php
session_start();
// if (!isset($_SESSION['email'])) {
//         header("Location: register.php");
//         die();
//     }
function displayErrors() {
    $output = '';
    if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
        $output .= '<div style="color:red">';
        foreach ($_SESSION['errors'] as $error) {
            $output .= '<li>' . htmlspecialchars($error) . '</li>';
          
        }
        $output .= '</div>';
        unset($_SESSION['errors']);
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
    <title>Recover Password | Naira4goods</title>
    <link rel="stylesheet" href="forgotPassword.css?v=6.0">
</head>
<body>
    <div class="div-form">
        <center><img src="brand_logo.png" alt="Naira4coin"></center>
        <?php
        echo (displayErrors());
        ?>
        <form action="engines/forgotPasswordHandler.php" method="post">
            <h2>Recover Password</h2>
            <p>Enter your email address below and we'll send six digits OTP to email with instructions. kindly check your spam if mail is not found in your inbox.</p>
            
            <div class="div-input">
                <span class="icon material-symbols-outlined">person</span>
                <input type="email" name="email" placeholder="Input Your Registered Email"></div>
            <br>
                <button type="submit" class="signin" name="submit">Submit</button>
                <br><br><br><br>
                <p class="hr"></p>
                <br> <br>
                <center><p><a href="login.php">
                Login to your account?</a></p></center>
                <!-- <center><button class="signup"><a href="login.php">Login</a></button></center> -->
                <center>
           <div class="sign_in">   
           <a href="login.php">Login</a>
             </div>
           </center>
           
           
            <!-- <center><button type="submit" class="signup">Sign up</button></center>  -->
        </form>
        <!--<center>-->
        <!--   <div class="sign_up">-->
        <!--            <a href="register.php">Sign up</a>-->
        <!--     </div>-->
        <!--   </center>-->
    </div>
    <div class="div-footer">
        <center><p>TECHSOL | Designed by TECHSOL Team</p></center>
    </div>
   
</body>
</html>