<?php
    function prep_mk_query($prep){
        $prep_query ="SELECT 
                        kelas.kode_nama_kelas,
                        mata_kuliah.nama_mk
                    FROM kelas, mata_kuliah
                    WHERE
                        kelas.id_mk=mata_kuliah.id_mk
                            AND
                        kelas.id_kelas=$prep             /* kelas G002 */
                    ORDER BY kelas.id_kelas";
        return $prep_query;
    }
    
    function print_mk($id_kelas){
        require('db_connect.php');
        $query=prep_mk_query($id_kelas);
        //preparing query
        $result = $conn->query($query);
        //loop-print table content
        while($row_absen = mysqli_fetch_array($result)){
            echo("
                    <h4>". $row_absen['nama_mk'] ." - ". $row_absen['kode_nama_kelas'] ."</h4>  <!-- Nama MK -->
                ");
        }
        $conn->close();
    }
?>