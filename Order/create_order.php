<?php
$username = "root";
$hostname = "localhost";
$password = "";
$DB = "menu";

$conn = new mysqli($hostname, $username, $password,$DB);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE TABLE order(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    food_id int(6) NOT NULL,
    foodname VARCHAR(60) NOT NULL,
    foodDesc VARCHAR(60) NOT NULL,
    foodprice INT(60) NOT NULL,
    img_path VARCHAR(60) NOT NULL)";

if($conn->query($sql) === TRUE){
    echo "<script>console.log('created database')</script>";
} else {
    echo "error creating table";
}
?>