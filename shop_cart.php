<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="shop_cart.css"> <!-- Link to external stylesheet -->
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
                <a href="login.html"><span class="icon material-symbols-outlined">login</span></a>
                <a href="register.html"><span class="icon material-symbols-outlined">How_To_Reg</span></a>
                <a href=""><span class="icon material-symbols-outlined">chat</span></a>
            </div>
        </div>
        <div class="nav-bar">
            <nav>
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">SHOP</a></li>
                    <li><a href="#">BLOG</a></li>
                    <li><a href="#">LEGAL NOTICE</a></li>
                    <li><a href="#">CONTACT US</a></li>
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
   <main>
    <div class="cart-container">
        <h2>Shopping Cart</h2>
        <div class="cart-items">
            <!-- Cart items -->
            <div class="cart-item">
                <img src="maxi7.jpg" alt="Product 1">
                <div class="item-details">
                    <h3>Product 1</h3>
                    <p>Price: $20</p>
                    <input type="number" value="1" min="1" class="quantity-input">
                    <button class="remove-item">Remove</button>
                </div>
            </div>
            <div class="cart-item">
                <img src="product2.jpg" alt="Product 2">
                <div class="item-details">
                    <h3>Product 2</h3>
                    <p>Price: $25</p>
                    <input type="number" value="1" min="1" class="quantity-input">
                    <button class="remove-item">Remove</button>
                </div>
            </div>
            <div class="cart-item">
                <img src="product3.jpg" alt="Product 3">
                <div class="item-details">
                    <h3>Product 3</h3>
                    <p>Price: $30</p>
                    <input type="number" value="1" min="1" class="quantity-input">
                    <button class="remove-item">Remove</button>
                </div>
            </div>
            <div class="cart-item">
                <img src="product4.jpg" alt="Product 4">
                <div class="item-details">
                    <h3>Product 4</h3>
                    <p>Price: $15</p>
                    <input type="number" value="1" min="1" class="quantity-input">
                    <button class="remove-item">Remove</button>
                </div>
            </div>
            <div class="cart-item">
                <img src="product5.jpg" alt="Product 5">
                <div class="item-details">
                    <h3>Product 5</h3>
                    <p>Price: $10</p>
                    <input type="number" value="1" min="1" class="quantity-input">
                    <button class="remove-item">Remove</button>
                </div>
            </div>
            <div class="cart-item">
                <img src="product5.jpg" alt="Product 5">
                <div class="item-details">
                    <h3>Product 5</h3>
                    <p>Price: $10</p>
                    <input type="number" value="1" min="1" class="quantity-input">
                    <button class="remove-item">Remove</button>
                </div>
            </div>
            <div class="cart-item">
                <img src="product5.jpg" alt="Product 5">
                <div class="item-details">
                    <h3>Product 5</h3>
                    <p>Price: $10</p>
                    <input type="number" value="1" min="1" class="quantity-input">
                    <button class="remove-item">Remove</button>
                </div>
            </div>
            <!-- End of cart items -->
        </div>
        <div class="cart-summary">
            <p>Subtotal: $XXX</p>
            <p>Total: $XXX</p>
        </div>
        <div class="cart-actions">
            <button class="checkout-btn">Proceed to Checkout</button>
            <a href="#" class="continue-shopping">Continue Shopping</a>
        </div>
    </div>
</body>
</html>
