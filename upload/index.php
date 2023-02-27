<?php
require "../Order/DB.php";
    if(isset($_POST['submit'])){
        $allowed_ext = array('png', 'jpg', 'jpeg');
        if(!empty($_FILES['upload']['name'])){
            $file_name = $_FILES['upload']['name'];
            $file_size = $_FILES['upload']['size'];
            $file_tmp = $_FILES['upload']['tmp_name'];
            $target_dir = "../uploads/${file_name}";
            $file_ext = explode('.', $file_name);
            $file_ext = strtolower(end($file_ext));
            $foodname = $_POST['foodname'];
            $foodDesc = $_POST['fooddesc'];
            $foodprice = $_POST['foodprice'];
            if(in_array($file_ext,$allowed_ext)){
                if( $file_size <= 10000000){
                    move_uploaded_file($file_tmp, $target_dir);
                    if(!empty($foodname)){
                        if(!empty($foodDesc)){
                            if(!empty($foodprice)){
                                $sql = "INSERT INTO menu (foodname,foodDesc,foodprice,img_path) VALUES ('$foodname','$foodDesc', $foodprice,'$target_dir')";
                                if(mysqli_query($conn,$sql)){
                                    $message =  '<p style="color:green;"> it has been uploaded succesfully</p>';
                                } else {
                                    $message = '<p style="color:red;"> it has been uploaded unsuccesfully</p>';
                                }
                            }   else {
                                $message  = '<p style="color:red;"> food price cannot be empty</p>';
                            }
                        }   else {
                            $message  = '<p style="color:red;"> food description cannot be empty</p>';
                        }
                    } else {
                        $message = '<p style="color:red;"> food name cannot be empty</p>';
                    }
                } else {
                    $message = '<p style="color:red;"> file is too large</p>';
                }
            } else {
                $message = '<p style="color:red;"> invalid file type</p>';
            }
        } else {
            $message = '<p style="color:red;"> please choose a file</p>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Enter New menu item</h1>
    </div>
    <div class="container">
        <div class="row" >
            <div class="col-lg-2" >
            </div>
            <div class="col-lg-8" >
                <?php echo $message ?? null ?>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                    <input type="file" name="upload">
                    <br>
                    food name
                    <input class="form-control form-control-lg" type="text" name="foodname">
                    food description
                    <input class="form-control form-control-lg" type="text" name="fooddesc">
                    food price
                    <input class="form-control form-control-lg" type="text" name="foodprice">
                    <input type="submit" class="btn btn-primary" value="Submit" name="submit"></input>
                </form>
            </div>
            <div class="col-lg-2" >
            </div>
        </div>
    </div>
    
</body>
</html>