<?php
session_start();


$bookname = $_POST["bookname"];
$ed = $_POST["ed"];
$price = $_POST["price"];
$course = $_POST["course"];
$picture = $_POST["picture"];
$description = $_POST["description"];
$location = $_POST["location"];

$servername = "localhost"; 
$username = "root"; 
$dbname = "login_db";
$password = ""; 
 
// Create connection 
$conn = mysqli_connect($servername, $username,$password, $dbname); 


$sql = "UPDATE book SET ed='$ed', price='$price',course='$course',picture='$picture',description='$description',location='$location' WHERE bookname='$bookname'"; 
 
if (mysqli_query($conn, $sql)) { 
    header("Location: wishlist.php"); 
} else { 
    echo "Error updating record: " . mysqli_error($conn); 
}




?>