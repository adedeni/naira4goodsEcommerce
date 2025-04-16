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
    <title>Naira4Goods | Register</title>
    <link rel="stylesheet" href="register.css?v=5.0">
</head>
<body>
    <div class="container">
        <div class="slider-div">
        </div>
        <div class="register-form-div">
            <div class="div-form">
                <form action="engines/registerhandler.php" method="post">
                    <h2>Register here <span><img src="brand_logo.png"alt="Naira4Goods"></span></h2>
                    <?php
                    echo displayErrors();
                    ?> 
                    <label for="fullname">Full name</label>
                    <center>
                    <div class="div-input">
                        <span class="icon material-symbols-outlined">person</span>
                        <input type="text" name="fullname" placeholder="e.g Popoola Tolu Tife"></div>
                    </center>
                        <label for="username">Username</label>
                        <center>
                        <div class="div-input">
                        <span class="icon material-symbols-outlined">person</span>
                        <input type="text" name="username" placeholder="e.g octave50">
                    </div>
                        </center>
                    <label for="tel">Phone Number</label>
                    <center>
                    <div class="div-input">
                        <span class="icon material-symbols-outlined">call</span>
                        <input type="number" name="phoneNo" placeholder="e.g 08063676340">
                    </div>
                    </center>
                    <label for="pwd">Email</label>
                    <center>
                    <div class="div-input">
                        <span class="icon material-symbols-outlined">lock</span>
                        <input type="email" name="email" placeholder="Input your Password">
                    </div>
                    </center>
                    <label for="pwd">Password</label>
                    <center>
                    <div class="div-input">
                        <span class="icon material-symbols-outlined">lock</span>
                        <input type="password" name="pwd" placeholder="Input your Password">
                    </div>
                    </center>
                    
                    <label for="confirm_pwd">Confirm Password</label>
                    <center>
                    <div class="div-input">
                        <span class="icon material-symbols-outlined">lock</span>
                        <input type="password" name="confirmpwd" placeholder="Confirm your Password">
                    </div>
                    </center>
                        <center>
                            <button type ="submit" class="div-login-btn">
                                Sign up
                            </button>
                        </center>
                        <br>
                        <center>
                        <a href="login.php">Already have an account? Login</a>
                        </center>
                </form> 
            </div>
        </div>
    </div>
</body>
</html>