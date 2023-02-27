<?php
session_start();
require("../Order/DB.php");
$sql = "SELECT * FROM `menu`";
$result = mysqli_query($conn, $sql);
$results = mysqli_fetch_all($result, MYSQLI_ASSOC);
$tables = 'order_'.$_COOKIE['tableid'];
echo $tables;
$sql2 = "SELECT * FROM $tables";
$result2 = mysqli_query($conn, $sql2);
$results2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
print_r($results);
echo'<br>';
print_r($results2);
echo'<br>';
echo count($results2);
// 

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
<a href="cart.php" class="nav-item nav-link active">adad</a>
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <?php foreach($results as $item): ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        <div class="container menu-item">
                            <div class="row">
                                <div class="col-sm-4" >
                                    <?php echo "<img src='${item['img_path']} 'alt='img1' name='food_img'>"; ?>
                                </div>
                                <div class="col-sm-8">
                                    <h1 name='foodname' ><?php echo $item['foodname'] ?></h1>
                                    <h2 name='fooddesc'><?php echo $item['foodDesc']  ?></h2>
                                    <h2 name='foodprice'><?php echo $item['foodprice'] ?> T's</h2>
                                    <input type="hidden" name="productid" value="<?php echo $item['id'] ?> ">
                                </div>
                                <button type="submit" name="submit" value="add to order" class="btn btn-primary">Add to cart</button>
                            </div>
                            
                        </div>
                    </form>  
                <?php endforeach; ?>
                <hr>
            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6></h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>