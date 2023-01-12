
<?php


$servername = "localhost"; 
$username = "root"; 
$dbname = "login_db";
$password = ""; 
 
// Create connection 
$conn = mysqli_connect($servername, $username,$password, $dbname); 

$bookname = $_POST["delete"];


$sql = "DELETE FROM book WHERE  bookname LIKE '$bookname'"; 
 
if (mysqli_query($conn, $sql)) { 
    echo "Record deleted successfully"; 
   
} else { 
    echo "Error deleting record: " . mysqli_error($conn); 
} 




?>