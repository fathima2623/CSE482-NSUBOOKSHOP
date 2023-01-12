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
    <title> Wishlist </title>
   
    <link rel="stylesheet" href="rifat.css" />
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<body>
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
                    <li><a href="Home.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="results.php">Search</a></li>
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="Wishlist2.php">cart</a></li>
                    <li><a href="Wishlist.html">Wishlist</a></li>
                    <li><a href="logout.php">Log out</a></li>
                    <?php endif; ?>
                <?php else : ?>
                    <li><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></li> 
                <?php  endif; ?>
            </ul>
    
        </nav>
     </header>
     
    <div class="header_fixed">
        <button class = "book" type="button" onclick="location.href='addbook.html';" >Add Books</button></td>
        <table>
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Book Image</th>
                    <th>Book Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Add To Cart</th>
                    <th>Remove From Cart</th>
                </tr>
            </thead>
            <tbody id ="body"> 
            <?php
    
                    if(isset($user)){

                     $sql = "SELECT bookname,ed,price,course,picture,description FROM book"; 
                     $result = mysqli_query($mysqli, $sql); 

                            if (mysqli_num_rows($result) > 0) { 

                                    while($row = mysqli_fetch_assoc($result)) { ?>
                
                 <tr>
                    <td>1</td>
                    <td><img src=<?= htmlspecialchars($row["picture"]) ?>></td>
                    <td><?= htmlspecialchars($row["bookname"]) ?></td>
                    <td><?= htmlspecialchars($row["course"]) ?></td>
                    <td><?= htmlspecialchars($row["price"]) ?></td>
                    <form action="updatebook.php" method="post">
                    <td><button class = "add" type="submit" name="update" value='<?php echo $row["bookname"]?>'>Update</button></td>
                    </form>
                    <form action="process-deletebook.php" method="post">
                    <td><button class = "remove" type="submit" name="delete" value='<?php echo $row["bookname"]?>'>Delete</button></td>
                    </form>
                </tr>

                <?php 
              
            } } else {  ?>
                  <p> add books! </p>
            <?php
            }} ?>


               
            </tbody>
        </table>
    </div>
    <footer>
        <p><span>&#169;</span> North South University<br>
            Bashundhara R/A, Dhaka 1229 <br>
            
            Developed &amp; Maintained by NSU
            <br>
    </footer>
</body>

</html>