<?php
    require('db_connect.php');
    $query = "SELECT COUNT(id_mhs) AS jumlah FROM mahasiswa";
    $result = $conn->query($query);
    while($count_student = mysqli_fetch_array($result)){
        echo ($count_student['jumlah']);
    }
    $conn->close();
?>