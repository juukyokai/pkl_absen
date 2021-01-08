<?php 
    session_start();
    $id = $_SESSION['id_komplemen'];
    //index.php
    // require('access/db_connect.php');
    // $query = "SELECT 
    // kelas.id_kelas,  
    // kelas.kode_nama_kelas,
    // kelas.hari_kelas, 
    // kelas.jam_kelas,
    // dosen.nama_dosen,
    // mata_kuliah.nama_mk,
    // mata_kuliah.sks
    // FROM kelas,dosen, mata_kuliah
    // where kelas.id_mk=mata_kuliah.id_mk && kelas.id_dosen=dosen.id_dosen ORDER BY kode_nama_kelas";
    // $result = $conn->query($query);
    // $row = mysqli_fetch_array($result)
 ?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/lib/chosen/chosen.min.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="../../front-end/dosen_view/index.php"><i class="menu-icon fa fa-laptop"></i>Dashboard</a>
                    </li>
                    <li class="menu-item active">
                        <a href="#" class="menu-item"> <i class="menu-icon fa fa-table"></i>Daftar Kelas</a>
                    </li>
                    <li class="menu-item">
                        <a href="../../front-end/dosen_view/student-management.php" class="menu-item"> <i class="menu-icon fa fa-user"></i>Daftar Mahasiswa</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <?php
                            $query_nama = "SELECT nama_dosen FROM dosen WHERE id_dosen=$id";
                            require('access/db_connect.php');
                            $result = $conn->query($query_nama);
                            while($row_nama = mysqli_fetch_array($result)){
                                echo("
                                <a href='#'><button href='#' class='btn btn-secondary' type='button'>
                                    <span class=''>". $row_nama['nama_dosen'] ."</span>
                                </button></a>
                                ");
                            }
                            $conn->close();
                        ?>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="../../back-end/logout.php"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Table</a></li>
                                    <li class="active">Data table</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn" id="nampil">
            <?php    
                require('../../back-end/tampil_kelas.php');
            ?>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="modal fade" id="tambahkelas" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Form Tambah Kelas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header">
                                <strong>FAKULTAS ILMU KOMPUTER</strong>
                            </div>
                            <div class="card-body card-block" id="fupForm">
                            <form method="POST" id="insert_form">
                                <div class="form-group">
                                    <label class=" form-control-label">Kode Nama Kelas</label>
                                    <div class="input-group">
                                        <input id="kode_nama_kelas" class="form-control" type="text" name="kode_nama_kelas" placeholder="Masukkan Kode Nama Kelas">
                                    </div>
                                    <small class="form-text text-muted">ex. G068</small>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Mata Kuliah</label>
                                    <div class="input-group">
                                        <select id="id_mk" name="id_mk" data-placeholder="Pilih Matkul ..." multiple class="standardSelect">
                                            <option value="" label="default"></option>
                                            <?php
                                                require('../../back-end/load_matkul.php');
                                            ?>
                                        </select>
                                    </div>
                                    <small class="form-text text-muted">ex. Pemrograman Web</small>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Dosen Kelas</label>
                                    <div class="input-group">
                                        <select id="id_dosen" name="id_dosen" data-placeholder="Pilih Dosen ..." multiple class="standardSelect">
                                            <option value="" label="default"></option>
                                            <?php
                                                require('../../back-end/load_dosen.php');
                                            ?>
                                        </select>
                                    </div>
                                    <small class="form-text text-muted">ex. Parlika</small>
                                </div>
                            
                                <div class="form-group">
                                    <label class=" form-control-label">Hari Kelas</label>
                                    <div class="input-group">
                                        <input id="hari_kelas" class="form-control" type="text" name="hari_kelas" placeholder="Masukkan Hari Kelas ...">
                                    </div>
                                    <small class="form-text text-muted">ex. Senin</small>
                                </div>
                                <div class="form-group">
                                    <label for="jam" class=" form-control-label">Jam Kelas</label>
                                    <div class="input-group">
                                        <input id="jam_kelas" class="form-control" type="text" name="jam_kelas" placeholder="Masukkan Jam Kelas ...">
                                    </div>
                                    <small class="form-text text-muted">ex. 19.00.00</small>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Selesai/Cancel</button>
                                    <input type="submit" name="insert" id="insert" value="Confirm" class="btn btn-success" data-target="#tabel_tampil"/>
                                </div> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editkelas" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Form Edit Kelas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    <strong>FAKULTAS ILMU KOMPUTER</strong>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                        <label class=" form-control-label">Kode Nama Kelas</label>
                                        <div class="input-group">
                                            <input id="E_KNK" class="form-control" type="text" name="hari_kelas" placeholder="Masukkan Kode Nama Kelas">
                                        </div>
                                        <small class="form-text text-muted">ex. G068</small>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Mata Kuliah</label>
                                        <div class="input-group">
                                            <select id="E_MK" data-placeholder="Pilih Matkul ..." multiple class="standardSelect">
                                                <option value="" label="default"></option>
                                                <?php
                                                    require('../../back-end/load_matkul.php');
                                                ?>
                                            </select>
                                        </div>
                                        <small class="form-text text-muted">ex. Pemrograman Web</small>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Masukkan SKS ...</label>
                                        <div class="input-group">
                                            <input id="E_SKS" class="form-control" type="text" name="hari_kelas" placeholder="Masukkan Kode Nama Kelas">
                                        </div>
                                        <small class="form-text text-muted">ex. 3</small>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Dosen Kelas</label>
                                        <div class="input-group">
                                            <select id="E_DOSEN" data-placeholder="Pilih Dosen ..." multiple class="standardSelect">
                                                <option value="" label="default"></option>
                                                <?php
                                                    require('../../back-end/load_dosen.php');
                                                ?>
                                            </select>
                                        </div>
                                        <small class="form-text text-muted">ex. Parlika</small>
                                    </div>
                                
                                    <div class="form-group">
                                        <label class=" form-control-label">Hari Kelas</label>
                                        <div class="input-group">
                                            <input id="E_HARI" class="form-control" type="text" name="hari_kelas" placeholder="Masukkan Hari Kelas ...">
                                        </div>
                                        <small class="form-text text-muted">ex. Senin</small>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Jam Kelas</label>
                                        <div class="input-group">
                                            <input id="E_JAM" class="form-control" type="text" name="hari_kelas" placeholder="Masukkan Jam Kelas ...">
                                        </div>
                                        <small class="form-text text-muted">ex. 19.00.00</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" data-dismiss="">Confirm</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>
    <script src="assets/js/lib/chosen/chosen.jquery.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
          tampil();
      } );
    </script>
    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
        function tampil(){
            $.ajax({
                type: "GET",
                url: "back-end/tampil_kelas.php",
                success: function(msg){
                    $('#nampil').html(msg);
                }
            });
        }
    </script>
    <script>
    $(document).ready(function(){
    // Begin Aksi Insert
    $('#insert_form').on("submit", function(event){  
    event.preventDefault(); 
    if($('#kode_nama_kelas').val() == "")  
    {  
    alert("Mohon Isi Kode Nama Kelas ");  
    }  
    else if($('#id_mk').val() == '')  
    {  
    alert("Mohon Isi id_mk");  
    }
    else if($('#id_dosen').val() == '')  
    {  
    alert("Mohon Isi dosen");  
    }
    else if($('#hari_kelas').val() == '')  
    {  
    alert("Mohon Isi Hari Kelas");  
    }
    else if($('#jam_kelas').val() == '')  
    {  
    alert("Mohon Isi Jam Kelas");  
    }
    
    else  
    {  
    $.ajax({  
        url:"back-end/tambahkelas.php",  
        method:"POST",  
        data:$('#insert_form').serialize(),  
        beforeSend:function(){
        $('#insert').val("Confirm");  
        },  
        success:function(data){  
        $('#insert_form')[0].reset();
        tampil();
        }  
    });  
    }  
    });
    });
   
</script>
</body>
</html>