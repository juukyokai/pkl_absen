<?php
    if(isset($_POST['keluar_kelas'])){
        $time_now = date("Y-m-d H:i:s");
        $query_cek = "  SELECT 
                            *
                        FROM kbm
                        WHERE id_mhs = $id_mhs AND id_kelas=$id_kelas AND create_at LIKE '$date%'
        ";
        if($num_rows = mysqli_num_rows(mysqli_query($conn,$query_cek)) != 0){
            $cek=$conn->query($query_cek); 
            if($row_cek = mysqli_fetch_array($cek)){
                $timestamp = $row_cek['create_at'];
                $dt = new DateTimeImmutable($timestamp, new DateTimeZone("Asia/Jakarta"));
                echo "Start: ", $dt->format("Y-m-d H:i:s"), PHP_EOL;
                $dt = $dt->modify("+2 hours 30 minutes");
                echo "End:   ", $dt->format("Y-m-d H:i:s"), PHP_EOL;
                // die;
                if(strcmp($time_now,$dt->format("Y-m-d H:i:s")) > 0){
                    $query_absen =  "   UPDATE kbm
                                SET    absen_akhir = 1
                                WHERE  id_kelas = $id_kelas AND id_mhs = $id_mhs AND create_at like '$date%'
                            ";  
                    $conn->query($query_absen);
                    if(mysqli_affected_rows($conn)){
                        header("Location: kelas.php?id_kelas=$id_kelas");
                        exit;
                    }else{
                        echo "<script>
                                alert('Error keluar!');
                            </script>";
                    }
                }else if(strcmp($time_now,$dt->format("Y-m-d H:i:s")) < 0){
                    echo "<script>
                                alert('Kelas Masih Berlangsung!');
                            </script>";
                }
                else{
                    echo "<script>
                                alert('Kelas Selesai!');
                            </script>";
                }
            }else{
                    echo "<script>
                        alert('Error Keluar!');
                    </script>";
            }
        }
            
    }       
?>