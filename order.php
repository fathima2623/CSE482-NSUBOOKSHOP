

 ?><?php

$mysqli = require __DIR__ . "/database.php";
session_start();
if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

}

$bookname = $_POST["book"];
$location = $_POST["location"];
$name = $user["email"];


$sql = "INSERT INTO orders (useremail,book,bookshop,time) VALUES(?,?,?,?)";
// $sql = "INSERT INTO order (user, book, bookshop) 
// VALUES ('$name', '$bookname','$location')";
 
$stmt = $mysqli->stmt_init();

if(! $stmt->prepare($sql)){
    die("SQL error: " . $mysqli->error);
}

$t=time();
echo($t . "<br>");
echo(date("Y-m-d",$t));

$stmt->bind_param("ssss",
                  $bookname,
                  $location,
                 $name,date("Y-m-d",$t));

                  if ($stmt->execute()) {

                    
                    exit;
                    
                } else {
                    
                 
                        die($mysqli->error . " " . $mysqli->errno);
                    
                }

?>


<!-- // var_dump($password_hash); -->
