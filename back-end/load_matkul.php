<?php
    require('db_connect.php');
    //preparing query
    $sql_dosen =
    
                    "SELECT 
                        id_mk,
                        nama_mk
                    FROM mata_kuliah
                    ORDER BY nama_mk";
                    
    $result = $conn->query($sql_dosen);
    //loop-print table content
    while($row_dosen = mysqli_fetch_array($result)){
        echo ("
        <option value='".$row_dosen['id_mk']."'>". $row_dosen['nama_mk']."</option>
        ");
    }
    
    

?>