<?php

 require('db_connect.php');
if(isset($_GET["id_kelas"]))
{
	
 $output = '';
	$query = " DELETE FROM kelas WHERE kelas.id_kelas = '".$_GET["id_kelas"]."'
	";
	
	
    if($conn->query($query))
			{
            $output .= '<label class="text-success">Data Berhasil Dihapus</label>';
			$select_query = "SELECT 
			kelas.id_kelas,  
			kelas.kode_nama_kelas,
			kelas.hari_kelas, 
			kelas.jam_kelas,
			dosen.nama_dosen,
			mata_kuliah.nama_mk,
			mata_kuliah.sks FROM kelas,dosen, mata_kuliah
            where kelas.id_mk=mata_kuliah.id_mk && kelas.id_dosen=dosen.id_dosen ORDER BY kode_nama_kelas";
			$result = $conn->query($select_query);
			$output .= '
			<table id="bootstrap-data-table" class="table table-striped table-bordered">               
                                    <thead>
                                        <tr>
                                            
                                            <th>Nama Kelas</th>
                                            <th>Mata Kuliah</th>
                                            <th>SKS</th>
                                            <th>Dosen</th>
                                            <th>Hari</th>
                                            <th>Jam</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
			';
			while($row_kelas = mysqli_fetch_array($result)){
			$output .= '
					<tr>
						<td>' . $row_kelas["kode_nama_kelas"] . '</td>
						<td>' . $row_kelas["nama_mk"] . '</td>
						<td>' . $row_kelas["sks"] . '</td>
						<td>' . $row_kelas["nama_dosen"] . '</td>
						<td>' . $row_kelas["hari_kelas"] . '</td>
						<td>' . $row_kelas["jam_kelas"] . '</td>
						<td>
							<button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target=#"editkelas">
								<i class="fa fa-pencil"></i>
								Edit Kelas
							</button>
						</td>
						<td>
							<button type="button" id="<?php echo $row_kelas["id_kelas"]; ?>" class="btn btn-danger mb-1" data-toggle="modal" data-target="#hapuskelas">
								<i class="fa fa-minus-circle"></i>
								Hapus Kelas
							</button>
						</td>
					</tr>
			';
			}
			$output .= '</table>';
			}else{
				$output .= mysqli_error($conn);
			}
			echo $output;
}
?>