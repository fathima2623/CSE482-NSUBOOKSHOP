<?php
print_r($_POST); 


if (empty($_POST["bookname"])) {
    die("Book Name is required");
}
if (empty($_POST["price"])) {
    die("Price is required");
}

$mysqli = require __DIR__ . "/database.php";


$sql = "INSERT INTO book (bookname,ed,price,course,picture) VALUES(?,?,?,?,?)";
$stmt = $mysqli->stmt_init();

if(! $stmt->prepare($sql)){
    die("SQL error: " . $mysqli->error);
}


$stmt->bind_param("sssss",
                  $_POST["bookname"],
                  $_POST["ed"],
                  $_POST["price"],
                  $_POST["course"],
                  $_POST["picture"]);

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
