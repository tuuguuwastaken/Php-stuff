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
?>