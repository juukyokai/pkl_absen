<?php

 require('db_connect.php');
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		//query SQL
		$id_kelas=$_GET['id_kelas'];
		$query = " DELETE FROM kelas WHERE kelas.id_kelas = '".$_GET["id_kelas"]."'"; 

		//eksekusi query
		$req = $conn->query($query);
		
		header('Location:../front-end/dosen_view/class-management.php');
		$conn->close();
}
?>