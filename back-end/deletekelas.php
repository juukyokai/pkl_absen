<?php
 

include('db_connect.php');
if(isset($_POST["kode_nama_kelas"]))
{
    $query = " DELETE from kelas where kode_nama_kelas = '".$_POST["kode_nama_kelas"]."' ";
    if($conn->query($query))
    {
     $select_query = "SELECT * FROM kelas ORDER BY kode_nama_kelas DESC";
     $result = $conn->query($select_query);
    }
}
?>