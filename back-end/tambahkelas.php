<?php
    include('db_connect.php');
	    // $id_mk = $_POST['id_mk'];
        // $id_dosen = $_POST['id_dosen'];
        // $kode_nama_kelas = $_POST['kode_nama_kelas'];
        // $hari_kelas = $_POST['hari_kelas'];
        // $jam_kelas = $_POST['jam_kelas'];
		// $sql_insert = "INSERT INTO `kelas`(id_mk, id_dosen, kode_nama_kelas, hari_kelas, jam_kelas) VALUES ('$id_mk','$id_dosen','$kode_nama_kelas','$hari_kelas','$jam_kelas')";
		// header('location:pkl/pkl_absen/index.php');

		if(!empty($_POST))
		{
			$id_mk = $_POST['id_mk'];
			$id_dosen = $_POST['id_dosen'];
			$kode_nama_kelas = $_POST['kode_nama_kelas'];
			$hari_kelas = $_POST['hari_kelas'];
			$jam_kelas = $_POST['jam_kelas'];
			$query = " INSERT INTO kelas(id_mk, id_dosen, kode_nama_kelas, hari_kelas, jam_kelas)  
			 VALUES('$id_mk','$id_dosen','$kode_nama_kelas','$hari_kelas','$jam_kelas')
			";

			$result = $conn->query($query);
		}
?>