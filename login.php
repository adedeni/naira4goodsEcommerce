<?php
session_start();
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
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce|Login</title>
    <link rel="stylesheet" href="login.css?v=12">
</head>
<body>
    <div class="container">
        <div class="welcome_msg">
            <center> <img src="brand_logo.png" alt="Naira4Goods">  </center>
            <h1>Welcome back</h1>
            <p> It's wonderful to have you here again at Naira4Goods</p>
            <p> We're committed to making your shopping experience seamless and delightful</p>
            <h2>Happy shopping!</h2>
           <center> <img class="welcome_back_img"src="welcome_back_image.png" alt="Welcome back"></center>
        </div><!--welcome_msg ends-->
        <div class="login_div">
                <div class="div-form">
                    <form action="engines/loginhandler.php" method="post">
                        <h2>Login</h2>
                       <?php
                        echo displayErrors();
                      ?> 
                        <label for="username">Username</label>
                        <div class="div-input">
                            <span class="icon material-symbols-outlined">person</span>
                            <input type="text" name="username" placeholder="Enter your Username" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'] ;}?>">
                            </div>
                            <br>
                        <label for="pwd">Password</label>
                        <br>
                        <div class="div-input">
                            <span class="icon material-symbols-outlined">lock</span>
                            <input type="password" name="pwd" placeholder="Input your Password" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>">
                            </div>
                        <br>
                            <input class="ui check checkbox" type="checkbox" name="remember-me" <?php if(isset($_COOKIE['username'])){echo 'checked';}?>><label for="remember-me" class="label-rem">Remember me</label>
                            <center>
                                <button type="submit" class="div-login-btn">
                                    <h5>Sign in</h5>
                                </button>
                            </center>
                            <br><br>
                       <a href="forgotPassword.php" class="forgot-pwd">Forgot password? Recover</a>
                       <br>
                       <a href="register.php">
                        Don't have an account? Register</a>
                    </form> 
                </div>
        </div> <!--login_div ends here-->
    </div>
</body>
</html>