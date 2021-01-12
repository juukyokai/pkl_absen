<?php
    require('../db_connect.php');
    $id = $_SESSION['id_komplemen'];
    //preparing query
    $sql_kelas =    //"SELECT * FROM kelas";
    
                    "SELECT kbm
                    FROM kelas,dosen, mata_kuliah
                    where kelas.id_mk=mata_kuliah.id_mk && kelas.id_dosen=dosen.id_dosen && dosen.id_dosen=$id ORDER BY kode_nama_kelas";
                    
    $result = $conn->query($sql_kelas);
    //loop-print table content
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
          <li><a href="daftarkelas.html">Daftar Kelas</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">

      <div id="content">
        <!-- insert the page content here -->
        <h1>List Mahasiswa</h1>
        <h4>Pemrograman Web A</h4>
        <table border="1">
          <tr>
            <td>No</td>
            <td>Nama</td>
            <td>NPM</td>
            <td>Status</td>
          </tr>
          <tr>
            <td>1</td>
            <td>M. Faisal R.</td>
            <td>18081010001</td>
            <td>Aktif</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Elang Eka M. P.</td>
            <td>18081010068</td>
            <td>Aktif</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Dimas Amrulloh</td>
            <td>18081010125</td>
            <td>Aktif</td>
          </tr>
          <tr>
            <td>4</td>
            <td>Fahmi A.D.</td>
            <td>18081010128</td>
            <td>Aktif</td>
          </tr>                                         
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
