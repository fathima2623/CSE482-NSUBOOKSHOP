

<?php
session_start();
$search_value = $_POST["search"];

$mysqli = require __DIR__ . "/database.php";


$sql = "SELECT * FROM book WHERE bookname LIKE '%{$search_value}%' OR course LIKE '%{$search_value}%'";


$result = $mysqli->query($sql);

$output = "";

if($search_value!=""){
if(mysqli_num_rows($result) > 0 ){
  $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
              <tr>
              <th>Picture</th>
                <th>Name</th>
                <th>Price</th>
                <th>Course</th>
                <th>Location</th>
                <th>View</th>
              </tr>';

              while($row = mysqli_fetch_assoc($result)){
                $output .= "<tr><td align='center'><img width='100' height='150' src='{$row["picture"]}'></td><td align='center'>{$row["bookname"]}</td><td align='center'>{$row["price"]}</td><td align='center'>{$row["course"]}</td><td align='center'>{$row["Location"]}</td><td align='center'><form action='product.php' method='post'><button type='submit' name='view' value='{$row["bookname"]}'>View</button></form></td>";
              }
    $output .= "</table>";

    echo $output;
}else{
    echo "<button location.href='requestbook.html';>Request a book!</button>";
}}
else{
$output = "Type something";
echo $output;
}

?>

