
<?php
session_start();

$mysqli = require __DIR__ . "/database.php";

// $var = $_SESSION['UPDATEBOOK'];

$var = $_POST["update"];


$sql = "SELECT bookname,ed,price,course,picture,description FROM book WHERE bookname LIKE '$var'"; 
                        
$result2 = mysqli_query($mysqli, $sql); 
                        
$row2 = mysqli_fetch_assoc($result2);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="abrar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>Add Book</title>
</head>

<body>
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
    <h3 style="font-family: Trebuchet MS;">Add Book</h3>
    <div>
        <form action="process-updatebook.php" method="POST" >
          <label for="bname">Book Name</label>
          <input type="text" id="bname" name="bookname" placeholder="Book name.." value='<?= htmlspecialchars($var) ?>'>

          <label for="edition">Edition</label>
          <input type="text" id="ed" name="ed" placeholder="Edition(if any)" value=<?= htmlspecialchars($row2["ed"]) ?>>
          
          <label for="price">Price</label>
          <input type="text" id="price" name="price" placeholder="Enter Amount(if any)" value=<?= htmlspecialchars($row2["price"]) ?>>
          
          <label for="course">Course</label>
          <input type="text" id="ed" name="course" placeholder="Course(if any)" value=<?= htmlspecialchars($row2["course"]) ?>>

          <label for="picture">picture</label>
          <input type="text" id="picture" name="picture" placeholder="picture(if any)" value=<?= htmlspecialchars($row2["picture"]) ?>>

          <label for="description">Description</label>
          <input type="text" id="description" name="description" placeholder="description(if any)" value=<?= htmlspecialchars($row2["description"]) ?>>
         
          <label for="location" aria-placeholder="location">location:</label>
               <select id="location" name="location">
                <option value="" disabled selected hidden>Choose location</option>
                 <option value="nsubookshop">NSU Bookshop</option>
                 <option value="nsuoldshop">NSU Oldshop</option>
                 <option value="kicphotocopycenter">KIC Photocopy center</option>
               </select>
             <br><br>

          <input type="submit" value="Submit">
        </form>
      </div>


</body>

</html>