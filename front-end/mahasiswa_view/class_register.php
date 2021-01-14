<?php
  session_start();
  $id_mhs = $_SESSION['id_komplemen']; //$_SESSION['id_komplemen'];
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
      <div class="sidebar">
        <!-- insert your sidebar items here -->
          </p>
        </form>
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>Daftar Kelas</h1>
        <table border="1">
          <tr>
            <th>No</th>
            <th>Nama Kelas</th>
            <th>SKS</th>
            <th>List Mahasiswa</th>
            <th>Link Kelas</th>
          </tr>
<?php
        require('../../back-end/db_connect.php');
        $query_mhs_kelas = " SELECT DISTINCT
                                  kelas.id_kelas,
                                  kelas.link_kelas,
                                  kelas.kode_nama_kelas,
                                  mata_kuliah.sks,
                                  mata_kuliah.nama_mk
                              FROM kbm,kelas,mata_kuliah
                              WHERE kbm.id_kelas = kelas.id_kelas AND kelas.id_mk=mata_kuliah.id_mk AND kbm.id_mhs = $id_mhs
                            ";
        $iterasi = 1;
        $res_mhs_kelas = $conn->query($query_mhs_kelas);
        while($row_mhs = mysqli_fetch_array($res_mhs_kelas)){
          echo ("
                <tr>
                  <td>". $iterasi ."</td>
                  <td>". $row_mhs['nama_mk'] ." - ". $row_mhs['kode_nama_kelas'] ."</td>
                  <td>". $row_mhs['sks'] ."</td>
                  <td><a href='class_content.php?id_kelas=". $row_mhs['id_kelas'] ."'>lihat</a></td>
                  <td><a href='../kelas/kelas.php?id_kelas=". $row_mhs['id_kelas'] ."'>link</a></td>
                </tr>
          ");
          $iterasi = $iterasi + 1;
        }
        $conn->close();
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
