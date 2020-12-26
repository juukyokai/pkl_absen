<?php
    include('db_connect.php');
	    $id_mk = $_POST['I_MK'];
        $id_dosen = $_POST['I_DOSEN'];
        $kode_nama_kelas = $_POST['I_KNK'];
        $hari_kelas = $_POST['I_HARI'];
        $jam_kelas = $_POST['I_JAM'];
	$sql_insert = "INSERT INTO `kelas`(`id_mk`, `id_dosen`, `kode_nama_kelas`, `hari_kelas`, `jam_kelas`) VALUES ('$id_mk','$id_dosen','$kode_nama_kelas','$hari_kelas','$jam_kelas')";
	if ($conn->query($sql_insert) === FALSE) {
		echo "Error inserting into database : " . $conn->error;
	}
	$conn->close();
?>