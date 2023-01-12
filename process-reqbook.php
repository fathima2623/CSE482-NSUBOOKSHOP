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
<?php
print_r($_POST); 


if (empty($_POST["bookname"])) {
    die("Book Name is required");
}


$mysqli = require __DIR__ . "/database.php";


$sql = "INSERT INTO request (bookname,useremail) VALUES(?,?)";
$stmt = $mysqli->stmt_init();

if(! $stmt->prepare($sql)){
    die("SQL error: " . $mysqli->error);
}


$stmt->bind_param("ss",
                  $_POST["bookname"],
                  $user["email"],
                  );

                  if ($stmt->execute()) {

                    header("Location: index.php");
                    exit;
                    
                } else {
                    
                    if ($mysqli->errno === 1062) {
                        die("email already taken");
                    } else {
                        die($mysqli->error . " " . $mysqli->errno);
                    }
                }

// var_dump($password_hash);
