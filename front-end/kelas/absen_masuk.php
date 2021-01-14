<?php
    session_start();
    $id_mhs = $_SESSION['id_komplemen'];
    $date = date("Y-m-d");
    require('../../back-end/db_connect.php');
    if($_GET['absen'] == 1){
        $id_kelas = $_GET['id_kelas'];
        $query_cek = "  SELECT 
                            *
                        FROM kbm
                        WHERE id_mhs = $id_mhs AND id_kelas=$id_kelas AND create_at LIKE '$date%'
        ";
        if($num_rows = mysqli_num_rows(mysqli_query($conn,$query_cek)) != 0){
            $query_absen =  "   UPDATE kbm
                                SET    absen_awal = 1
                                WHERE  id_kelas = $id_kelas AND id_mhs = $id_mhs AND create_at like '$date%'
                            ";  
            $conn->query($query_absen);
            if(mysqli_affected_rows($conn)){
                header("Location: kelas.php?id_kelas=$id_kelas");
                exit;
            }else{
                echo "<script>
                        alert('Error Masuk!');
                    </script>";
            }
        }        
    }
    $conn->close();
?>