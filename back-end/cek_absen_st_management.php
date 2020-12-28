<?php
    function prepare_query($id_mhs,$id_kelas){ 
        $query ="SELECT
                    kbm.id_kbm,
                    AVG(kbm.absen_awal) as kehadiran_awal,
                    AVG(kbm.absen_akhir) as kehadiran_akhir,
                    COUNT(kbm.id_kbm) as jumlah_hadir,
                    mahasiswa.id_mhs,
                    mahasiswa.npm_mhs,
                    mahasiswa.nama_mhs,
                    mahasiswa.email_mhs,
                    kelas.kode_nama_kelas,
                    mata_kuliah.nama_mk
                FROM kbm, mahasiswa, kelas, dosen, mata_kuliah
                WHERE kbm.id_kelas=kelas.id_kelas AND kelas.id_mk=mata_kuliah.id_mk AND kbm.id_mhs=mahasiswa.id_mhs AND kelas.id_kelas=2 AND mahasiswa.id_mhs=1
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
        require('db-connect.php');
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
                <tr>
                    <td>". $row_absen['nama_mhs'] ."</td>
                    <td>". $row_absen['npm_mhs'] ."</td>
                    <td>". $row_absen['nama_mk'] ." - ". $row_absen['kode_nama_kelas'] ."</td>
                    <td>". $row_absen['email_mhs'] ."</td>
                    <td>". ($abs_total*100) ."%</td>
                    <td>". $ket ."</td>
                </tr>
                ");
        }
    }

    $default_query ="SELECT
                        kbm.id_kbm,
                        mahasiswa.id_mhs,
                        mata_kuliah.nama_mk
                    FROM kbm, mahasiswa, kelas, dosen, mata_kuliah
                    WHERE kbm.id_kelas=kelas.id_kelas AND kelas.id_mk=mata_kuliah.id_mk AND kbm.id_mhs=mahasiswa.id_mhs AND kelas.id_kelas=2 AND mahasiswa.id_mhs=1
                    ORDER BY kbm.id_kbm";


    require('db_connect.php');
    //preparing query
    $result = $conn->query($default_query);
    //loop-print table content
    while($row_absen = mysqli_fetch_array($result)){
        
    }
    $conn->close();
    

?>