<?php
    require('db_connect.php');
    $query = "SELECT COUNT(id_kelas) AS jumlah FROM kelas";
    $result = $conn->query($query);
    while($count_student = mysqli_fetch_array($result)){
        echo ($count_student['jumlah']);
    }
    $conn->close();
?>