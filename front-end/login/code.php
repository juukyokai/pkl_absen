<?php
session_start();
require('db_connect.php');
// $connect = mysqli_connect("localhost","root","","pkl");

if(isset($_POST['button'])){
    $id_komplemen = $_POST['id_komplemen']; 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $tipe_user = $_POST['tipe_user'];    
    
    
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $query_run = $conn->query($query);

    if(mysqli_fetch_array($query_run)){
        header('Location:../mahasiswa_view/index.html');
    }
    else{
        header('Location:index.php');
    }

}

if(isset($_POST['daftar'])){
    $id_komplemen = $_POST['id_komplemen'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $tipe_user = $_POST['tipe_user'];  
        
        
        $query = "INSERT INTO user (id_komplemen,username,password,tipe_user) VALUES ('$id_komplemen','$username','$password','$tipe_user')";
        $query_run = $conn->query($query);
    
        if($query_run){
            header('Location:index3.php');
        }
        else{
            header('Location:daftar.php');
        }
    
    }
?>