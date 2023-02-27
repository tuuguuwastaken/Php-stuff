<?php
require "DB.php";
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

<div class='container menu-item'>
    <div class='row'>
        <div class='col-sm-4'>
            <img src="${row['img_path']}" alt='img1'>
        </div>
        <div class='col-sm-8'>
            <h1 class='food-name'><?php echo $row['foodname'] ?></h1>
            <h2 class='food-desc'><?php echo $row['foodDesc']?></h2>
            <h2 class='food-desc'><?php echo $row['food']."Tugriks"?></h2>
        </div>
    </div>
</div>
