<?php
$userDetails = $_SESSION['userDetails'];

$username = $userDetails['username'];
$fullname = $userDetails['fullname'];
$email = $userDetails['email'];
$gender = $userDetails['gender'];
$state = $userDetails['state'];
$phoneNo = $userDetails['phoneNo'];
$address = $userDetails['address'];
function displayErrors() {
    $output = '';
    if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
        $output .= '<div style="color:red;padding-left:20px">';
        foreach ($_SESSION['errors'] as $error) {
            $output .= '<li>' . htmlspecialchars($error) . '</li>';
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
            $output .= '<li>' . htmlspecialchars($success) . '</li>';
        }
        $output .= '</div>';
        unset($_SESSION['success']);
    }
    return $output;
}
?>
<main>
<link rel="stylesheet" href="editprofileform.css?v=5.0">
    <div class="side_menu_container">
        <div class="side_menu_profile">           
                <nav>
                    <ul>
                        <li><a href="dashboard.php"><span class="fas fa-home"></span>Dashboard</a></li>
                        <li><a href="myprofile.php"><span class="fas fa-user"></span>My profile</a></li>
                        <li><a href="#"><span class="fas fa-wallet"></span>My Wallet</a></li>
                        <li><a href="#"><span class="fas fa-user"></span>My Account</a></li><br>
                        <form action="engines/logouthandler.php" method="$_GET">
                        <li><span class="fas fa-sign-out-alt"></span><button style="border:none;background:none; font-size:15px; color:#848f93">Logout</button></li>
                        </form>

                    </ul>
                </nav>
        </div>
    </div>
    <div class="content_container">      
            <div class="wrapper">
                <div class="gallery_with_account_details">
                    <div class="user_account_details">
                        <p><b>Unique Account Number</b></p><br>
                        <p>To buy goods, you can deposit or transfer into your unigue Naira4Goods account number below.  You can pay any amount, at any time, using any means (Website, Mobile App, USSD, ATM, POS e.t.c) to the unique MobileNig account number to credit your wallet instantly.</p><br>
                        <p><b>Account Name:</b> Mayorsky/Naira4goods</p><hr>
                        <p><b>Account Number:</b> 7489843959</p><hr>
                        <p><b>Bank Name:</b> Wema bank</p><hr>
                        <p><b>Full Name: </b><?php echo htmlspecialchars (strtoupper($fullname))?></p><hr>
                        <p><b>Email Address : </b><?php echo htmlspecialchars (($email))?></p><hr>
                        <p><b>Gender : </b><?php echo htmlspecialchars (($gender));
                        //print_r($userDetails);
                        ?></p><hr>
                        <p><b>State : </b><?php echo htmlspecialchars (strtoupper($state))?></p><hr>
                        <p><b>phone Number : </b><?php echo htmlspecialchars (($phoneNo))?></p><hr>
                        <p><b>Residential Address : </b><?php echo htmlspecialchars (($address))?></p><hr>
                       </div> 
                   <div class="Add_to_cart_gallery"><br>
                            <div id="editprofileform">
                            <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit and Update your details here</h1><br>
                            <?php echo displayErrors()?>
                            <?php echo displaySuccess()?>
                            <form action="engines/myprofilehandler.php" method="POST">
                                <div class="div-form">
                                    <label for="name">Full Name</label>
                                     <br>
                                 <div class="div-input">
                                <span class="icon material-symbols-outlined">person</span>
                                <input type="text" name="fullname" value="<?php echo htmlspecialchars (strtoupper($fullname))?>"></div>
                                <br>
                <label for="username">Username</label>
                <br>
                <div class="div-input">
                    <span class="icon material-symbols-outlined">person</span>
                    <input type="text" name="username" value="<?php echo htmlspecialchars (($username))?>" placeholder="Enter New Username" readonly></div>
                <br>
                <label for="email">Email Address</label>
                <br>
                <div class="div-input">
                    <span class="icon material-symbols-outlined">email</span>
                    <input type="email" name="email"value="<?php echo htmlspecialchars (($email))?>" placeholder="Enter a new valid email address ">
                </div>
                <br>
                <label for="phoneNo">Phone Number</label>
                <br>
                <div class="div-input">
                    <span class="icon material-symbols-outlined">call</span>
                    <input type="number" maxlength="11" name="phoneNo" value="<?php echo htmlspecialchars (($phoneNo))?>"placeholder="Enter your phone number"></div>
                <br>
                <label for="email">Residential Address</label>
                <br>
                <div class="div-input">
                    <span class="icon material-symbols-outlined">email</span>
                    <input type="text" name="address" placeholder="2,akinwumi street ashi Ibadan" value="<?php echo htmlspecialchars (($address))?>">
                </div>
                <br>
                <label for="pwd">Your Password</label>
                <br>
                <div class="div-input">
                    <span class="icon material-symbols-outlined">lock</span>
                    <input type="password" name="currentpwd" placeholder="Input Your Password">
                </div><br>
                <!-- <label for="pwd">New Password</label>
                <br>
                <div class="div-input">
                    <span class="icon material-symbols-outlined">lock</span>
                    <input type="password" name="newpwd" placeholder="Enter New Password">
                </div><br> -->
                <!-- <label for="pwd">Verify New Password</label>
                <br>
                <div class="div-input">
                    <span class="icon material-symbols-outlined">lock</span>
                    <input type="password" name="confirmpwd" placeholder="Confirm New Password">
                </div><br><br> -->
                <center><button type="submit" class="signup">Update & Save</button></center>
    </form>
                </div>
                   </div>
                </div>
            </div>
    </div>
   </main>