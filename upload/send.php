<?php
require "../Order/DB.php";
$sql = "SELECT * FROM `menu`";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo "id: " . $row["id"]. " - Name: " . $row["foodname"]. " " . $row["foodDesc"]. $row['foodprice']. "<img src='${row['img_path']}'></img>";
    }
  } else {
    echo "0 results";
  }
?>