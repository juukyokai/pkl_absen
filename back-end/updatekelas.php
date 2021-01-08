<?php
include('db_connect.php');
          if ($_SERVER['REQUEST_METHOD'] === 'POST')
          {
          $hari_kelas = $_POST['ehari'];
          $jam_kelas = $_POST['ejam'];
            
            $sql = "UPDATE kelas SET hari_kelas='$hari_kelas', jam_kelas='$jam_kelas' WHERE id_kelas='".$_POST["eid"]."'";
    
            $req = $conn->query($sql);
            
            header('Location:../front-end/dosen_view/class-management.php');
          }
        ?>