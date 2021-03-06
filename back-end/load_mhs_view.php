<?php
    function prep_mhs_query($id_mhs,$id_kelas){ 
        $query ="SELECT
                    kbm.id_kbm,
                    AVG(kbm.absen_awal) as kehadiran_awal,
                    AVG(kbm.absen_akhir) as kehadiran_akhir,
                    COUNT(kbm.id_kbm) as jumlah_hadir,
                    mahasiswa.id_mhs,
                    mahasiswa.npm_mhs,
                    mahasiswa.nama_mhs,
                    mahasiswa.email_mhs,
                    kelas.id_kelas
                FROM kbm, mahasiswa, kelas
                WHERE kbm.id_kelas=kelas.id_kelas AND kbm.id_mhs=mahasiswa.id_mhs AND kelas.id_kelas=$id_kelas AND mahasiswa.id_mhs=$id_mhs
                ORDER BY kbm.id_kbm";
        return $query;
    }
    function processing_absen($query){
        //preparing *absen variable
        $abs_awal = 0;      //absen awal
        $abs_akhir = 0;     //absen akhir
        $abs_total = 0;     //absen total
        $jml_hadir = 0;     //jumlah hadir
        $ket = "Non-Aktif";           //keaktifan

        require('db_connect.php');
        $result = $conn->query($query);
        while($row_query = mysqli_fetch_array($result)){
            $abs_awal = $row_query['kehadiran_awal'];
            $abs_akhir = $row_query['kehadiran_akhir'];
            $abs_total = ($abs_awal + $abs_akhir)/2;
            $jml_hadir = $row_query['jumlah_hadir'];
            if ($jml_hadir >= ($jml_hadir * 3/4)){
                $ket = "Aktif";
            }
            echo ("
                    
                        
                        <td>". $row_query['nama_mhs'] ."</td>
                        <td>". $row_query['npm_mhs'] ."</td>
                        <td>". $row_query['email_mhs'] ."</td>
                        <td>". ($abs_total*100) ."%</td>
                        <td>". $ket ."</td>
                                                
                ");
        }
        $conn->close();
    }
    function print_mhs_all($kelas){
        //Inisiasi Variabel
        $iterasi = 1;       //nomor
        //$kelas = 2;         //id kelas
        $default_query ="SELECT DISTINCT
                            kbm.id_mhs,
                            kelas.kode_nama_kelas,
                            mata_kuliah.nama_mk
                        FROM kbm, kelas, mata_kuliah
                        WHERE
                            kbm.id_kelas=kelas.id_kelas
                                AND
                            kelas.id_mk=mata_kuliah.id_mk
                                AND
                            kbm.id_kelas=$kelas             /* kelas G002 */
                        ORDER BY kbm.id_kbm";


        require('db_connect.php');
        //preparing query
        $result = $conn->query($default_query);
        //loop-print table content
        while($row_absen = mysqli_fetch_array($result)){
            echo("
                    <tr>
                    <td>". $iterasi ."</td>
                ");
                    //calling query
                    $prep_query= prep_mhs_query($row_absen['id_mhs'],$kelas);
                    processing_absen(
                        $prep_query
                    );

            echo("
                    </tr>
                ");
            $iterasi = $iterasi + 1;
        }
        $conn->close();
    }
?>