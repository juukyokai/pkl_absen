<?php
    require('db_connect.php');
    $query = "SELECT COUNT(id_jurusan) AS jumlah FROM jurusan";
    $result = $conn->query($query);
    while($count_student = mysqli_fetch_array($result)){
        echo ($count_student['jumlah']);
    }
    $conn->close();
?>