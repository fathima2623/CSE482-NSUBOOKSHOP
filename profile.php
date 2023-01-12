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
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="abrar.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>

<body>
    <h1>NSU Bookshop</h1>
    <h3>A place for all your reading needs!</h3>
    <header>
           <img src="https://seeklogo.com/images/N/north-south-university-logo-0CA3A4611D-seeklogo.com.png">
            <nav>
            <ul>

            
                
<?php if(isset($user)) : 
        
        if ($user["type"]=="admin"): ?>
        
       
        <li><a href="check-orders.php
        ">Check Orders</a></li>
        <li><a href="wishlist.php">Edit Book catalogue</a></li>
        <li><a href="requestlist.html">Book request list</a></li>
        <li><a href="profile.html"><?= htmlspecialchars($user["fullname"]) ?></a></li>
        <li><a href="logout.php">Log out</a></li>
        <?php else: ?>
       
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

    <div class="profile-info">  
        <p class="profile-info">
            <b>Full Name :</b> <?php echo $user["fullname"]; ?>
        </p><hr>
        <p class="profile-info">
            <b>Email :</b> <?php echo $user["email"]; ?>
        </p>
    </div>

</body>

</html>