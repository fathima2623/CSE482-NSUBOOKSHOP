<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

    $cookie_name = "user";
     
    $cookie_value = $user["fullname"];

    setcookie($cookie_name,$cookie_value, time()+86400,"/");
} ?><?php




// $var = $_SESSION['UPDATEBOOK'];

$var = $_POST["view"];


$sql = "SELECT bookname,ed,price,course,picture,description,Location FROM book WHERE bookname LIKE '$var'"; 
                        
$result2 = mysqli_query($mysqli, $sql); 
                        
$row2 = mysqli_fetch_assoc($result2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Product page</title>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
      }
                
                
      section{
        width: 100%;
        height: 110px;
        background-image: url(image/bg.png);
        background-size: cover;
        background-position: center;
      }
      
      section nav .logo{
      
      float: left;
      margin-left: 20px;
      }
      
      section nav ul{
        float: right;
        margin-top: 40px;
        margin-right: 20px;
      font-size: large;
      font-weight: bold;}
      
      section nav{
        width: 100%;
        display: block;
       
        box-shadow: 0 0 10px #089da1;
        /* background: #fff; */
        background:black;
        position: fixed;
        left: 0;
        z-index: 100;
      }
      
      section nav .logo img{
        width: 100px;
        cursor: pointer;
        margin: 8px 0;
      }
      
      section nav ul{
        list-style: none;
      }
      
      section nav li{
        display: inline-block;
        padding: 0 10px;
      }
      
      section nav li a{
        text-decoration: none;
        color: white;
      }
      
      section nav li a:hover{
        color: #089da1;}


    /* Product */

    .product{

        border: 1px solid black;
        display: block;
        height: 550px;
        width: 80%;
        margin: auto;
    }

    .product img{
        float: left;
        border: 2px solid black;
        height: 400px;
        margin: 70px 10px ;
        margin-left: 30px;
        width: 25%;
        box-shadow: 0 0 8px rgba(0,0,0,0.5);
    }

    .product .details{

     float: right;
     height: 400px;
     width :50%;
     margin: auto;
     border: 1px black solid;
     margin: 70px 0px ;
     margin-right: 60px;
     box-shadow: 0 0 8px rgba(0,0,0,0.5);
    }

    .product .details h2{
        text-align: center;
        text-decoration: underline;
        margin-top: 10px;
        margin-bottom: 50px;
        color:#089da1;
    }

    .product .details p{
        text-align: left;
        font-weight: bold;
        margin-left: 5px;
        margin-top: 10px;
        margin-bottom: 20px;
    }

    .product .details button{

        margin-left: 5px;
        padding: 8px;
    }


  
@media screen and (max-width: 600px) {
  
  section {
    display: block;
    width: 100%;
    height: 500px;
  }

  section nav{
    position: relative;
  }
  section nav .logo, section nav ul, section nav li{
    float: none;
    display: block;
    text-align: center;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  
  section nav li{
    border: 1px solid white;
  }

  section nav li a:hover{
    color: #089da1;
  }

  .product img, .product .details{
    display: block;
    float: none;
    width: 100%;
    margin: 0;
}}
</style>
<script>

function myFunction(data) {
   console.log(data);
     $.ajax({
      url: "wishlistprocess.php",
      type: "POST",
      data : { bookname : data ,
               username : "<?php echo $user["email"] ?>" },
      success: function() {
        alert("added to wishlist");
    }});
    
}
</script>
</head>

<body>
    <section>
        <nav>

            <div class="logo">
                <img src="Logo.png">
            </div>
    
            <ul>
            <?php if(isset($user)) : 
                    
                    if ($user["type"]=="admin"): ?>
                    
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="Orders.html">Check Orders</a></li>
                    <li><a href="wishlist.php">Edit Book catalogue</a></li>
                    <li><a href="requestlist.html">Book request list</a></li>
                    <li><a href="profile.html"><?= htmlspecialchars($user["fullname"]) ?></a></li>
                    <li><a href="logout.php">Log out</a></li>
                    <?php else: ?>
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

       
    </section>

    <div class="product">

    <img src="<?= htmlspecialchars($row2["picture"]) ?>">

    <div class="details"> 

    <h2><?= htmlspecialchars($row2["bookname"]) ?></h2>
    
   
    <p>Edition : <?= htmlspecialchars($row2["ed"]) ?></p>
    <p>Description : <?= htmlspecialchars($row2["description"]) ?></p>
    <p>Course : <?= htmlspecialchars($row2["course"]) ?></p>
    <p>Location : <?= htmlspecialchars($row2["Location"]) ?></p>

    <button id="like" onclick='myFunction("<?php echo $row2["bookname"] ?>")'>Add to Wishlist</button>

    </div>
 

   
</div>
</body>
</html>