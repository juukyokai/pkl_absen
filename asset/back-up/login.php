<?php
    //Memulai session
    session_start();

    //Cek apakah user sudah login atau belum
    if(isset($_SESSION['login_status']))
    {
      if($_SESSION['login_u_type'] == 1){
        header("Location: ../front-end/dosen_view/index.php");
      }else if($_SESSION['login_u_type'] == 2){
        header("Location: ../front-end/mahasiswa_view/index.php");
      }else{
        header("Location: ../index.html");
        exit;
      }
    }

    if(isset($_POST['login']))
    {
        $username = $_POST['l_username'];
        $password = $_POST['l_pass'];

        $result = $conn->query("SELECT * FROM user WHERE username='$username'");

        //Cek username dari database
        if(mysqli_num_rows($result) === 1)
        {
          header("Location: ../../index.php");
            //Cek kecocokan password
            $row = mysqli_fetch_assoc($result);
            if($password == $row["password"])
            {
                //Set session login menjadi true
                $_SESSION['login_status'] = true;
                $_SESSION['login_u_type'] = $row['id_komplemen'];
                //Melempar user ke halaman lain
                header("Location: ../../index.php");
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
      <?php if(isset($error)) : ?>
          <p style="color:red"><b>Username / Password salah!</b></p>
      <?php endif;?>
      <input name="l_username" type="text" placeholder="Username" required>
      <input name="l_pass" type="password" placeholder="Password" required>
      <button type="submit" name="login">login</button>
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
