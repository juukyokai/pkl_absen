<?php
    require('db_connect.php');
    $query = "SELECT COUNT(id_mk) AS jumlah FROM mata_kuliah";
    $result = $conn->query($query);
    while($count_student = mysqli_fetch_array($result)){
        echo ($count_student['jumlah']);
    }
    $conn->close();
?>