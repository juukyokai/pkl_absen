<?php
    //Memulai session
    session_start();

    //Cek apakah user sudah login atau belum
    if(isset($_SESSION['login_status']))
    {
        header("Location: userArt.php");
        exit;
    }

    include "proses-data.php";
    if(isset($_POST['login']))
    {
        $username = $_POST['l_username'];
        $password = $_POST['l_password'];

        $result = mysqli_query($conn, "SELECT * FROM akun WHERE username='$username'");

        //Cek username dari database
        if(mysqli_num_rows($result) === 1)
        {
            //Cek kecocokan password
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["PASSWORD"]))
            {
                //Set session login menjadi true
                $_SESSION['login'] = true;

                //Melempar user ke halaman lain
                header("Location: index.php");
                exit;
            }
        }

        $error = true;
    }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Kelas Daring</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-page">
  <div class="form">
    <form class="login-form">
      <input type="text" placeholder="Username"/>
      <input type="password" placeholder="Password"/>
      <button>login</button>
      <p class="message">Tidak Dapat Masuk? Narahubung 082217401318</p>
      <p></p>
      <p class="goback"> <a href="../index.html">Kembali ke Landing Page</a></p>
    </form>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="./script.js"></script>
</body>
</html>
