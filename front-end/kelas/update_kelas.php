<?php
    require('../../back-end/db_connect.php');
    if(isset($_POST['absen_masuk'])){
        $query_cek = "  SELECT 
                            *
                        FROM kbm
                        WHERE id_mhs = $id_mhs AND id_kelas=$id_kelas AND create_at LIKE '$date%'
        ";
        $cek=$conn->query($query_cek);
        if($row_cek = mysqli_fetch_array($cek)){
            header("Location: ". $link);
            exit;
        }else{
            $query_absen =" INSERT INTO
                                kbm (`id_mhs`,`id_kelas`,`absen_awal`,`absen_akhir`)
                            VALUES  ($id_mhs,$id_kelas,1,0)
                    ";
            $query_run = $conn->query($query_absen);
            
            if(mysqli_affected_rows($conn)){
                header("Location: ". $link);
            }else{
                echo "<script>
                        alert('Error Masuk!');
                    </script>";
            }
        }
                
    }
    if(isset($_POST['absen_keluar'])){
        $query_cek = "  SELECT 
                            *
                        FROM kbm
                        WHERE id_mhs = $id_mhs AND id_kelas=$id_kelas AND create_at LIKE '$date%'
        ";
        $cek = $conn->query($query_cek);
        if($row_cek = mysqli_fetch_array($cek)){
            if($row_cek['absen_akhir'] == 0 ){
                $query ="   UPDATE kbm
                            SET absen_akhir = 1
                            WHERE id_mhs = $id_mhs AND id_kelas=$id_kelas AND create_at LIKE '$date%'
                        ";
                $query_run = $conn->query($query);
                if(mysqli_affected_rows($conn) > 0){
                    echo "<script>
                            alert('Kelas Selesai!');
                          </script>";
                }else{
                    echo "<script>
                            alert('Error Keluar!');
                          </script>";
                }
            }else{
                echo "<script>
                        alert('Kelas Telah Selesai!');
                      </script>";
            }
        }else{
            echo "<script>
                        alert('Kelas Belum Dimulai!');
                      </script>";
        }
    }
?>