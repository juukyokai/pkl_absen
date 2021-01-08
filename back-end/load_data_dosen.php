<?php
    session_start(); //memulai session
    $id = $_SESSION['id_komplemen'];
    //function prepare query
    function load_dosen_query($id){
        $prep_query = "SELECT * FROM dosen WHERE id_dosen = $id";
        return $prep_query;
    }

    require('db_connect.php'); //mounting db connection
    $query = load_dosen_query($id);
    $result = $conn->query($query);
    while($load_data = mysqli_fetch_array($result)){
        echo ($load_data['nama_dosen']);
        echo ($load_data['nip_dosen']);
        echo ($load_data['email_dosen']);
        if($load_data['status_dosen']==1){
            echo "Active";
        }else {
            echo "Non-Active";
        }
    }
    $conn->close();
?>