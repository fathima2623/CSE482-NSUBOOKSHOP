<?php

$mysqli = require __DIR__ . "/database.php";
session_start();

$bookname = $_POST["bookname"];
$user = $_POST["username"];

$servername = "localhost"; 
$username = "root"; 
$dbname = "login_db";
$password = ""; 
 
// Create connection 
$conn = mysqli_connect($servername, $username,$password, $dbname); 


if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error()); 
} 
echo "Connected successfully";


$sql = "INSERT INTO wishlist (useremail, wishbook) 
VALUES ('$user', '$bookname')";
 
 
if (mysqli_query($conn, $sql)) { 
    echo "Added to wishlist"; 
} else { 
    echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
}

?>