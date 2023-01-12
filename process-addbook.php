<?php
print_r($_POST); 

$mysqli = require __DIR__ . "/database.php";


$sql = "INSERT INTO book (bookname,ed,price,course,picture,description,location) VALUES(?,?,?,?,?,?,?)";
$stmt = $mysqli->stmt_init();

if(! $stmt->prepare($sql)){
    die("SQL error: " . $mysqli->error);
}


$stmt->bind_param("sssssss",
                  $_POST["bookname"],
                  $_POST["ed"],
                  $_POST["price"],
                  $_POST["course"],
                  $_POST["picture"],
                  $_POST["description"],
                  $_POST["location"]);

                  if ($stmt->execute()) {

                    header("Location: index.php");
                    exit;
                    
                } else {
                    
                 
                        die($mysqli->error . " " . $mysqli->errno);
                    
                }

// var_dump($password_hash);
