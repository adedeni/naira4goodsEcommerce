<?php
session_start();
if(!isset($_SESSION['userDetails'])){
    header("Location: login.php");
    die();
}
else{
    $userDetails = $_SESSION['userDetails'];
    if($userDetails){
            $username = $userDetails['username'];
            $fullname = $userDetails['fullname'];
            $email = $userDetails['email'];
            $gender = $userDetails['gender'];
            $phoneNo = $userDetails['phoneNo'];
            $state = $userDetails['state'];
            $address = $userDetails['address'];
    }
}
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naira4Goods | Dashboard</title>
    <link rel="stylesheet" href="userDashboard.css?v=7.0">
      <!--<link rel="stylesheet" href="index.css?v=9.0">-->
    <script src="awuf_timer.js?v=4.0"></script>
    <link rel="stylesheet" href="quickview.css?v=7.0">
    <script src="quickview.js?v=3.0"></script>
</head>
<body>
    <header>
        <div class="logo-banner">
            <img src="brand_logo.png" alt="NAIRA4GOODS">
            <h1>NAIRA4GOODS</h1>
                <select name="Allproduct">
                    <option value="">All</option>
                    <option value="Bags">Bags</option>
                    <option value="shoes">Shoes</option>
                    <option value="Shirts">Shirts</option>
                </select>
            <div class="search">
                <input type="search" placeholder="Search..." >
                <span class="icon material-symbols-outlined">search</span>
            </div>
            
            <div class="right-menus">
                <a href="#" class="cart-menu">
                    <span class="icon material-symbols-outlined">shopping_cart</span>
                    <h2>Cart</h2>
                    <span class="cart-notification"><h3>20</h3></span>
                </a>
               <!--<i class="login_tooltips">Login</i>--> 
                <a href="#"><span class="icon material-symbols-outlined">favorite</span><h2>Wishlist</h2></a>
                <div class="account-dropdown">
                    <a href="#" class="account-toggle"><span class="icon material-symbols-outlined">person</span><h2>Account</h2></a>
                    <div class="dropdown-content">
                        <a href="#" id="myProfileLink"><h3>My Profile</h3></a>
                        <a href="engines/logouthandler.php"><h3>Logout</h3></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-bar">
            <nav>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                
                        <li class="shop_dropdown">
                            <a href="shop.php">SHOP</a>
                            <div class="dropdown-content">
                                <a href="#">Cloths</a>
                                <a href="#">Accessories</a>
                                <a href="#">Bags</a>
                                <a href="#">Shoes</a>
                            </div>
                        </li>
                        
            
                    <li><a href="delivery.php">DELIVERY</a></li>
                    <li><a href="legal_notice.php">LEGAL NOTICE</a></li>
                    <li><a href="#">BLOG</a></li>
                    <li><a href="about_me.php">ABOUT US</a></li>
                </ul>
            </nav>
        </div>
        <div class="last-nav-bar">
            <span class="icon material-symbols-outlined">star</span>
            <p><b>Free Delivery </b> World Wide*<a href="#">Learn more</a> 
                <span class="icon material-symbols-outlined">favorite</span>Loved by our Customers. <b>5000</b>+ Reviews
                <span class="icon material-symbols-outlined">done</span>
                    <b>Free Returns</b> and <b>Free Shipping</b>
                    </p>
        </div>
    </header>
   <main>
    <div class="product_slider">
        <center> <h1>BUY SNEAKERS, SHOES & SHIRTS @ <br>AFFORDABLE PRICE</h1>
            <p>Enjoy 100% quality goods,fast and free delivery</p>
        </center>
       
        <!-- <center>
            <ul>
                <li><a href="register.php">Register</a>
                </li>
                <li>
                    <a href="login.php">Login</a>
                </li>
            </ul>
        </center> -->
        
        
    </div>
    <div class="cheap_sales">
        <div class="col_awuf_sales" id="col_awuf_sales">
            <center>
                <p><i>Don't Miss</i></p>
            <h1>AWUF SALE ENDS SOON</h1>
            </center>
                <div class="div_time" id="div_time">
               <center>
                <h1 id="hours">24</h1>
                <h6>HOURS</h6>
                </center> 
            </div>
            <div class="div_time">
                <center>
                    <h1 id="mins">00</h1>
                    <h6>MIN</h6>
                    </center> 
            </div>
            <div class="div_time">
                <center>
                    <h1 id="secs">00</h1>
                    <h6>SEC</h6>
                    </center> 
            </div>
                
                   
            <center>
                <div class="btn_browse">
                    <center> <h1>BROWSE NOW</h1></center>
                </div>
            </center>
           
            
        </div>
        <div class="col_black_friday_sales">
            <center><h1>BLACK FRIDAY <br>SALE</h1></center>
            <center>
                <div class="btn_browse">
                    <center> <h1>BROWSE NOW</h1></center>
                </div>
            </center>
        </div>
    </div>
   </main>
   <section class ="container">

