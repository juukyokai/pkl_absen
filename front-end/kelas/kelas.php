<?php
    session_start();

    
    $timestamp = date("d-m-Y h:i:s");
    $date = date("Y-m-d");
    $time = date("h:i");
    

    $id_kelas = $_GET['id_kelas']; //ganti id_kelas berdasarkan 
    $id_mhs = $_SESSION['id_komplemen']; //ganti id_mhs berdasarkan $_SESSION['id_komplemen'];
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
  <script type="text/javascript" src="../../back-end/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
  <link rel="stylesheet" href="style/c_style.css">
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1>Kelas Daring</h1>
          <h2>Informatika UPN "Veteran" Jawa Timur</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="../mahasiswa_view/index.php">Beranda</a></li>
          <li class="selected"><a href="../mahasiswa_view/class_register.php">Daftar Kelas</a></li>
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
        <ul>
          <?php
              require('../../back-end/db_connect.php');
              $query_link_kelas = " SELECT DISTINCT
                                        kelas.id_kelas,
                                        kelas.link_kelas,
                                        kelas.kode_nama_kelas,
                                        mata_kuliah.sks,
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
                  </div>
              ");
        ?>
        <?php
          require('../../back-end/db_connect.php');
          require('masuk_kelas.php');
          require('keluar_kelas.php');
          // var_dump($date); die;
          $query_cek_absen =" SELECT 
                                  *
                              FROM kbm 
                              WHERE id_kelas = $id_kelas AND id_mhs = $id_mhs AND create_at like '$date %'
                            ";
          $num_rows = mysqli_num_rows(mysqli_query($conn,$query_cek_absen));
          // var_dump($num_rows); die;
          if($num_rows != ""){
            $res_absen = $conn->query($query_cek_absen);
            while($row_absen = mysqli_fetch_array($res_absen)){
              // var_dump($row_absen); die;
              echo ("
                      <style>
                        .visible{
                          display:block;
                        }
                      </style>
                      <div class='visible'>
                        <table style='text-align:center'>
                          <tr>
                            <th> Absen Masuk  </th>
                            <th> Absen Keluar </th>
                          </tr>
                          <tr>
                    ");
                    //cek masuk
                    if($row_absen['absen_awal']==1){
                      echo ("<td id='absen_masuk'>Sudah</td>");
                    }else{
                      echo ("<td id='absen_masuk'>Belum</td>");
                    }
                    //cek keluar
                    if($row_absen['absen_akhir']==1){
                      echo ("<td id='absen_keluar'>Sudah</td>");
                    }else{
                      echo ("<td id='absen_keluar'>Belum</td>");
                    }
              echo ("
                          </tr>
                        </table>
                      </div>
                      <form method='POST'>
                          <input id='but_masuk' type='submit' class='btn btn-success' value='Masuk Kelas' name='masuk_kelas' />
                          <span id='proses_masuk' style='display:none'>Proses...</span>
                          <input id='but_keluar' type='submit' class='btn btn-success' value='Keluar Kelas' name='keluar_kelas' />
                          <span id='proses_masuk' style='display:none'>Proses...</span>
                    </form>
                  ");
            }
          }else{
            echo ("
                    <style>
                      .visible{
                        display:none;
                      }
                    </style>
                    <form method='POST'>
                          <input id='but_masuk' type='submit' class='' value='Masuk Kelas' name='masuk_kelas' />
                          <span id='proses_masuk' style='display:none'>Proses...</span>
                          <input id='but_keluar' type='submit' class='' value='Masuk Kelas' name='keluar_kelas' />
                          <span id='proses_keluar' style='display:none'>Proses...</span>
                    </form>
            ");
          }
          $conn->close();
        ?>
        
    </div>
    <br>
    <footer id="content_footer"></div>
        <div id="footer">
        PRAKTEK KERJA LAPANGAN INFORMATIKA UPN"V"JT 2020 <!--| Copyright &copy;colour_orange--> | <a href="https://github.com/juukyokai/pkl_absen">MORE INFO</a>
        </div>
    </footer>
</body>
</html>
<!-- <script type="text/javascript">
    $("#but_masuk").on("click",function(){
        $("#proses_masuk").show()
        $.ajax({
            type: "POST",
            url: "masuk_kelas.php",
            success: function(msg){
                $("#proses_masuk").show()
                alert("Selesai");
            },
            error: function (msg) {
                    alert("AjaxError");
                }
        });
	  });
    $("#but_keluar").on("click",function(){
        $("#proses_keluar").show()
        $.ajax({
            type: "POST",
            url: "keluar_kelas.php",
            success: function(msg){
                $("#proses_keluar").show()
                $("#but_keluar").prop("disabled",true);
                alert("Selesai");
            },
            error: function (msg) {
                    alert("AjaxError");
                }
        });
	  });
</script> -->
