<?php
    session_start();
    //Cek apakah user sudah login atau belum
    if(!isset($_SESSION['login_status']))
    {
        header("Location: ../login/index.php");
        exit;
    }
    $id = $_SESSION['id_komplemen']; 
    
    require('../../back-end/db_connect.php');
    $prep_query = " SELECT
                        mahasiswa.nama_mhs,
                        mahasiswa.npm_mhs,
                        mahasiswa.email_mhs,
                        mahasiswa.status_mhs,
                        jurusan.nama_jurusan
                    FROM mahasiswa,jurusan
                    WHERE mahasiswa.id_jurusan = jurusan.id_jurusan AND mahasiswa.id_mhs = $id
    ";
    $result = $conn->query($prep_query);
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>Kelas Daring UPN"V"JT</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style\style.css" title="style" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1>Kelas Daring</a></h1>
          <h2>Informatika UPN "Veteran" Jawa Timur</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="index.php">Beranda</a></li>
          <li><a href="class_register.php">Daftar Kelas</a></li>
          <li><a href="http://siamik.upnjatim.ac.id/">SIAMIK</a></li>
          <li><a href="http://ilmu.upnjatim.ac.id/">E-Learning</a></li>
          <li><a href="../../back-end/logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
          </p>
        </form>
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>Selamat Datang</h1>
        <?php
            while($row_data_mhs = mysqli_fetch_array($result)){
              echo "
                      Nama    : ". $row_data_mhs['nama_mhs'] ."</p>
                      <p>NPM     : ". $row_data_mhs['npm_mhs'] ."</p>
                      <p>Email   : ". $row_data_mhs['email_mhs'] ."</p>
                      <p>Jurusan : ". $row_data_mhs['nama_jurusan'] ."</p>
              ";
              if($row_data_mhs['status_mhs'] == 1){
                echo "<p>Status  : Aktif</p>";
              }else{
                echo "<p>Status  : Non-Aktif</p>";
              }
            }
            

        ?>
        <h2>Browser yang Kompatibel</h2>
        <p>Web ini bisa diakses melalui:</p>
        <ul>
          <li>Microsoft Edge</li>
          <li>Mozilla Firefox</li>
          <li>Google Chrome</li>
          <li>Safari</li>
          <li>Opera</li>
        </ul>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
    PRAKTEK KERJA LAPANGAN INFORMATIKA UPN"V"JT 2020 <!--| Copyright &copy;colour_orange--> | <a href="https://github.com/juukyokai/pkl_absen">MORE INFO</a>
     
    </div>
  </div>
</body>
</html>
