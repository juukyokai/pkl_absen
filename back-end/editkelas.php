<script>
$('#edit_form').on("submit", function(event){  
  event.preventDefault();   
   $.ajax({  
    url:"back-end/updatekelas.php",  
    method:"POST",  
    data:$('#edit_form').serialize(),  
    beforeSend:function(){  
     $('#update').val("Updating");  
    },  
    success:function(data){  
     $('#update').val("Complete");  
     $('#edit_form')[0].reset(); 
     $('#tabel_tampil').html(data);  
    }  
   });   
 });
</script>
<?php 
if(isset($_POST["id_kelas"]))
{
 $output = '';
 $connect = require('db_connect.php');
 $query = "SELECT * FROM kelas, dosen, mata_kuliah WHERE id_kelas = '".$_POST["id_kelas"]."' && kelas.id_mk=mata_kuliah.id_mk && kelas.id_dosen=dosen.id_dosen";
 $result = $conn->query($query);
	$row = mysqli_fetch_array($result);
     $output .= '
    <form method="POST" id="edit_form">
    <div class="form-group">
            <label class="form-control-label">Kode Nama Kelas</label>
            <div class="input-group">
            <input id="eknk" value="'.$_POST["id_kelas"].'" class="form-control" type="hidden" name="hari_kelas">
            <input id="eknk" value="'.$row["kode_nama_kelas"].'" class="form-control" type="text" name="hari_kelas">
            </div>
            <small class="form-text text-muted">ex. G068</small>
        </div>
        <div class="form-group">
            <label class=" form-control-label">Mata Kuliah</label>
            <div class="input-group">
                <select id="id_mk" name="id_mk" data-placeholder="Pilih Matkul ..." multiple class="standardSelect">
                    <option value="" label="default"></option>
                    <?php
                    require("back-end/load_matkul.php");
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
                    require("back-end/load_dosen.php");
                    ?>
                </select>
            </div>
            <small class="form-text text-muted">ex. Fahmi</small>
        </div>
        <div class="form-group">
            <label class=" form-control-label">Hari Kelas</label>
            <div class="input-group">
                <input id="ehari" value="'.$row["hari_kelas"].'" class="form-control" type="text" name="hari_kelas" placeholder="Masukkan Hari Kelas ...">
            </div>
            <small class="form-text text-muted">ex. Senin</small>
        </div>
        <div class="form-group">
            <label class=" form-control-label">Jam Kelas</label>
            <div class="input-group">
                <input id="ejam" value="'.$row["jam_kelas"].'" class="form-control" type="text" name="hari_kelas" placeholder="Masukkan Jam Kelas ...">
            </div>
            <small class="form-text text-muted">ex. 19.00.00</small>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <input type="submit" name="update" id="update" value="Update" class="btn btn-success"/>
        </div>
        </form>
         
     ';
    echo $output;
}
?>



