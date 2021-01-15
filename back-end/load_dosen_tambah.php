<?php
    require('db_connect.php');
    session_start();
    $id = $_SESSION['id_komplemen']; 
    //preparing query
    $sql_dosen =    //"SELECT * FROM kelas";
    
                    "SELECT 
                        id_dosen,
                        nama_dosen
                    FROM dosen WHERE dosen.id_dosen=$id
                    ORDER BY nama_dosen";
                    
    $result = $conn->query($sql_dosen);
    //loop-print table content
    while($row_dosen = mysqli_fetch_array($result)){
        echo ("
        <option value='".$row_dosen['id_dosen']."'>". $row_dosen['nama_dosen']."</option>
        ");
    }
?>