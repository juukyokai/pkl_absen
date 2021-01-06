<?php
    //using namespace for xampp default user
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pkl";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else {
        if (!($conn->select_db($dbname))){
            $sql = "CREATE DATABASE $dbname";
            
            if ($conn->query($sql) === FALSE) {
            echo "Error creating database : " . $conn->error;
        }
        }
    }
?>