<?php
 
$connect = mysqli_connect("localhost", "root", "", "input_karyawan");
if(isset($_POST["employee_id"]))
{
 $output = '';
    $query = "
    DELETE from karyawan where id = '".$_POST["employee_id"]."'
    ";
    if(mysqli_query($connect, $query))
    {
     $output .= '<label class="text-success">Data Berhasil Dihapus</label>';
     $select_query = "SELECT * FROM karyawan ORDER BY id DESC";
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <table class="table table-bordered">  
                    <tr>  
                         <th width="55%">Nama Karyawan</th>  
                         <th width="15%">Lihat</th>  
                         <th width="15%">Edit</th>  
                         <th width="15%">Hapus</th>  
                    </tr>
     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
                         <td>' . $row["nama"] . '</td>  
            <td><input type="button" name="view" value="Lihat Detail" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>
			<td><input type="button" name="edit" value="Edit" id="' . $row["id"] . '" class="btn btn-warning btn-xs edit_data" /></td> 									 
            <td><input type="button" name="delete" value="Hapus" id="' . $row["id"] . '" class="btn btn-danger btn-xs hapus_data" /></td>
					 
                    </tr>
      ';
     }
     $output .= '</table>';
    }else{
		$output .= mysqli_error($connect);
	}
    echo $output;
}
?>