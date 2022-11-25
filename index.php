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
} ?>


    
    


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

            .featured_boks{
  width: 100%;
  height: 100vh;
  padding: 160px 0;
}

.featured_boks h1{
  display: flex;
  align-items:flex-end;
  justify-content: left;
  margin-bottom: 30px;
  font-size: 45px;
  margin-left: 50px;
}

.featured_boks .featured_book_box{
  width: 95%;
  height: 60vh;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
  overflow: hidden;
  overflow-x: scroll;
}

.featured_boks .featured_book_box .featured_book_card{
  width: 250px;
  height: 420px;
  text-align: center;
  padding: 5px;
  border: 1px solid #919191;
  margin: auto 20px;
}

.featured_boks .featured_book_box .featured_book_card:hover{
  box-shadow: 0 0 5px #089da1;
}

.featured_boks .featured_book_box .featured_book_card .featurde_book_img img{
  width: 150px;
}

.featured_boks .featured_book_box .featured_book_card .featurde_book_tag h2{
  margin: 12px;
  font-size: small;
}

.featured_boks .featured_book_box .featured_book_card .featurde_book_tag .writer{
  color: #919191;
  font-size: small;
}

.featured_boks .featured_book_box .featured_book_card .featurde_book_tag .categories{
  color: #089da1;
  margin-top: 8px;
}

.featured_boks .featured_book_box .featured_book_card .featurde_book_tag .book_price{
  margin-top: 8px;
  font-weight: bold;
  margin-bottom: 15px;
}

.featured_boks .featured_book_box .featured_book_card .featurde_book_tag .book_price sub{
  font-weight: 100;
  padding: 0 5px;
}

.featured_boks .featured_book_box .featured_book_card .featurde_book_tag .f_btn{
  padding: 8px 20px;
  border: 2px solid #089da1;
  text-decoration: none;
  color: #000;
}
.contact-section {
  position: relative;
  margin-top: 0;
  padding-top: 0;
  background: #0F1A50;
  height: 300px;
}
.contact-section .container {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  color: white;
}
.contact-right {
  position: absolute;
  right: 0;
  top: 30%;
  padding-bottom:0px ;
  width: 45%;
  height: 80%;
  
}
.contact-right iframe {
  height: 60%;
  width: 60%;
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
  } }
    </style>
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
                    
                    <li><a href="Orders.html">Check Orders</a></li>
                    <li><a href="addbook.html">Edit Book catalogue</a></li>
                    <li><a href="requestlist.html">Book request list</a></li>
                    <li><a href="profile.html"><?= htmlspecialchars($user["fullname"]) ?></a></li>
                    <li><a href="logout.php">Log out</a></li>
                    <?php else: ?>
                    <li><a href="Home.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="search.html">Search</a></li>
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="checkout.html">cart</a></li>
                    <li><a href="Wishlist.html">Wishlist</a></li>
                    <?php endif; ?>
                <?php else : ?>
                    <li><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></li> 
                <?php  endif; ?>
            </ul>
    
        </nav>

        <!-- <div class="">

        

        </div> -->

        <div class="featured_boks">

          <h1>New added books!</h1>
          <div class="featured_book_box">


          <?php
    
                 if(isset($user)){

                 $sql = "SELECT bookname,ed,price,course,picture FROM book"; 
                 $result = mysqli_query($mysqli, $sql); 
 
                 if (mysqli_num_rows($result) > 0) { 
   
                       while($row = mysqli_fetch_assoc($result)) { ?>



                       <div class="featured_book_card">
  
                  <div class="featurde_book_img">
                      <img src= <?= htmlspecialchars($row["picture"]) ?> >
                  </div>
  
                  <div class="featurde_book_tag">
                      <h2><?= htmlspecialchars($row["bookname"]) ?></h2>
                      <p class="writer"><?= htmlspecialchars($row["ed"]) ?></p>
                      <div class="categories"><?= htmlspecialchars($row["course"]) ?></div>
                      <p class="book_price"><?= htmlspecialchars($row["price"]) ?><sub><del>150tk</del></sub></p>
                      <a href="product.html" class="f_btn">Learn More</a>
                  </div>
  
              </div>

              <?php 
              
            } } else {  ?>
                  <p> no results! </p>
            <?php
            }} ?>

              
      </div>
  
      </div>

      

  </div>

       
    </section>
    <section class="contact-section">
        <div class="container">
            <div id="footer" class="contact-left">
                <p><span>&#169;</span> North South University<br>
                    Bashundhara R/A, Dhaka 1229 <br>
                    Developed &amp; Maintained by NSU <br>
            </div>
            <div class="contact-right">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14600.375809958237!2d90.4255164!3d23.8152579!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2ffe0291c76596c8!2sNSU%20Book%20Shop!5e0!3m2!1sen!2sbd!4v1669175017412!5m2!1sen!2sbd"
                    width="600" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>

        </div>
    </section>
</body>
</html>
    
    