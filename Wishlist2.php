<!DOCTYPE html>
<html>
    <head>
        <title>NSU Bookshop</title>
        <link rel="stylesheet" href="rifat2.css" />
        <script src="store.js" async></script>
    </head>

    <header>
        <img src="https://seeklogo.com/images/N/north-south-university-logo-0CA3A4611D-seeklogo.com.png">
         <nav>
             <ul>
                 <li><a href="Home.html">HOME</a></li>
                 <li><a href="login.html">LOGIN</a></li>
                 <li><a href="signup.html">SIGNUP</a></li>
                 <li><a href="about.html">ABOUT</a></li>
             </ul>
         </nav>
     </header>
    <body>
        
        <section class="container content-section">
            <h2 class="section-header">Wishlist</h2>
            <div class="shop-items">
                <div class="shop-item">
                    <span class="shop-item-title">War & Peace</span>
                    <img class="shop-item-image" src="https://upload.wikimedia.org/wikipedia/commons/a/af/Tolstoy_-_War_and_Peace_-_first_edition%2C_1869.jpg">
                    <div class="shop-item-details">
                        <span class="shop-item-price">650 BDT</span>
                        <button class="btn btn-primary shop-item-button" type="button">Cart</button>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">It Ends With Us</span>
                    <img class="shop-item-image" src="https://static-01.daraz.com.bd/p/d8b7091d49cf8238cdd8f1b0213ec187.jpg">
                    <div class="shop-item-details">
                        <span class="shop-item-price">400 BDT</span>
                        <button class="btn btn-primary shop-item-button"type="button">Cart</button>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">Rich Dad Poor Dad</span>
                    <img class="shop-item-image" src=https://static-01.daraz.com.bd/p/1c1f8e3394ffb3b22f5af8d2c9ee7580.jpg">
                    <div class="shop-item-details">
                        <span class="shop-item-price"> 350 BDT</span>
                        <button class="btn btn-primary shop-item-button" type="button">Cart</button>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">Rich Dad Poor Dad</span>
                    <img class="shop-item-image" src=https://static-01.daraz.com.bd/p/1c1f8e3394ffb3b22f5af8d2c9ee7580.jpg">
                    <div class="shop-item-details">
                        <span class="shop-item-price"> 350 BDT</span>
                        <button class="btn btn-primary shop-item-button" type="button">Cart</button>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <section class="container content-section">
            <h2 class="section-header">CART</h2>
            <div class="cart-row">
                <span class="cart-item cart-header cart-column">ITEM</span>
                <span class="cart-price cart-header cart-column">PRICE</span>
                <span class="cart-quantity cart-header cart-column">QUANTITY</span>
            </div>
            <div class="cart-items">
            </div>
            <div class="cart-total">
                <strong class="cart-total-title">Total</strong>
                <span class="cart-total-price">BDT 0</span>
            </div>
        </section>
        
                        </a>
                    </li>
                </ul>
            </div>
    </body>
</html>
<?php
require('config.php');
?>
<form action="submit.php" method="post">
	<script
		src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		data-key="<?php echo $publishablekey?>"
		data-amount="1000"
		data-name="NSU Bookshop"
		data-description="Book name"
		data-currency="usd"
        data-label="Proceed to Pay with Card"
	>
	</script>
    <script>
        // Hide default stripe button, be careful there if you
        // have more than 1 button of that class
        document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
    </script>
    <button type="submit" class="btn btn-primary btn-purchase">Buy with card</button>
</form>