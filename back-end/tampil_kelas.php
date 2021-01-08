<?php
    require('db_connect.php');
    $id = $_SESSION['id_komplemen'];
    //preparing query
    $sql_kelas =    //"SELECT * FROM kelas";
    
                    "SELECT 
                        kelas.id_kelas,  
                        kelas.kode_nama_kelas,
                        kelas.hari_kelas, 
                        kelas.jam_kelas,
                        dosen.nama_dosen,
                        mata_kuliah.nama_mk,
                        mata_kuliah.sks
                    FROM kelas,dosen, mata_kuliah
                    where kelas.id_mk=mata_kuliah.id_mk && kelas.id_dosen=dosen.id_dosen && dosen.id_dosen=$id ORDER BY kode_nama_kelas";
                    
    $result = $conn->query($sql_kelas);
    //loop-print table content
    ?>
    <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Kelas</strong> 
                                <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#tambahkelas">
                                    <i class="fa fa-plus-circle"></i>
                                    Tambah Kelas
                                </button>
                            </div>
                            <div class="card-body">
                                <div id="tabel_tampil">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">               
                                    <thead>
                                        <tr>
                                            
                                            <th>Nama Kelas</th>
                                            <th>Mata Kuliah</th>
                                            <th>SKS</th>
                                            <th>Dosen</th>
                                            <th>Hari</th>
                                            <th>Jam</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            while($row_kelas = mysqli_fetch_array($result)):?>
                                                <tr>
                                                    <td> <span class='name'><?php echo $row_kelas['kode_nama_kelas'] ?></span> </td>
                                                    <td> <span class='name'><?php echo $row_kelas['nama_mk'] ?></span> </td>
                                                    <td> <span class='count'><?php echo $row_kelas['sks'] ?></span> </td>
                                                    <td> <span class='name'><?php echo $row_kelas['nama_dosen'] ?></span> </td>
                                                    <td><span class='product'><?php echo $row_kelas['hari_kelas'] ?></span></td>
                                                    <td><span class=><?php echo $row_kelas['jam_kelas'] ?></span></td>
                                                    <td>
                                                        <button type='button' class='btn btn-primary mb-1' data-toggle='modal' data-target='#editkelas'>
                                                            <i class='fa fa-pencil'></i>
                                                            Edit Kelas
                                                        </button>
                                                    </td>
                                                    <td>
                                                    
                                                        <a href="../../back-end/deletekelas.php?id_kelas=<?php echo $row_kelas['id_kelas']?>">
                                                            <button type='button' class='btn btn-danger mb-1' data-toggle='modal' data-target='#hapuskelas'>
                                                        <i class='fa fa-minus-circle'></i>
                                                        Hapus Kelas
                                                        </button>
                                                        </a>
                                                    
                                                    </td>
                                                </tr>
                                            <?php endwhile;
                                            ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    