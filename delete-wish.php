<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

} 



$servername = "localhost"; 
$username = "root"; 
$dbname = "login_db";
$password = ""; 
 
// Create connection 
$conn = mysqli_connect($servername, $username,$password, $dbname); 

$bookname = $_POST["book"];


$sql = "DELETE FROM wishlist WHERE  wishbook LIKE '$bookname' AND useremail='$user[email]'"; 

 
if (mysqli_query($conn, $sql)) { 
    echo "Record deleted successfully"; 
   
} else { 
    echo "Error deleting record: " . mysqli_error($conn); 
} 




?>