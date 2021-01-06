<?php
session_start();
$connect = mysqli_connect("localhost","root","","pkl_user");

if(isset($_POST['button'])){
$id_komplemen = $_POST['id_komplemen'];
$username = $_POST['username'];
$password = $_POST['password'];
$tipe_user = $_POST['tipe_user'];    
    
    
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $query_run = mysqli_query($connect, $query);

    if(mysqli_fetch_array($query_run)){
        header('Location:index2.html');
    }
    else{
        header('Location:index3.php');
    }

}

if(isset($_POST['user'])){
    $id_komplemen = $_POST['id_komplemen'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $tipe_user = $_POST['tipe_user'];  
        
        
        $query = "INSERT INTO user (id_komplemen,username,password,tipe_user) VALUES ('$id_komplemen','$username','$password','$tipe_user')";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run){
            header('Location:index3.php');
        }
        else{
            header('Location:daftar.php');
        }
    
    }
?>