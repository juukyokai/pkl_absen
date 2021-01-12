<?php
    function load_dos(){
        //preparing query
        $sql_dosen =
                        "SELECT 
                            id_dosen as id,
                            nama_dosen as nama
                        FROM dosen";
        return $sql_dosen;
    }
    function load_mhs(){
        //preparing query
        $sql_mhs =     "SELECT 
                            id_mhs as id,
                            nama_mhs as nama
                        FROM mahasiswa";
        return $sql_mhs;        
    }
    //melakukan pengecekan apakah ada variable GET yang dikirim
    require('db_connect.php');
    $tipe_user = $_GET['tipe_user'];

    if($tipe_user == 1){
        $query=load_dos();
    }else if($tipe_user == 2){
        $query=load_mhs();
    }else{
        
    }
    $result = $conn->query($query);
    while($row = mysqli_fetch_array($result)){
        echo "<option value='". $row['id'] ."'>". $row['nama'] ."</option>";
    }
?>