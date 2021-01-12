<?php
include('db_connect.php');
          if ($_SERVER['REQUEST_METHOD'] === 'POST')
          {
          $link_kelas = $_POST['elink'];
          $hari_kelas = $_POST['ehari'];
          $jam_kelas = $_POST['ejam'];
            
            $sql = "UPDATE kelas SET link_kelas='$link_kelas', hari_kelas='$hari_kelas', jam_kelas='$jam_kelas' WHERE id_kelas='".$_POST["eid"]."'";
    
            $req = $conn->query($sql);
            
            $conn->close();
          }
        ?>