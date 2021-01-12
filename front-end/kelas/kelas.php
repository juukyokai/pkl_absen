<?php
    session_start();
    // if(!isset($_GET['id_kelas'])){
    //   $id_kelas = $_GET['id_kelas'];
    // }
    $id_kelas = $_GET['id_kelas'];; //ganti id_kelas berdasarkan 
    $id_mhs = 1; //ganti id_mhs berdasarkan $_SESSION['id_komplemen'];
    require('../../back-end/db_connect.php');
    $prep_query_dosen = " SELECT
                              kelas.kode_nama_kelas,
                              kelas.link_kelas,
                              kelas.hari_kelas,
                              kelas.jam_kelas,
                              dosen.nama_dosen,
                              dosen.nip_dosen,
                              dosen.email_dosen,
                              mata_kuliah.nama_mk
                          FROM kelas,dosen,mata_kuliah
                          WHERE kelas.id_dosen = dosen.id_dosen AND kelas.id_mk = mata_kuliah.id_mk AND kelas.id_kelas = $id_kelas
                        ";
    $result = $conn->query($prep_query_dosen);
    while($row_kelas = mysqli_fetch_array($result)){
      $kode_kelas = $row_kelas['kode_nama_kelas'];
      $nama_mk = $row_kelas['nama_mk'];
      $hari = $row_kelas['hari_kelas'];
      $jam = $row_kelas['jam_kelas'];
      $link = $row_kelas['link_kelas'];
      $nama_dos = $row_kelas['nama_dosen'];
      $nip_dos = $row_kelas['nip_dosen'];
      $email_dos = $row_kelas['email_dosen'];
    }
    $conn->close();
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Kelas Daring</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
  <link rel="stylesheet" href="style/c_style.css">
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
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
        <ul>
          <?php
              require('../../back-end/db_connect.php');
              $query_link_kelas = " SELECT DISTINCT
                                        kelas.id_kelas,
                                        kelas.link_kelas,
                                        kelas.kode_nama_kelas,
                                        mata_kuliah.nama_mk
                                    FROM kbm,kelas,mata_kuliah
                                    WHERE kbm.id_kelas = kelas.id_kelas AND kelas.id_mk=mata_kuliah.id_mk AND kbm.id_mhs = $id_mhs
                                  ";
              $res_link = $conn->query($query_link_kelas);
              while($row_link = mysqli_fetch_array($res_link)){
              echo ("<li><a href='kelas.php?id_kelas=". $row_link['id_kelas'] ."'>". $row_link['nama_mk'] ." - ". $row_link['kode_nama_kelas'] ."</a></li>");
              }
              $conn->close();
          ?>
        </ul>
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <div class="row">
          <div class="column third">
              <!-- Picture Copyright @fik.upnjatim.ac.id -->
              <img width="178" height="178" src="https://fik.upnjatim.ac.id/wp-content/uploads/2020/09/Eva_A1.jpg" alt=""/>
          </div>
<?php
  echo ("
          <div class='column'>
            <div class='row'>
              <div class='column quarter'>
                <h4>Dosen :</h4>
              </div>
              <div class='column'>
                <p>Nama : ". $nama_dos ."</p>
                <p>NIP  : ". $nip_dos ."</p>
                <p>Email: ". $email_dos ."</p>
              </div>
            </div>  
          </div>
  ");
?>
        </div>
        <?php
          echo ("
                  <div>
                      <h4>Kelas :</h4>
                      <p>". $nama_mk ." - ". $kode_kelas ."</p>
                      <p>". $hari .", ". $jam ."</p>
                      <p>Link Kelas : <a href='#'>". $link ."</a></p>
                  </div>
              ");
        ?>
    </div>
    <footer id="content_footer"></div>
        <div id="footer">
        PRAKTEK KERJA LAPANGAN INFORMATIKA UPN"V"JT 2020 <!--| Copyright &copy;colour_orange--> | <a href="https://github.com/juukyokai/pkl_absen">MORE INFO</a>
        </div>
    </footer>
</body>
</html>
