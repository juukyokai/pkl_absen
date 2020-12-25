<?php
    require('db_connect.php');
    //preparing query
    $sql_kelas = "SELECT 
                        kelas.id_kelas,  
                        kelas.kode_nama_kelas, 
                        kelas.hari_kelas, 
                        kelas.jam_kelas,
                        mata_kuliah.nama_mk, 
                        mata_kuliah.sks,
                        mata_kuliah.status_mk,
                        dosen.nama_dosen
                    FROM kelas 
                    INNER JOIN mata_kuliah, dosen
                    ON kelas.id_mk=mata_kuliah.id_mk AND kelas.id_dosen=dosen.id_dosen";
    $result = $conn->query($sql_kelas);
    $iterasi = 1;
    //loop-print table content
    while($row_kelas = mysqli_fetch_array($result)){
        echo ("
        <tr>
            <td class='serial'>". $iterasi .".</td>
            <td> #". $row_kelas['id_kelas'] ." </td>
            <td> <span class='name'>". $row_kelas['nama_mk'] ." - ". $row_kelas['kode_nama_mk'] ."</span> </td>
            <td> <span class='count'>". $row_kelas['sks'] ."</span> </td>
            <td> <span class='name'>". $row_kelas['nama_dosen'] ."</span> </td>
            <td><span class='product'>". $row_kelas['hari_kelas'] ."</span></td>
            <td><span class='>". $row_kelas['jam_kuliah'] ."</span></td>
            <td>");
            if($row_kelas['status']){
                
            }
            <span class='badge badge-pending'>Active</span>
            
            echo("</td>
        </tr>
        ");
    }
    


?>