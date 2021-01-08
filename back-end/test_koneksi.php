<?php
    //using namespace for xampp default user
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pkl_absen";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else {
        if (!($conn->select_db($dbname))){
            $sql = "CREATE DATABASE $dbname";
            
            if ($conn->query($sql) === FALSE) {
            echo "Error creating database : " . $conn->error;
        }
        }
    }
    $default_query ="SELECT DISTINCT
                        kbm.id_mhs
                    FROM kbm, kelas
                    WHERE
                        kbm.id_kelas=kelas.id_kelas     /*   kbm <-> kelas   */
                            AND
                        kbm.id_kelas=5             /* kelas G002 */
                            AND 
                        kelas.id_dosen=1                /* dosen Jefri */
                    ORDER BY kbm.id_kbm";

    
    //preparing query
    $result = $conn->query($default_query);
    //loop-print table content
    while($row_absen = mysqli_fetch_array($result)){
        echo ($row_absen['id_mhs']);
    }
?>