<div class="gallery_product_caption">
    <h1>OUR SHIRTS GALLERY <span><a href="#">Browser All <span class="forward_arrow">></span></a></span></h1>
   </div>
      <?php
//include_once 'classes/Dbh.php';
require_once 'classes/Products.php';
$productObj = new Products();
// if (isset($_GET['product_id'])) {
//     $productID = $_GET['product_id'];
//     $quickView = $productObj->quickView($productID);
//    print_r($quickView);
// }
 $shirts = $productObj->getProductDetails('shirts',10,0);
  $natives = $productObj->getProductDetails('natives',10,0);
// $quickView = $productObj->quickView($productID);
function getEachShirtProducts($shirts){
   // print_r($quickView);
   //print_r($products);
    foreach($shirts as $product){
        $productID = htmlspecialchars($product['id']);
        $productName = htmlspecialchars($product['product_name']);
        $productPrice = htmlspecialchars($product['product_price']);
        $productImage = htmlspecialchars($product['productImage_path']);
        $productDescription = htmlspecialchars($product['product_description']);
        $productQuantity = htmlspecialchars($product['product_quantity']);
        $productSize = htmlspecialchars($product['product_size']);
        $productColor =htmlspecialchars($product['product_color']);
         $productBrand = htmlspecialchars($product['product_brand']);
         echo "<div class='displayProducts'>
                <div class='product'>
                <img src='$productImage' alt='$productName'>
                <div class='circle'><a href='#'><center><span class='fas fa-heart'></span></center></a></div>
                    <center><h1><button class='quick-view-btn' 
                    data-product-id='$productID' data-table ='shirts'>QUICK VIEW</button></h1></center>   
                </div>
                <div class='product_details'>
                        <h2>$productBrand</h2>
                        <p> $productName</p> 
                        <p><b>Price:</b> ₦$productPrice </p>
                        <span class='fas fa-star'></span> 
                        <span class='fas fa-star'></span> 
                        <span class='fas fa-star'></span> 
                        <span class='fas fa-star'></span> 
                        <span class='fas fa-star'></span> 
                    </div> 
                    </div>
                    ";
    }
    
}
function getEachNativeProducts($natives){
   // print_r($quickView);
   //print_r($products);
    foreach($natives as $product){
        $productID = htmlspecialchars($product['id']);
        $productName = htmlspecialchars($product['product_name']);
        $productPrice = htmlspecialchars($product['product_price']);
        $productImage = htmlspecialchars($product['productImage_path']);
        $productDescription = htmlspecialchars($product['product_description']);
        $productQuantity = htmlspecialchars($product['product_quantity']);
        $productSize = htmlspecialchars($product['product_size']);
        $productColor =htmlspecialchars($product['product_color']);
         $productBrand = htmlspecialchars($product['product_brand']);
         echo "<div class='displayProducts'>
                <div class='product'>
                <img src='$productImage' alt='$productName'>
                <div class='circle'><a href='#'><center><span class='fas fa-heart'></span></center></a></div>
                    <center><h1><button class='quick-view-btn' 
                    data-product-id='$productID' data-table ='natives'>QUICK VIEW</button></h1></center>   
                </div>
                <div class='product_details'>
                        <h2>$productBrand</h2>
                        <p> $productName</p> 
                        <p><b>Price:</b> ₦$productPrice </p>
                        <span class='fas fa-star'></span> 
                        <span class='fas fa-star'></span> 
                        <span class='fas fa-star'></span> 
                        <span class='fas fa-star'></span> 
                        <span class='fas fa-star'></span> 
                    </div> 
                    </div>
                    ";
    }
    
}
?>
   <!-- NEW GALLERY SHIRTS HERE -->
    <div class="content">
    <div class="product_gallery">
    <div class="wrapper">
        <div class="shirts_hoods">
            <?php
             getEachShirtProducts($shirts);
            ?>
            </div>
        </div>
    </div>
    </div>
    <div class="gallery_product_caption">
    <h1>OUR NATIVES GALLERY <span><a href="#">Browser All <span class="forward_arrow">></span></a></span></h1>
   </div>
 
   <!-- NEW GALLERY NATIVES HERE -->
   <div class="content">
    <div class="product_gallery">
    <div class="wrapper">
        <div class="shirts_hoods">
            <?php
              getEachNativeProducts($natives);
            ?>
            </div>
        </div>
    </div>
    </div>
    <div id="quick-view-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span><br><hr>
            <div id="quick-view-content" class="quick-view-con">
                <div class="productPhoto">
                    <!-- <h1>product photo</h1> -->
                    <center>
                    <img src="shirts_hood_gallery/shirt_1.png" alt="Brimstone Clothing">
                    </center>
                </div>
                <div class="productDetails">
                   <h2>product details</h2> 
                </div>
            </div>
        </div>
    </div>
       <footer>
        <div class="wrapper">
            <div class="brand_logo_col">
                <img class="logo" src="brand_logo.png" alt="NAIRA4GOODS">
                <p>
                    Elevate your wardrobe without breaking the bank. Shop Naira4Goods today and experience fashion that fits your lifestyle!"
                </p>
                <div class="call_us">
                    <img src="/index_images/phone-call.svg" alt="Call Us">
                    <h1> <span>NEED HELP?</span><br> 08063676340, 08114772961</h1>
                </div>
            <p><img  class="social_handle_icons" src="index_images/facebook-f.svg" alt="instagram"> 
                <img  class="social_handle_icons" src="index_images/twitter.svg" alt="instagram">
                <img  class="social_handle_icons" src="index_images/instagram.svg" alt="instagram">
                <img  class="social_handle_icons" src="index_images/youtube.svg" alt="instagram">
                <img  class="social_handle_icons" src="index_images/whatsapp.svg" alt="instagram">
                <img  class="social_handle_icons" src="index_images/pinterest-p.svg" alt="instagram">
            </p>   
            <br> 
            <p>Copyright © NAIRA4GOODS. All Rights Reserved.</p>
            </div>
            <div class="quick_links_columns">
                <div class="quick_link_col1">
                    <h2>Information</h2>
                    <ul>
                        <li><a href="delivery.php">Delivery</a></li>
                        <li><a href="about_me.php">About Us</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="sitemap.php">Sitemap</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="index.php">Home</a></li>
                    </ul>
                </div>
                <div class="quick_link_col2">
                        <h2>Custom Links</h2>
                        <ul>
                            <li><a href="legal_notice.php">Legal Notice</a></li>
                            <li><a href="new_products.php">New Products</a></li>
                            <li><a href="best_sales.php">Best Sales</a></li>
                            <li><a href="terms_and_conditions.php">Terms and Conditions</a></li>
                            <li><a href="register.php">Register</a></li>
                            <li><a href="login.php">Login</a></li>
                        </ul>
                </div>
                <div class="quick_link_col3">
                    <h2>Newsletter</h2>
                    <p>Sign up for our e-mail to get latest news.</p>
                    <div class="subscribe">
                        <form action="#" method="post">
                            <input type="email" name="email" placeholder="Your Email Address">
                           <span> Subscribe</span>
                        </form>
                    </div>
                    <p><img src="index_images/google_apple_store.png" alt=""></p>
                </div>
            </div>
        </div>
       </footer>
    </section>
   <!--<div class="gallery_product_caption">-->
   <!-- <h1>OUR SHIRTS GALLERY<span><a href="#">Browser All <span class="forward_arrow">></span></a></span></h1>-->
   <!--</div>-->
   <!--<div class="product_gallery">-->
    <!--<div class="wrapper">-->
    <!--    <div class="shirts_hoods">-->
    <!--            <div class="display_div_with_product_details">-->
    <!--                <div class="product1">-->
    <!--                    <div class="circle"><a href="#"><center><span class="fas fa-heart"></span></center></a></div>-->
    <!--                   <center><h1><button>QUCIK VIEW</button> </h1></center>  -->
    <!--                </div>-->
    <!--                <div class="product_details">-->
    <!--                    <h2>Brimstone Clothing</h2>-->
    <!--                    <p>Round Neck T-shirt</p> -->
    <!--                    <p><b>Price:</b> ₦6,000</p>-->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span>  -->
    <!--                </div>-->
                    
    <!--            </div>-->
    <!--            <div class="display_div_with_product_details">-->
    <!--                <div class="product2">-->
    <!--                    <div class="circle"><a href="#"><center><span class="fas fa-heart"></span></center></a></div>-->
    <!--                    <center><h1><button>QUICK VIEW</button></h1></center> -->
    <!--                </div>-->
    <!--                <div class="product_details">-->
    <!--                    <h2>Brimstone Clothing</h2>-->
    <!--                    <p>Round Neck T-shirt</p> -->
    <!--                    <p><b>Price:</b> ₦6,000</p>-->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span>  -->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="display_div_with_product_details">-->
    <!--                <div class="product3">-->
    <!--                    <div class="circle"><a href="#"><center><span class="fas fa-heart"></span></center></a></div>-->
    <!--                    <center><h1><button>QUICK VIEW</button></h1></center> -->
    <!--                </div>-->
    <!--                <div class="product_details">-->
    <!--                    <h2>Brimstone Clothing</h2>-->
    <!--                    <p>Round Neck T-shirt</p> -->
    <!--                    <p><b>Price:</b> ₦6,000</p>-->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span>  -->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="display_div_with_product_details">-->
    <!--                <div class="product4">-->
    <!--                    <div class="circle"><a href="#"><center><span class="fas fa-heart"></span></center></a></div>-->
    <!--                    <center><h1><button>QUICK VIEW</button></h1></center> -->
    <!--                </div>-->
    <!--                <div class="product_details">-->
    <!--                    <h2>Brimstone Clothing</h2>-->
    <!--                    <p>Round Neck T-shirt</p> -->
    <!--                    <p><b>Price:</b> ₦6,000</p>-->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span>  -->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="display_div_with_product_details">-->
    <!--                <div class="product5">-->
    <!--                    <div class="circle"><a href="#"><center><span class="fas fa-heart"></span></center></a></div>-->
    <!--                    <center><h1><button>QUICK VIEW</button></h1></center> -->
    <!--                </div>-->
    <!--                <div class="product_details">-->
    <!--                    <h2>Brimstone Clothing</h2>-->
    <!--                    <p>Round Neck T-shirt</p> -->
    <!--                    <p><b>Price:</b> ₦6,000</p>-->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span>  -->
    <!--                </div>-->
    <!--            </div>-->
    <!--    </div>-->
        
    <!--</div>-->
   <!-- <div class="gallery_product_caption">-->
   <!--     <h1>LASTEST ON SALE <span><a href="#">Browser All <span class="forward_arrow">></span></a></span></h1>-->
   <!--    </div>-->
    <!--   <div class="wrapper">-->
    <!--    <div class="shirts_hoods">-->
    <!--            <div class="display_div_with_product_details">-->
    <!--                <div class="product1">-->
    <!--                    <div class="circle"><a href="#"><center><span class="fas fa-heart"></span></center></a></div>-->
    <!--                    <center><h1><button>QUICK VIEW</button></h1></center> -->
    <!--                </div>-->
                   
                   
    <!--                <div class="product_details">-->
    <!--                    <h2>Brimstone Clothing</h2>-->
    <!--                    <p>Round Neck T-shirt</p> -->
    <!--                    <p><b>Price:</b> ₦6,000</p>-->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span>  -->
    <!--                </div>-->
                    
    <!--            </div>-->
    <!--            <div class="display_div_with_product_details">-->
    <!--                <div class="product2">-->
    <!--                    <div class="circle"><a href="#"><center><span class="fas fa-heart"></span></center></a></div>-->
    <!--                    <center><h1><button>QUICK VIEW</button></h1></center> -->
    <!--                </div>-->
    <!--                <div class="product_details">-->
    <!--                    <h2>Brimstone Clothing</h2>-->
    <!--                    <p>Round Neck T-shirt</p> -->
    <!--                    <p><b>Price:</b> ₦6,000</p>-->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span>  -->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="display_div_with_product_details">-->
    <!--                <div class="product3">-->
    <!--                    <div class="circle"><a href="#"><center><span class="fas fa-heart"></span></center></a></div>-->
    <!--                    <center><h1><button>QUICK VIEW</button></h1></center> -->
    <!--                </div>-->
    <!--                <div class="product_details">-->
    <!--                    <h2>Brimstone Clothing</h2>-->
    <!--                    <p>Round Neck T-shirt</p> -->
    <!--                    <p><b>Price:</b> ₦6,000</p>-->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span>  -->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="display_div_with_product_details">-->
    <!--                <div class="product4">-->
    <!--                    <div class="circle"><a href="#"><center><span class="fas fa-heart"></span></center></a></div>-->
    <!--                    <center><h1><button>QUICK VIEW</button></h1></center> -->
    <!--                </div>-->
    <!--                <div class="product_details">-->
    <!--                    <h2>Brimstone Clothing</h2>-->
    <!--                    <p>Round Neck T-shirt</p> -->
    <!--                    <p><b>Price:</b> ₦6,000</p>-->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span>  -->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="display_div_with_product_details">-->
    <!--                <div class="product5">-->
    <!--                    <div class="circle"><a href="#"><center><span class="fas fa-heart"></span></center></a></div>-->
    <!--                    <center><h1><button>QUICK VIEW</button></h1></center> -->
    <!--                </div>-->
    <!--                <div class="product_details">-->
    <!--                    <h2>Brimstone Clothing</h2>-->
    <!--                    <p>Round Neck T-shirt</p> -->
    <!--                    <p><b>Price:</b> ₦6,000</p>-->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span>  -->
    <!--                </div>-->
    <!--            </div>-->
    <!--    </div>-->
    <!--</div>-->
   <!-- <div class="gallery_product_caption">-->
   <!--     <h1>WEEKLY FEATURED PRODUCTS <span><a href="#">Browser All <span class="forward_arrow">></span></a></span></h1>-->
   <!--    </div>-->
    <!--   <div class="wrapper">-->
    <!--    <div class="shirts_hoods">-->
    <!--            <div class="display_div_with_product_details">-->
    <!--                <div class="product1">-->
    <!--                    <div class="circle"><a href="#"><center><span class="fas fa-heart"></span></center></a></div>-->
    <!--                    <center><h1><button>QUICK VIEW</button></h1></center> -->
    <!--                </div>-->
    <!--                <div class="product_details">-->
    <!--                    <h2>Brimstone Clothing</h2>-->
    <!--                    <p>Round Neck T-shirt</p> -->
    <!--                    <p><b>Price:</b> ₦6,000</p>-->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span>  -->
    <!--                </div>-->
                    
    <!--            </div>-->
    <!--            <div class="display_div_with_product_details">-->
    <!--                <div class="product2">-->
    <!--                    <div class="circle"><a href="#"><center><span class="fas fa-heart"></span></center></a></div>-->
    <!--                    <center><h1><button>QUICK VIEW</button></h1></center>  -->
    <!--                </div>-->
    <!--                <div class="product_details">-->
    <!--                    <h2>Brimstone Clothing</h2>-->
    <!--                    <p>Round Neck T-shirt</p> -->
    <!--                    <p><b>Price:</b> ₦6,000</p>-->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span>  -->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="display_div_with_product_details">-->
    <!--                <div class="product3">-->
    <!--                    <div class="circle"><a href="#"><center><span class="fas fa-heart"></span></center></a></div>-->
    <!--                    <center><h1><button>QUICK VIEW</button></h1></center> -->
    <!--                </div>-->
    <!--                <div class="product_details">-->
    <!--                    <h2>Brimstone Clothing</h2>-->
    <!--                    <p>Round Neck T-shirt</p> -->
    <!--                    <p><b>Price:</b> ₦6,000</p>-->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span>  -->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="display_div_with_product_details">-->
    <!--                <div class="product4">-->
    <!--                    <div class="circle"><a href="#"><center><span class="fas fa-heart"></span></center></a></div>-->
    <!--                    <center><h1><button>QUICK VIEW</button></h1></center> -->
    <!--                </div>-->
    <!--                <div class="product_details">-->
    <!--                    <h2>Brimstone Clothing</h2>-->
    <!--                    <p>Round Neck T-shirt</p> -->
    <!--                    <p><b>Price:</b> ₦6,000</p>-->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span>  -->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="display_div_with_product_details">-->
    <!--                <div class="product5">-->
    <!--                    <div class="circle"><a href="#"><center><span class="fas fa-heart"></span></center></a></div>-->
    <!--                    <center><h1><button>QUICK VIEW</button></h1></center> -->
    <!--                </div>-->
    <!--                <div class="product_details">-->
    <!--                    <h2>Brimstone Clothing</h2>-->
    <!--                    <p>Round Neck T-shirt</p> -->
    <!--                    <p><b>Price:</b> ₦6,000</p>-->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span> -->
    <!--                    <span class="fas fa-star"></span>  -->
    <!--                </div>-->
    <!--            </div>-->
    <!--    </div>-->
    <!--</div>-->
   <!--    </div>-->
   <!--    <footer>-->
   <!--     <div class="wrapper">-->
   <!--         <div class="brand_logo_col">-->
   <!--             <img class="logo" src="brand_logo.png" alt="NAIRA4GOODS">-->
   <!--             <p>-->
   <!--                 Elevate your wardrobe without breaking the bank. Shop Naira4Goods today and experience fashion that fits your lifestyle!"-->
   <!--             </p>-->
   <!--             <div class="call_us">-->
   <!--                 <img src="/index_images/phone-call.svg" alt="Call Us">-->
   <!--                 <h1> <span>NEED HELP?</span><br> 08063676340, 08114772961</h1>-->
   <!--             </div>-->
   <!--         <p><img  class="social_handle_icons" src="index_images/facebook-f.svg" alt="instagram"> -->
   <!--             <img  class="social_handle_icons" src="index_images/twitter.svg" alt="instagram">-->
   <!--             <img  class="social_handle_icons" src="index_images/instagram.svg" alt="instagram">-->
   <!--             <img  class="social_handle_icons" src="index_images/youtube.svg" alt="instagram">-->
   <!--             <img  class="social_handle_icons" src="index_images/whatsapp.svg" alt="instagram">-->
   <!--             <img  class="social_handle_icons" src="index_images/pinterest-p.svg" alt="instagram">-->
   <!--         </p>   -->
   <!--         <br> -->
   <!--         <p>Copyright © NAIRA4GOODS. All Rights Reserved.</p>-->
   <!--         </div>-->
   <!--         <div class="quick_links_columns">-->
   <!--             <div class="quick_link_col1">-->
   <!--                 <h2>Information</h2>-->
   <!--                 <ul>-->
   <!--                     <li><a href="delivery.php">Delivery</a></li>-->
   <!--                     <li><a href="about_me.php">About Us</a></li>-->
   <!--                     <li><a href="contact.php">Contact Us</a></li>-->
   <!--                     <li><a href="sitemap.php">Sitemap</a></li>-->
   <!--                     <li><a href="shop.php">Shop</a></li>-->
   <!--                     <li><a href="index.php">Home</a></li>-->
   <!--                 </ul>-->
   <!--             </div>-->
   <!--             <div class="quick_link_col2">-->
   <!--                     <h2>Custom Links</h2>-->
   <!--                     <ul>-->
   <!--                         <li><a href="legal_notice.php">Legal Notice</a></li>-->
   <!--                         <li><a href="new_products.php">New Products</a></li>-->
   <!--                         <li><a href="best_sales.php">Best Sales</a></li>-->
   <!--                         <li><a href="terms_and_conditions.php">Terms and Conditions</a></li>-->
   <!--                         <li><a href="register.php">Register</a></li>-->
   <!--                         <li><a href="login.php">Login</a></li>-->
   <!--                     </ul>-->
   <!--             </div>-->
   <!--             <div class="quick_link_col3">-->
   <!--                 <h2>Newsletter</h2>-->
   <!--                 <p>Sign up for our e-mail to get latest news.</p>-->
   <!--                 <div class="subscribe">-->
   <!--                     <form action="#" method="post">-->
   <!--                         <input type="email" name="email" placeholder="Your Email Address">-->
   <!--                        <span> Subscribe</span>-->
   <!--                     </form>-->
   <!--                 </div>-->
   <!--                 <p><img src="index_images/google_apple_store.png" alt=""></p>-->
   <!--             </div>-->
   <!--         </div>-->
   <!--     </div>-->
   <!--    </footer>-->
   
      
