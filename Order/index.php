<?php
require "DB.php";
$sql = "SELECT * FROM `menu`";
$result = mysqli_query($conn, $sql);
$results = mysqli_fetch_all($result, MYSQLI_ASSOC);
$tableNUM = $_COOKIE['tableid'];
$tables = "order_".$tableNUM;
try{
    $sql2 = "CREATE TABLE $tables (
        food_id int(6) NOT NULL)";
    if($conn->query($sql2)=== true){
        echo "<script>console.log('table created')</script>";
        
    } else{
        echo "failed to add create table";
    }
} catch(Exception $e){
    echo 'already created';
}

if(isset($_POST['submit'])){
    function addTOorder($foodid,$tables,$conn){
        $sql = "INSERT INTO $tables (food_id) VALUES ('$foodid')";
        if($conn->query($sql)===true){
            echo "<script>console.log('added to table')</script>";
        }
    }
    addTOorder($_POST['productid'],$tables,$conn);
    
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo for QR code reading
    </title>
</head>
<body>
<a href="cart.php" class="nav-item nav-link active">sadad</a>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Welcome to table number <?php echo $_COOKIE['tableid'];?></a>
            <a href="cart.php">CART</a>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
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
            </div>
        </div>
    </div>
    <script src="">
        function myAjax() {
            $.ajax({
                type: "POST",
                url: 'localhost/sendMenu.php',
                data:{action:'call_this'},
                success:function(html) {
                    alert(html);
                }
            });
        }
    </script>
</body>
</html>