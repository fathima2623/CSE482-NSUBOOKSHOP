<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $remember = $_POST['remember'];
  
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();


    if($remember==1){
      setcookie('uname', $_POST["email"], time()+60*60,"/");
      setcookie('upass',$_POST["password"], time()+60*60,"/");

    }
     
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="loginstyle.css">
    <title>Login</title>
</head>

<body>
  <!-- Header Section -->

    <header>
           <img src="https://seeklogo.com/images/N/north-south-university-logo-0CA3A4611D-seeklogo.com.png">
            <nav>
                <ul>
                    <li><a href="Home.html">HOME</a></li>
                    <li><a href="login.html">LOGIN</a></li>
                    <li><a href="signup.html">SIGNUP</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    
                    <li>
                </ul>
            </nav>
        </header>
        <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
<!-- Login Section -->
<div class="login-form">
  <form method="post">
    <h1>LOG IN</h1>
    <div class="content">
      <div class="input-field">
        <!-- <input type="email" placeholder="Email" id="email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" autocomplete="nope"> -->
        <input type="email" placeholder="Email" id="email" name="email" value="<?php if(isset($_COOKIE['uname'])) echo $_COOKIE['uname'];?>" autocomplete="nope">
      </div>
      <div class="input-field">
        <input type="password" placeholder="Password"  name="password" value="<?php if(isset($_COOKIE['upass'])) echo $_COOKIE['upass'];?>"autocomplete="new-password">
      </div>
     
    </div>
    <div>
    <input type="checkbox" name = "remember" value="1" >
    <label for="checkbox" style="color:black">Remember me</label>
        </div>
    <div class="action">
      <button><a href="signup.html">Signup</a></button>
      <button><a href="login.html"> Log In</a></button>
    </div>
  </form>
</div>


</body>
</html>