<?php
    include('db_connect.php');
		if(!empty($_POST))
		{
		$output = '';
			$id_mk = $_POST['id_mk'];
			$id_dosen = $_POST['id_dosen'];
			$kode_nama_kelas = $_POST['kode_nama_kelas'];
			$hari_kelas = $_POST['hari_kelas'];
			$jam_kelas = $_POST['jam_kelas'];
			$query = " INSERT INTO kelas(id_mk, id_dosen, kode_nama_kelas, hari_kelas, jam_kelas)  
			 VALUES('$id_mk','$id_dosen','$kode_nama_kelas','$hari_kelas','$jam_kelas')
			";
			if($conn->query($query))
			{
			
			}else{
				$output .= mysqli_error($conn);
			}
			echo $output;
		}
?>