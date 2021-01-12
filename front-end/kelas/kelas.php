<?php
    // if(!isset($_GET['id_kelas'])){
    //   $id_kelas = $_GET['id_kelas'];
    // }
    $id_kelas = 1; //ganti id_kelas berdasarkan $_GET['id_kelas'];
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
          <li><a href="index2.html">Beranda</a></li>
          <li class="selected"><a href="daftarkelas.html">Daftar Kelas</a></li>
          <li><a href="index.html">Kembali ke Halaman Awal</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
        <ul>
          <li><a href="index3.html">Pemrograman Web A</a></li>
          <li><a href="index3.html">Kecerdasan Buatan C</a></li>
          <li><a href="index3.html">Audit TI B</a></li>
          <li><a href="#">link 4</a></li>
          <li><a href="#">link 5</a></li>
          <li><a href="#">link 6</a></li>
          <li><a href="#">link 7</a></li>
          <li><a href="#">link 8</a></li>
          <li><a href="#">link 9</a></li>
        </ul>
      </div>
      <div id="content">
        <!-- insert the page content here -->
        
    </div>
    <footer id="content_footer"></div>
        <div id="footer">
        PRAKTEK KERJA LAPANGAN INFORMATIKA UPN"V"JT 2020 <!--| Copyright &copy;colour_orange--> | <a href="https://github.com/juukyokai/pkl_absen">MORE INFO</a>
        </div>
    </footer>
</body>
</html>
