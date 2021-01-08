<?php
include('db_connect.php');
          if ($_SERVER['REQUEST_METHOD'] === 'POST')
          {
          $id_mk = $_POST['id_mk'];
          $id_dosen = $_POST['id_dosen'];
          $kode_nama_kelas = $_POST['kode_nama_kelas'];
          $hari_kelas = $_POST['hari_kelas'];
          $jam_kelas = $_POST['jam_kelas'];
            
            $sql = "UPDATE kelas SET id_mk='$id_mk', id_dosen='$id_dosen', kode_nama_kelas='$kode_nama_kelas', 
            hari_kelas='$hari_kelas', jam_kelas='$jam_kelas' WHERE id_kelas='".$_POST["id_kelas"]."'";
    
            $req = $conn->query($sql);
            
          }
        ?>