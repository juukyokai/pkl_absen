<?php
    require('db_connect.php');
    $id = $_SESSION['id_komplemen'];
    //preparing query
    $sql_kelas =    //"SELECT * FROM kelas";
    
                    "SELECT 
                        kelas.id_kelas,  
                        kelas.kode_nama_kelas, 
                        kelas.hari_kelas, 
                        kelas.jam_kelas,
                        mata_kuliah.nama_mk, 
                        mata_kuliah.sks,
                        mata_kuliah.status_mk,
                        dosen.nama_dosen
                    FROM kelas, mata_kuliah, dosen
                    WHERE kelas.id_mk=mata_kuliah.id_mk AND kelas.id_dosen=dosen.id_dosen AND dosen.id_dosen=$id
                    ORDER BY kelas.id_kelas";
                    
    $result = $conn->query($sql_kelas);
    $iterasi = 1;
    //loop-print table content
    while($row_kelas = mysqli_fetch_array($result)){
        echo ("
        <tr>
            <td class='serial'>". $iterasi .".</td>
            <td> #". $row_kelas['id_kelas'] ." </td>
            <td> <span class='name'>". $row_kelas['nama_mk'] ." - ". $row_kelas['kode_nama_kelas'] ."</span> </td>
            <td> <span class='count'>". $row_kelas['sks'] ."</span> </td>
            <td> <span class='name'>". $row_kelas['nama_dosen'] ."</span> </td>
            <td><span class='product'>". $row_kelas['hari_kelas'] ."</span></td>
            <td><span class=>". $row_kelas['jam_kelas'] ."</span></td>
            <td>");
            if($row_kelas['status_mk']==1){
                echo("<span class='badge badge-pending'>Active</span>");
            }else if($row_kelas['status_mk']==2){
                echo("<span class='badge badge-complete'>Complete</span>");
            }else{
                echo("<span class='badge badge-pending'>Error</span>");
            }
        echo("</td>
        </tr>
        ");
        $iterasi=$iterasi+1;
    }
    $conn->close();
    

?>