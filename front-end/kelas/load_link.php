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
        echo ("<li><a href='". $row_link['link_kelas'] ."?id_kelas=". $row_link['id_kelas'] ."'>". $row_link['nama_mk'] ." - ". $row_link['kode_nama_kelas'] ."</a></li>");
    }
    $conn->close();
?>