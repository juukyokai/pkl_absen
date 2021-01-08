<script>
$('#edit_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#elink').val() == "")  
  {  
   alert("Mohon Isi Link Kelas Terlebih Dahulu ");  
  }
  else  
  {   
   $.ajax({  
    url:"../../back-end/updatekelas.php",  
    method:"POST",  
    data:$('#edit_form').serialize(),  
    beforeSend:function(){  
     $('#update').val("Updating");  
    },  
    success:function(data){ 
     $('#update').val("Complete");  
     location.reload(); 
     $('#tabel_tampil').html(data);  
    }  
   });  
} 
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
            <input id="eid" value="'.$_POST["id_kelas"].'" class="form-control" type="hidden" name="eid">
            <input id="eknk" value="'.$row["kode_nama_kelas"].'" class="form-control" type="text" name="eknk" placeholder="Kode Nama Kelas Tidak Bisa Diganti ... " readonly>
            </div>
            <small class="form-text text-muted">ex. G068</small>
        </div>
        <div class="form-group">
            <label class=" form-control-label">Mata Kuliah</label>
            <div class="input-group">
                <input id="emk" value="'.$row["nama_mk"].'" class="form-control" type="text" name="emk" placeholder="Nama Matkul Tidak Bisa Diganti ... "readonly>
            </div>
            </div>
            <small class="form-text text-muted">ex. Pemrograman Web</small>
        </div>
        <div class="form-group">
            <label class=" form-control-label">Dosen Kelas</label>
            <div class="input-group">
                <input id="edosen" value="'.$row["nama_dosen"].'" class="form-control" type="text" name="edosen" placeholder="Nama Dosen Tidak Bisa Diganti "readonly>
            </div>
            <small class="form-text text-muted">ex. Fahmi</small>
        </div>
        <div class="form-group">
            <label class=" form-control-label">Link Kelas</label>
            <div class="input-group">
                <input id="elink" value="'.$row["link_kelas"].'" class="form-control" type="text" name="elink" placeholder="Masukkan Link Kelas ...">
            </div>
            <small class="form-text text-muted">ex. Senin</small>
        </div>
        <div class="form-group">
            <label class=" form-control-label">Hari Kelas</label>
            <div class="input-group">
                <input id="ehari" value="'.$row["hari_kelas"].'" class="form-control" type="text" name="ehari" placeholder="Masukkan Hari Kelas ...">
            </div>
            <small class="form-text text-muted">ex. Senin</small>
        </div>
        <div class="form-group">
            <label class=" form-control-label">Jam Kelas</label>
            <div class="input-group">
                <input id="ejam" value="'.$row["jam_kelas"].'" class="form-control" type="text" name="ejam" placeholder="Masukkan Jam Kelas ...">
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



