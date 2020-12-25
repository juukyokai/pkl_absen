<?php 
    require ('db_connect.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id_mk = $_POST['id_mk'];
        $id_dosen = $_POST['id_dosen'];
        $kode_nama_kelas = $_POST['kode_nama_kelas'];
        $hari_kelas = $_POST['hari_kelas'];
        $jam_kelas = $_POST['jam_kelas'];

        $sql = "INSERT INTO kelas (id_mk, id_dosen, kode_nama_kelas, hari_kelas, jam_kelas) 
                VALUES('$id_mk','$id_dosen','$kode_nama_kelas','$hari_kelas','$jam_kelas')";
        $res = mysqli_query(connection(),$sql);
    
    // apakah query simpan berhasil?
    if( $res ) {
        // kalau berhasil alihkan ke halaman tanda terima dengan status=sukses
      header('Location: tandaterima_barang.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman tanda terima dengan status=gagal
        header('Location: tandaterima_barang.php?status=gagal');
    }


}
?>