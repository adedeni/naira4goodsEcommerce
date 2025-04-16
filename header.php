<?php 
$userDetails = $_SESSION['userDetails'];
$username = $userDetails['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naira4Goods | Dashboard</title>
    <link rel="stylesheet" href="dashboard.css?v=1.0">
</head>
<body>
    <header class="brand_logo_welcome_header">
        <div class="brand_logo">
            <div class="logo">
                <center> <img src="brand_logo.png" alt=""></center>
                <center>
                    <p>Wallet: <span id="wallet_balance"><b>₦1,000,000</b></span> </p>
                </center>
            </div>
        </div>
        <div class="welcome_back_msg">
           <h2>Welcome Back, &nbsp;<span><?php echo htmlspecialchars (strtoupper($username))?></span></h2>
           <p>At Naira4Goods, Elevate your wardrobe without breaking the bank</p>
        </div>
    </header>
</body>