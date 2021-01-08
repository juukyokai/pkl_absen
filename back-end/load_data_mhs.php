<?php
    session_start(); //memulai session
    $id = $_SESSION['id_komplemen'];
    //function prepare query
    function load_mhs_query($id){
        $prep_query = "SELECT * FROM mahasiswa WHERE id_mhs = $id";
        return $prep_query;
    }

    require('db_connect.php'); //mounting db connection
    $query = load_mhs_query($id);
    $result = $conn->query($query);
    while($load_data = mysqli_fetch_array($result)){
        echo ($load_data['nama_mhs']);
        echo ($load_data['npm_mhs']);
        echo ($load_data['email_mhs']);
        if($load_data['status_mhs']==1){
            echo "Active";
        }else {
            echo "Non-Active";
        }
    }
    $conn->close();
?>