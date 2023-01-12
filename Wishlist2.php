<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

    // $cookie_name = "user";
     
    // $cookie_value = $user["fullname"];

    // setcookie($cookie_name,$cookie_value, time()+86400,"/");
} ?>


    <!DOCTYPE html>
<html>
    <head>
        <title>NSU Bookshop</title>
        <link rel="stylesheet" href="rifat2.css" />
        <script async src="store.js" ></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </head>

   <header>
  
        <nav>

<div class="logo">
    <img src="Logo.png">
</div>

<ul>


    
<?php if(isset($user)) : 
        
        if ($user["type"]=="admin"): ?>
        
        <li><a href="index.php">Dashboard</a></li>
        <li><a href="Orders.html">Check Orders</a></li>
        <li><a href="addbook.html">Edit Book catalogue</a></li>
        <li><a href="requestlist.html">Book request list</a></li>
        <li><a href="profile.html"><?= htmlspecialchars($user["fullname"]) ?></a></li>
        <li><a href="logout.php">Log out</a></li>
        <?php else: ?>
        <!-- <li><a href="Home.html">Home</a></li> -->
        <li><a href="index.php">Dashboard</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="results.php">Search</a></li>
        <li><a href="profile.html">Profile</a></li>
        <li><a href="Wishlist2.php">cart</a></li>
        <li><a href="logout.php">Log out</a></li>
        <?php endif; ?>
    <?php else : ?>
        <li><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></li> 
    <?php  endif; ?>
</ul>

</nav>
     </header>
    <body>
        
        <section class="container content-section">
            <h2 class="section-header">Wishlist</h2>
            <div class="shop-items">

            <?php
    
               if(isset($user)){
                $em = $user["email"];
                $sql = "SELECT wishbook FROM wishlist WHERE useremail LIKE '$em' "; 
                $result = mysqli_query($mysqli, $sql); 
 
                 if (mysqli_num_rows($result) > 0) { 
   

                       while($row = mysqli_fetch_assoc($result)) { 
                        
                        
                        $book = $row["wishbook"];
                        $sql = "SELECT bookname,ed,price,course,picture,Location FROM book WHERE bookname LIKE '$book'"; 
                        $result2 = mysqli_query($mysqli, $sql); 
                        $row2 = mysqli_fetch_assoc($result2);
 
                       
                        
                        ?>

                <div class="shop-item">
                    <span class="shop-item-title"><?= htmlspecialchars($row2["bookname"]) ?></span>
                    <img class="shop-item-image" src=<?= htmlspecialchars($row2["picture"]) ?>>
                    <span class="shop-item-location"><?= htmlspecialchars($row2["Location"]) ?></span>
                    <div class="shop-item-details">
                        <span class="shop-item-price"><?= htmlspecialchars($row2["price"]) ?></span>
                        <button class="btn btn-primary shop-item-button" type="submit">Cart</button>
                        <button style="margin: 1px 1px; background:red" type="submit" onclick='myfunction("<?php echo $row2["bookname"] ?>")'>Remove</button>
                    </div>
                </div>

                <?php 
              
            } } else {  ?>
                  <p> no results! </p>
            <?php
            }} ?>
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
                <span class="cart-total-price">0</span>
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
		data-amount=""
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
    <form action="submit.php">
    <input type="text" name="total">
    <button type="submit"  class="btn btn-primary btn-purchase">Buy with card</button>
    </form>
  
    
</form>