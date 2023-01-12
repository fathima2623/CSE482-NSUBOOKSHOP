<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

} ?>
<style>
          table,td,th{
        border: 2px solid black;
    }
    table{
        width : 100%;
        color:white;
    }
    body{
        background:  #1B2640;
    }
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

<body>
    


    
<section>
         
         <nav>
 
             <div class="logo">
                 <img src="Logo.png">
             </div>
     
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
  </section>
  <section>
  <?php     
    if(isset($user)){

        $sql2 = "SELECT useremail,book,bookshop,time FROM orders"; 
        $result2 = mysqli_query($mysqli, $sql2); 

        if (mysqli_num_rows($result2) > 0) { 
           ?> <table>
            <tr>
            <th>Location</th>
            <th>book</th>
            <th>User</th>
            <th>time of order</th>
            </tr>
            
            <?php
              while($row = mysqli_fetch_assoc($result2)) { ?>

              
                <tr>
                    <td><?= htmlspecialchars($row["useremail"]) ?></td>
                    <td><?= htmlspecialchars($row["book"]) ?></td>
                    <td><?= htmlspecialchars($row["bookshop"]) ?></td>
                    <td><?= htmlspecialchars($row["time"]) ?></td>
                </tr>
                
              <?php } }}
 ?>  </table>
  </section>

  </body>