<?php
    date_default_timezone_set('Asia/Jakarta');
    require('../../back-end/load_tipe.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kelas Daring</title>
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
        <label for="tipeUser">Tipe User</label>
        <select id="tipeUser" name="tipeUser" data-placeholder="Tipe User ..." require>
            <option value="" label="Pilih User"></option>
            <option value="2" label="Mahasiswa"></option>
            <option value="1" label="Dosen"></option>
        </select>
      </div>
      <div class="form-group" id="select_mhs">
        <label for="mhs">Tipe User</label>
        <select id="mhs" name="mhs" data-placeholder="Tipe User ..." require>
            <option value="" label="Pilih User"></option>
            <?php
              load_mhs();
            ?>
        </select>
      </div>
      <div class="form-group" id="select_dos">
        <label for="dos">Tipe User</label>
        <select id="dos" name="dos" data-placeholder="Tipe User ..." require>
            <option value="" label="Pilih User"></option>
            <?php
              load_dos();
            ?>
        </select>
      </div>
      <input type="hidden" value="<?= date("d-m-Y h:i:sa")?>" class="form-control"  name="create_at">
      <button type="submit" class="btn btn-warning" name="daftar">Daftar</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js" ></script>
<script>bootstrapValidate(
   '#myEmail',
   'email:Enter a valid E-Mail Address!'
   $("#tipeUser").click(function(){
      $("p").hide();
    });
);</script>

<script type="text/javascript">
    $("#select_dos").hide();
    $("#select_mhs").hide();

    $("#tipeUser").on("change",function(){
        if(("#tipeUser").val() == 1){
          $("#select_dos").show();
        }else if(("#tipeUser").val() == 2){
          $("#select_mhs").show();
        }else{
          alert("cok isien");
        }
    });
</script>
</body>
</html>