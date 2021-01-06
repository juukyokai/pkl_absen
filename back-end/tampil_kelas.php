<?php
    require('db_connect.php');
    //preparing query
    $sql_kelas =    //"SELECT * FROM kelas";
    
                    "SELECT 
                        kelas.id_kelas,  
                        kelas.kode_nama_kelas,
                        kelas.hari_kelas, 
                        kelas.jam_kelas,
                        dosen.nama_dosen,
                        mata_kuliah.nama_mk,
                        mata_kuliah.sks
                    FROM kelas,dosen, mata_kuliah
                    where kelas.id_mk=mata_kuliah.id_mk && kelas.id_dosen=dosen.id_dosen";
                    
    $result = $conn->query($sql_kelas);
    //loop-print table content
    while($row_kelas = mysqli_fetch_array($result)):?>
        <tr>
            <td> <span class='name'><?php echo $row_kelas['kode_nama_kelas'] ?></span> </td>
            <td> <span class='name'><?php echo $row_kelas['nama_mk'] ?></span> </td>
            <td> <span class='count'><?php echo $row_kelas['sks'] ?></span> </td>
            <td> <span class='name'><?php echo $row_kelas['nama_dosen'] ?></span> </td>
            <td><span class='product'><?php echo $row_kelas['hari_kelas'] ?></span></td>
            <td><span class=><?php echo $row_kelas['jam_kelas'] ?></span></td>
            <td>
                <button type='button' class='btn btn-primary mb-1' data-toggle='modal' data-target='#editkelas'>
                    <i class='fa fa-pencil'></i>
                    Edit Kelas
                </button>
                <button type='button' class='btn btn-danger mb-1' data-toggle='modal' data-target='#hapuskelas'>
                    <i class='fa fa-minus-circle'></i>
                    Hapus Kelas
                </button>
            </td>
        </tr>

        
    <?php endwhile;

?>