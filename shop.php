<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page</title>
    <link rel="stylesheet" href="shop.css"> <!-- Link to external stylesheet -->
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
                <a href="login.php"><span class="icon material-symbols-outlined">login</span></a>
                <a href="register.php"><span class="icon material-symbols-outlined">How_To_Reg</span></a>
                <a href=""><span class="icon material-symbols-outlined">chat</span></a>
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
                    <li><a href="blog.php">BLOG</a></li>
                    <li><a href="#">ABOUT US</a></li>
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


    <div class="shop-hall">

        <div class="fashion">
            <center><h1>FASHION</h1></center>
        </div>
    
        <!-- Men's Shop-women shop-->
        <div class="content">
            <div class="shop">
                <div class="shop-men">
                    <div class="shop-box-inner">
                        <h3><a href="#"></a>SHOP <br> MEN</h3>
                    </div>
                </div>
                <div class="shop-women">
                    <div class="shop-box-inner">
                        <h3><a href="#"></a>SHOP <br> WOMEN</h3>
                    </div>
                </div>
            </div>

            <div class="shop-container">
                <div class="top">
                    <h2>Top Fashion pick</h2>
                </div>
                
                <div class="product-grid">
                    <!-- Product 1 -->
                    <div class="product">
                        <div class="product-image">
                            <img src="sneakers/sneakers 2.jpg" alt="Product 1">
                        </div>
                        <div class="product-details">
                            <h3>Product 1</h3>
                            <p class="price">$20</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <button class="add-to-cart">Add to Cart</button>
                            <div class="ratings">
                                <span class="rating">&#9733;</span>
                                <span class="rating">&#9733;</span>
                                <span class="rating">&#9733;</span>
                                <span class="rating">&#9733;</span>
                                <span class="rating">&#9733;</span>
                            </div>
                        </div>
                    </div>
                    
                    
                    <!-- Product 2 -->
                    <div class="product">
                        <img src="sneakers/mini short gown.jpg" alt="Product 1">
                        <h3>Product 1</h3>
                        <p class="price">$20</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="add-to-cart">Add to Cart</button>
                        <div class="ratings">
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                        </div>
                    </div>
        
                    <!-- Product 3 -->
                    <div class="product">
                        <img src="sneakers/female-top3.jpg" alt="Product 1">
                        <h3>Product 1</h3>
                        <p class="price">$20</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="add-to-cart">Add to Cart</button>
                        <div class="ratings">
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                        </div>
                    </div>
                    
                    <!-- Product 4 -->
                    <div class="product">
                        <img src="sneakers/gown 2.jpg" alt="Product 1">
                        <h3>Product 1</h3>
                        <p class="price">$20</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="add-to-cart">Add to Cart</button>
                        <div class="ratings">
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                        </div>
                    </div>
        
                    <!-- Product 5 -->
                    <div class="product">
                        <img src="sneakers/lacoste.jpg" alt="Product 1">
                        <h3>Product 1</h3>
                        <p class="price">$20</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="add-to-cart">Add to Cart</button>
                        <div class="ratings">
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                        </div>
                    </div>
                </div>
                
                <!-- Lower Row -->
        <div class="shop-2">
            <div class="shop-kids">
                <div class="shop-box-inner">
                    <h3><a href="#"></a>SHOP <br> KIDS</h3>
                </div>
            </div>
        </div>

        <div class="top">
            <h2>Male sizes</h2>
        </div>
        <div class="container2">
            <div class="box">XXS</div>
            <div class="box">XS</div>
            <div class="box">S</div>
            <div class="box">M</div>
            <div class="box">L</div>
            <div class="box">XL</div>
            <div class="box">XXL</div>
            <div class="box">XXXL</div>
        </div>

        <div class="shop-container">
            <div class="top">
                <h2>OFFICIAL STORES</h2>
            </div>
            
            <div class="product-grid">
                <!-- Product 1 -->
                <div class="product">
                    <div class="product-image-official-store">
                        <img src="sneakers/adidas2.jpg" alt="Product 1">
                    </div>
                    <div class="product-details">
                        <h3>Product 1</h3>
                        <p class="price">$20</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="add-to-cart">Add to Cart</button>
                        <div class="ratings">
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
    <div class="product">
        <img src="sneakers/nike.thangs" alt="Product 1">
        <h3>Product 1</h3>
        <p class="price">$20</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <button class="add-to-cart">Add to Cart</button>
        <div class="ratings">
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
        </div>
    </div>

    <!-- Product 3 -->
    <div class="product">
        <img src="sneakers/puma.jpg" alt="Product 1">
        <h3>Product 1</h3>
        <p class="price">$20</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <button class="add-to-cart">Add to Cart</button>
        <div class="ratings">
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
        </div>
    </div>
    <!-- Product 4 -->
    <div class="product">
        <img src="sneakers/Fila.jpg" alt="Product 1">
        <h3>Product 1</h3>
        <p class="price">$20</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <button class="add-to-cart">Add to Cart</button>
        <div class="ratings">
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
        </div>

        <!-- Product 5 -->
    
    </div>
    <div class="product">
        <img src="sneakers/fila2.jpg" alt="Product 1">
        <h3>Product 1</h3>
        <p class="price">$20</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <button class="add-to-cart">Add to Cart</button>
        <div class="ratings">
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
        </div>
    </div>
    </div>
    </div>
    <div>

        <div class="shop-container">
            <div class="top">
            <h2>TOP DEALS</h2>
            </div>
            
            <div class="product-grid">
            <!-- Product 1 -->
            <div class="product">
                <div class="product-image">
                    <img src="sneakers/sneakers10.jpg" alt="Product 1">
                </div>
                <div class="product-details">
                    <h3>Product 1</h3>
                    <p class="price">$20</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <button class="add-to-cart">Add to Cart</button>
                    <div class="ratings">
                        <span class="rating">&#9733;</span>
                        <span class="rating">&#9733;</span>
                        <span class="rating">&#9733;</span>
                        <span class="rating">&#9733;</span>
                        <span class="rating">&#9733;</span>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
    <div class="product">
        <img src="round neck.jpg" alt="Product 1">
        <h3>Product 1</h3>
        <p class="price">$20</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <button class="add-to-cart">Add to Cart</button>
        <div class="ratings">
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
        </div>
    </div>

    <!-- Product 3 -->
    <div class="product">
        <img src="sneakers/sneakers6.jpg" alt="Product 1">
        <h3>Product 1</h3>
        <p class="price">$20</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <button class="add-to-cart">Add to Cart</button>
        <div class="ratings">
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
        </div>
    </div>

    <!-- Product 4 -->
    <div class="product">
        <img src="sneakers/male-top2.jpg" alt="Product 1">
        <h3>Product 1</h3>
        <p class="price">$20</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <button class="add-to-cart">Add to Cart</button>
        <div class="ratings">
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
        </div>
    </div>

    <!-- Product 5 -->
    <div class="product">
        <img src="sneakers/male-top.jpg" alt="Product 1">
        <h3>Product 1</h3>
        <p class="price">$20</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <button class="add-to-cart">Add to Cart</button>
        <div class="ratings">
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
        </div>
    </div>
    </div>
    </div>
    <div class="upper-row2">
    <div class="men-accessories">
    <div class="shop-box-inner">
    <h3><a href="#"></a>MEN' <br> ACCESSORIES</h3>
    </div>
    </div>
    <div class="women-accessories">
    <div class="shop-box-inner">
    <h3><a href="#"></a>WOMEN <br> ACCESSORIES</h3>
    </div>
    </div>
    </div>
    <!-- Lower Row -->
    <div class="lower-row2">
    <div class="watches">
    <div class="shop-box-inner">
    <h3><a href="#"></a>WATCHES</h3>
    </div>
    </div>
    
    </div>
    
    <div class="shop-container">
    <div class="top">
    <h2>NEW ARRIVALS</h2>
    </div>
    
    <div class="product-grid">
    <!-- Product 1 -->
    <div class="product">
    <div class="product-image">
        <img src="sneakers/sneakwes13.jpg" alt="Product 1">
    </div>
    <div class="product-details">
        <h3>Product 1</h3>
        <p class="price">$20</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <button class="add-to-cart">Add to Cart</button>
        <div class="ratings">
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
        </div>
    </div>
    </div>
    
    <!-- Product 2 -->
    <div class="product">
        <img src="round neck.jpg" alt="Product 1">
        <h3>Product 1</h3>
        <p class="price">$20</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <button class="add-to-cart">Add to Cart</button>
        <div class="ratings">
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
        </div>
        </div>
        
        <!-- Product 3 -->
        <div class="product">
        <img src="sneakers/lacoste.jpg" alt="Product 1">
        <h3>Product 1</h3>
        <p class="price">$20</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <button class="add-to-cart">Add to Cart</button>
        <div class="ratings">
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
        </div>
        </div>
        
        <!-- Product 4 -->
        <div class="product">
        <img src="sneakers/sneakers11.jpg" alt="Product 1">
        <h3>Product 1</h3>
        <p class="price">$20</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <button class="add-to-cart">Add to Cart</button>
        <div class="ratings">
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
        </div>
        </div>
        
        <!-- Product 5 -->
        <div class="product">
        <img src="sneakers/sneakers10.jpg" alt="Product 1">
        <h3>Product 1</h3>
        <p class="price">$20</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <button class="add-to-cart">Add to Cart</button>
        <div class="ratings">
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
        </div>
        </div>
        </div>
        <div class="shop-container">
        <div class="top">
        <h2>Best sellers</h2>
        </div>
        
        <div class="product-grid">
        <!-- Product 1 -->
        <div class="product">
        <div class="product-image">
        <img src="sneakers/watches3.jpg" alt="Product 1">
        </div>
        <div class="product-details">
        <h3>Product 1</h3>
        <p class="price">$20</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <button class="add-to-cart">Add to Cart</button>
        <div class="ratings">
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
            <span class="rating">&#9733;</span>
        </div>
        </div>
        </div>
        
        
        <!-- Product 2 -->
        <div class="product">
        <img src="sneakers/jean2.jpg" alt="Product 1">
        <h3>Product 1</h3>
        <p class="price">$20</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <button class="add-to-cart">Add to Cart</button>
        <div class="ratings">
        <span class="rating">&#9733;</span>
        <span class="rating">&#9733;</span>
        <span class="rating">&#9733;</span>
        <span class="rating">&#9733;</span>
        <span class="rating">&#9733;</span>
        </div>
        </div>
        
        <!-- Product 3 -->
        <div class="product">
        <img src="sneakers/male-top2.jpg" alt="Product 1">
        <h3>Product 1</h3>
        <p class="price">$20</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <button class="add-to-cart">Add to Cart</button>
        <div class="ratings">
        <span class="rating">&#9733;</span>
        <span class="rating">&#9733;</span>
        <span class="rating">&#9733;</span>
        <span class="rating">&#9733;</span>
        <span class="rating">&#9733;</span>
        </div>
        </div>

        <!-- Product 4 -->
    <div class="product">
        <img src="sneakers/female-top.jpg" alt="Product 1">
        <h3>Product 1</h3>
        <p class="price">$20</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <button class="add-to-cart">Add to Cart</button>
        <div class="ratings">
        <span class="rating">&#9733;</span>
        <span class="rating">&#9733;</span>
        <span class="rating">&#9733;</span>
        <span class="rating">&#9733;</span>
        <span class="rating">&#9733;</span>
        </div>
        </div>


        <!-- Product 5 -->
    <div class="product">
    <img src="sneakers/sneakers10.jpg" alt="Product 1">
    <h3>Product 1</h3>
    <p class="price">$20</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    <button class="add-to-cart">Add to Cart</button>
    <div class="ratings">
    <span class="rating">&#9733;</span>
    <span class="rating">&#9733;</span>
    <span class="rating">&#9733;</span>
    <span class="rating">&#9733;</span>
    <span class="rating">&#9733;</span>
    </div>
    </div>
    </div>
    </div>
</div>



    </div>shop-container ends
</body>
</html>
