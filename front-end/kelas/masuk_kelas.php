<?php
    if(isset($_POST['masuk_kelas'])){
        $query_cek = "  SELECT 
                            *
                        FROM kbm
                        WHERE id_mhs = $id_mhs AND id_kelas=$id_kelas AND create_at LIKE '$date%'
        ";
        if($num_rows = mysqli_num_rows(mysqli_query($conn,$query_cek)) == 0){
            $query_absen =" INSERT INTO
                                kbm (`id_mhs`,`id_kelas`,`absen_awal`,`absen_akhir`)
                            VALUES  ($id_mhs,$id_kelas,1,0)
                    ";
            $query_run = $conn->query($query_absen);
            if(mysqli_affected_rows($conn)){
                header("Location: ". $link);
                exit;
            }else{
                echo "<script>
                        alert('Error Masuk!');
                    </script>";
            }
        }else{
            header("Location: ". $link);
            exit;
        }
    }
?>