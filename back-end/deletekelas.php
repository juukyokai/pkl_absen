<?php
    require('db_connect.php');
 
    $id_kelas=$_POST['id_kelas'];
    
    $query = "DELETE from riwayat_pendidikan where id_riwayat =$id"; 
    $result = $conn->query($query);
    
    echo"<meta http-equiv='refresh' content='0; url=modal-form.php'>";
    
?>