</body>
 <div id="profilePopup" class="popup">
                <div class="popup-content">
                    <div class ="myProfile">
                        <br>
               <center><h4>My Profile</h4></center>
               <br> <br>
               <p><b>Username</b>: <?php echo $username; ?></p>
               <hr>
               <p><b>Full Name</b>: <?php echo $fullname; ?></p>
               <hr>
               <p><b>Email Address</b>: <?php echo $email; ?></p>
               <hr>
               <p> <b>Gender</b>: <?php echo $gender; ?></p>
               <hr>
               <p> <b>Phone</b>: <?php echo $phoneNo; ?></p>
               <hr>
               <p> <b>State</b>: <?php echo $state; ?></p>
               <hr>
               <p> <b>Residential Address</b>: <?php echo $address; ?></p> 
               <hr>
                </div>
              <div class="editProfile">
                <span class="close"><b> &times;</b></span>
                <br><br>
             <center><h4> Update your details</h4></center><br>
              <?php echo displayErrors()?>
              <?php echo displaySuccess()?>
              <br>
                <form action="engines/myprofilehandler.php" method="POST">
                <label class="label" for="name">Full Name</label>
                <br>
                <center>
                <div class="div-input">
                                <span class="icon material-symbols-outlined">person</span>
                                <input type="text" name="fullname" value="<?php echo htmlspecialchars (strtoupper($fullname))?>">
                            </div>
                </center>
                <br>
                <label class="label" for="username">Username</label>
                <center>
                <div class="div-input">
                    <span class="icon material-symbols-outlined">person</span>
                    <input type="text" name="username" value="<?php echo htmlspecialchars (($username))?>" placeholder="Enter New Username" readonly></div>
                </center>
                <br>
                <label class="label" for="email">Email Address</label>
                <center>
                <div class="div-input">
                    <span class="icon material-symbols-outlined">email</span>
                    <input type="email" name="email"value="<?php echo htmlspecialchars (($email))?>" placeholder="Enter a new valid email address ">
                </div>
                </center>
                <br>
                <label class="label" for="phoneNo">Phone Number</label>
                <br>
                <center>
                <div class="div-input">
                    <span class="icon material-symbols-outlined">call</span>
                    <input type="number" maxlength="11" name="phoneNo" value="<?php echo htmlspecialchars (($phoneNo))?>"placeholder="Enter your phone number"></div>
                </center>
                <br>
                <label class="label" for="email">Residential Address</label>
                <center>
                <div class="div-input">
                    <span class="icon material-symbols-outlined">email</span>
                    <input type="text" name="address" placeholder="2,akinwumi street ashi Ibadan" value="<?php echo htmlspecialchars (($address))?>">
                </div>
                </center>
                <br>
                <label class="label" for="pwd">Your Password</label>
                <center>
                <div class="div-input">
                    <span class="icon material-symbols-outlined">lock</span>
                    <input type="password" name="currentpwd" placeholder="Input Your Password">
                </div>
                </center>
                <br>
                   <br>
                   <center><button type="submit" class="updateSave">Update & Save</button></center>
                </form>
              </div>
           </div>
       </div>
       <script src="profilePopup.js?v=1.0"></script>
</html>