<?php
    require('db_connect.php');
    //preparing query
    $sql_dosen =    //"SELECT * FROM kelas";
    
                    "SELECT 
                        nama_dosen
                    FROM dosen
                    ORDER BY nama_dosen";
                    
    $result = $conn->query($sql_dosen);
    //loop-print table content
    while($row_dosen = mysqli_fetch_array($result)){
        echo ("
        <option value='".$row_dosen['nama_dosen']."'>". $row_dosen['nama_dosen']."</option>
        ");
    }
    
    

?>