<?php
  $kelas = $_GET['id_kelas']; //id - kode - nama - kelas $_GET['id_kelas'];
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>Kelas Daring</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
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
          <li><a href="index.php">Beranda</a></li>
          <li class="selected"><a href="class_register.php">Daftar Kelas</a></li>
          <li><a href="http://siamik.upnjatim.ac.id/">SIAMIK</a></li>
          <li><a href="http://ilmu.upnjatim.ac.id/">E-Learning</a></li>
          <li><a href="../../back-end/logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">

      <div id="content">
        <!-- insert the page content here -->
        <h1>List Mahasiswa</h1>
        <?php
            require('../../back-end/load_mk.php');
            print_mk($kelas); //nama matkul dan kode nama kelas
        ?>
        <table border="1" style="width:100%">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Email</th>
            <th>Absen</th>
            <th>Status</th>
          </tr>
          <?php
            require('../../back-end/load_mhs_view.php');
            print_mhs_all($kelas);  // nama absen seluruh mhs dalam kelas
          ?>
        </table>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      PRAKTEK KERJA LAPANGAN INFORMATIKA UPN"V"JT 2020 <!--| Copyright &copy;colour_orange--> | <a href="https://github.com/juukyokai/pkl_absen">MORE INFO</a>
    </div>
  </div>
</body>
</html>
