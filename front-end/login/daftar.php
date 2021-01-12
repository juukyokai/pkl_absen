<?php
    date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kelas Daring</title>
    <script type="text/javascript" src="../../back-end/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <a class="navbar-brand" href="#"><img src="upn.png" class="img-fluid mx-auto d-block" style="width:55px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../index.html">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Login</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-5">
    <h1 class="text-center">Daftar Kelas Daring</h1>
    <form class="nt-5" action ="code.php" method="POST"> 
      <div class="form-group">
        <label for="exampleInputEmail1">Masukkan Username</label>
        <input type="text" class="form-control"  name="username">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <label for="tipe_user">Tipe User</label>
        <select id="tipeUser" name="tipe_user" data-placeholder="Tipe User ..." require>
            <option value="">Tipe user</option>
            <option value="1">Dosen</option>
            <option value="2">Mahasiswa</option>
        </select>
      </div>
      <div class="form-group" >
        Pilih User
        <select id="komp" require>
            <option value="">--- Pilih User Dahulu ---</option>
        </select>
        <span id="load_user" style="display: none;">Loading User...</span>
      </div>
      <!-- <input type="hidden" value="<?= date("d-m-Y h:i:sa")?>" class="form-control"  name="create_at"> -->
      <button type="submit" class="btn btn-warning" name="daftar">Daftar</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js" ></script>



</body>
<script type="text/javascript">
    $("#tipeUser").on("change",function(){
      if($("#tipeUser").val()!=""){
        $("#load_user").show();
        var tipe= $("#tipeUser").val();
        $.ajax({
            type: "GET",
            url: "load_tipe.php?tipe_user=" + tipe,
            success: function(msg){
                $("#load_user").hide();
                $('#komp').html(msg);
            },
            error: function (data) {
                    alert("AjaxError");
                }
        });
      }else{
        $("#load_user").hide();
      }
	});
</script>
</html>