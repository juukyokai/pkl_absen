<?php
require('db_connect.php');
// $connect = mysqli_connect("localhost","root","","pkl");

if(isset($_POST['masuk'])){
    //$id_komplemen = $_POST['id_komplemen'];
    //$tipe_user = $_POST['tipe_user'];
    $_SESSION['login_status'] = false;
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    
    
    $query = "SELECT username,password,id_komplemen,tipe_user FROM user WHERE username = '$username'";
    $result = $conn->query($query);
    
    if($row_login = mysqli_fetch_array($result)){
        if(strcmp($row_login['password'],$password) == 0){
            if($row_login['tipe_user'] == 1 || $row_login['tipe_user'] == 0){
                $_SESSION['username'] = $username;
                $_SESSION['id_komplemen'] = $row_login['id_komplemen'];
                $_SESSION['login_status'] = true;
                echo "<script>
                        alert('Selamat Datang ". $username ."!');
                      </script>";
                header('Location: ../dosen_view/index.php');
                exit;
            }else if($row_login['tipe_user'] == 2){
                $_SESSION['username'] = $username;
                $_SESSION['id_komplemen'] = $row_login['id_komplemen'];
                $_SESSION['login_status'] = true;
                echo "<script>
                        alert('Selamat Datang ". $username ."!');
                      </script>";
                header('Location: ../mahasiswa_view/index.php');
                exit;
            }
        }else{
            echo "<script>
                    alert('Password Salah!');
                  </script>";
        }
        
    }
    else{    
        echo "<script>
                    alert('Username Tidak Terdaftar!');
              </script>";
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
            header('Location:index.php');
        }
        else{
            header('Location:daftar.php');
        }
    
    }
?>