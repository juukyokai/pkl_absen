<?php
    function load_dos(){
        require('db_connect.php');
        //preparing query
        $sql_dosen =
        
                        "SELECT 
                            *
                        FROM dosen
                        ORDER BY nama_dosen";
                        
        $result = $conn->query($sql_dosen);
        //loop-print table content
        while($row_dosen = mysqli_fetch_array($result)){
            echo ("
            <option value='".$row_dosen['id_dosen']."'>". $row_dosen['nama_dosen']."</option>
            ");
        }
    }
    function load_mhs(){
        require('db_connect.php');
        //preparing query
        $sql_dosen =
        
                        "SELECT 
                            *
                        FROM mahasiswa
                        ORDER BY nama_mhs";
                        
        $result = $conn->query($sql_dosen);
        //loop-print table content
        while($row_dosen = mysqli_fetch_array($result)){
            echo ("
            <option value='".$row_dosen['id_mhs']."'>". $row_dosen['nama_mhs']."</option>
            ");
        }
    }
?>