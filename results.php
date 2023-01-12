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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Results</title>
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



/** search bar **/
.search{
  display: block;
  background-color:#089da1;
  margin-top: 50px;
 height: 40px;
 border-radius: 10px;
 box-shadow:#089da1;
  margin: auto;
  width: 50%;
}

.searchTerm{
  width: 90%;
  height: inherit;
  border-radius: 10px;
}

.search input[type=text] {
  padding: 6px;
  margin-top: 4px;
  font-size: 17px;
  border: none;
  width: 90%;
  margin-left: 5px;
}

.search button {
  float: right;
  padding: 4px 6px;
  margin-top: 6px;
  margin-right: 13px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.search button:hover {
  background:white
}

/* courses */

.courses{
  width: 100%;
  height: auto;
  margin-bottom: 35px;
  margin-top: 10px;
}

.courses h1{
  font-size: 50px;
  text-align: center;
  margin-bottom: 35px;
}



.courses .courses_box{
  width: 95%;
  margin: 0 auto;
  display: grid;
  height: auto;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
  grid-gap: 25px 0;
}

.courses .courses_box .courses_card{
  width: 250px;
  height: 350px;
  text-align: center;
  padding: 5px;
  border: 1px solid #919191;
  margin: auto 20px;
}

.courses .courses_box .courses_card:hover{
  box-shadow: 0 0 5px #089da1;
}

.courses .courses_box .courses_card .courses_image{
  width: 150px;
  height: 220px;
  margin: 0 auto;
  cursor: pointer;
  box-shadow: 0 0 8px rgba(0,0,0,0.5);
  overflow: hidden;
}

.courses .courses_box .courses_card .courses_image img{
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  transition: 0.3s;
}

.courses .courses_box .courses_card:hover .courses_image img{
  transform: scale(1.1);
}

.courses .courses_box .courses_card .courses_tag p{
  font-family: queen of camelot;
  font-size: 20px;
  margin: 8px 0;
  margin-bottom: 15px;
  
}

.courses .courses_box .courses_card .courses_tag H3{
  font-family: queen of camelot;
  font-size: 15px;
  margin: 8px 0;
  margin-bottom: 8px;
  
}


.courses .courses_box .courses_card .courses_tag .courses_btn{
  padding: 8px 20px;
 
  border: 2px solid #089da1;
  text-decoration: none;
  color: #000;
}

.courses .courses_box .courses_card .courses_tag .courses_btn a{
margin-top: 5px;
}

@media screen and (max-width: 600px) {
  
  section {
    display: block;
    width: 100%;
    height: 500px;
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

  .search{
    float: none;
    display: block;
    width: 100%;
    margin:0px;
  }
  
  .courses .courses_box, .courses .courses_box .courses_card {

   display: block;
   width: 100%;



  }

  section nav {
    position: relative;
  }
 


}

</style>
<script>
$(document).ready(function(){
$("#search").on("keyup",function(){
       var search_term = $(this).val();

       $.ajax({
         url: "gethint.php",
         type: "POST",
         data : {search:search_term },
         success: function(data) {
           $("#table-data").html(data);
         }
       });
     })});
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
                    
                    <li><a href="Orders.php">Check Orders</a></li>
                    <li><a href="wishlist.php">Edit Book catalogue</a></li>
                    <li><a href="profile.php"><?= htmlspecialchars($user["fullname"]) ?></a></li>
                    <li><a href="logout.php">Log out</a></li>
                    <?php else: ?>
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="results.php">Search</a></li>
                    <li><a href="wishlist2.php">cart</a></li>
                    <li><a href="profile.php"><?= htmlspecialchars($user["fullname"]) ?></a></li>
                    <?php endif; ?>
                <?php else : ?>
                    <li><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></li> 
                <?php  endif; ?>
            </ul>
    
            
    
          </nav>

       
    </section>

   
      <div class="search">
        <form >
        <input type="text" id="search" placeholder="What are you looking for?">
        <button type="submit" class="searchButton">
          <i class="fa fa-search"></i>
       </button>
       </form> <br><br>
       <p>Suggestions: <span id="table-data"></span></p>
     </div>
   
<!--      
      <div class="courses">
        <h1>Courses</h1>
    
        <div class="courses_box"> -->
    
            <!-- <div class="courses_card">
                <div class="courses_image">
                   <img src="https://dev.java/assets/images/java-logo-vert-blk.png" alt="">
                </div>
                <div class="courses_tag">
                    <h3>CSE215</h3>
                    <p>Introduction to Java</p>
                    
                    <a href="product.html" class="courses_btn">Search</a>
                </div>
            </div> -->
    
  

     </div>
    
    </div>
     
  

    
</body>
</html>