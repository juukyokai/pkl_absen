<?php
    session_start();
    
    //Menghapus semua isi dari variabel session
    $_ISSET = [];
    session_reset();
    session_destroy();

    header("Location: ../front-end/index.html");
    exit;
?>