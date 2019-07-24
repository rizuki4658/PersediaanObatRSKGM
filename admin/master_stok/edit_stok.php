<?php
session_start();
if(!isset($_SESSION['ses_user']) || !isset($_SESSION['ses_pass']) ){ //cek apakah user sudah login
        header("location:login_register/login.php");
    } else {

    $link=mysqli_connect("localhost","root","","db_rskgm_obat");
    $user=$_SESSION['ses_user'];
    $login=mysqli_query($link,"SELECT * FROM admin WHERE username = '$user'");
    $t=mysqli_fetch_array($login);

    }?>
    
<?php require('top_menu.php'); ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="../index.php">Beranda</a>
	</li>
	<li class="breadcrumb-item">
		<a href="master_stok.php">Master Stok</a>
	</li>
	<li class="breadcrumb-item active">Edit Stok</li>
</ol>
 <br>
<?php
	$link=mysqli_connect('localhost','root','','db_rskgm_obat');
	$a = $_GET['kode_obat'];
	$sub_i=0;
	$sub_o=0;
	$query = "SELECT * FROM master_stok WHERE kode_obat='$a'";
	$execute = mysqli_query($link,$query);
	if (mysqli_num_rows($execute)>0 ) {
		while ($data = mysqli_fetch_assoc($execute)) {?>
		
		
<div class="container" style="margin-left: 20px;">	
	<form method="post" action="cek_edit_stok.php" enctype="multipart/form-data">
		<table border="0">
			<tr>
				<td>Kode Penerimaan</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="text" name="kode_o" id="kode_o" class="form-control" readonly="true" value="<?php echo $data['kode_obat']; ?>">
				</td>
			</tr>
		</table>
		<br>
		<table border="0">
			<tr>
				<td style="text-align: right;">
					<label class="text-success">
						<?php 
				 				$sub_i+=$data['jumlah_o_in'];
				 				$tot = array($sub_i);
				 				echo number_format($sub_i);
				 		?>
				 	</label> Masuk
				</td>
			</tr>
			<tr>
				<td style="text-align: right;">
				 	<label class="text-danger">
						<?php
				 				$sub_o+=$data['jumlah_o_out'];
				 				echo number_format($sub_o);
				 		?>
				 	</label> Keluar
				 </td>
			</tr>
		</table><hr style="margin-right: 20px;">
	<center>
		<table border="0">
			<tr>
				<td style="width: 200px; height: 50px;">Nama Obat</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="text" name="nama_o" id="nama_o" class="form-control" value="<?php echo $data['nama_obat']; ?>" readonly="true" style="width: 200px;"></td>
				<td rowspan="7"><center><img src="<?php echo $data['foto']; ?>" height="300px" width="300px"></center></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Jumlah Masuk</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="number" name="jml_in" id="jml_in" class="form-control" style="width: 100px;" 
					value="<?php echo $data['jumlah_o_in']; ?>">
				</td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Jumlah Keluar</td>
				<td>&nbsp;:&nbsp;</td>
				<td>
					<input type="number" name="jml_out" id="jml_out" class="form-control" style="width: 100px;" value="<?php echo $data['jumlah_o_out']; ?>"> 
				</td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Foto</td>
				<td>&nbsp;:&nbsp;</td>
				<td>
					<input type="file" name="foto" id="foto" class="form-control" style="width: 400px;" value="<?php echo $data['ruangan']; ?>">
				</td>
			</tr>
		</table>
		
		<br>

		<table border="0">
			<tr>
				<td colspan="4" style="width: 300px;">
					<div align="right">
					<a class="btn btn-danger btn-md" href="master_stok.php">Batal</a>
					
					<input type="submit" name="Simpan" class="btn btn-warning btn-md" value="Edit" onmousedown="validasi()">
					</div>
				</td>
			</tr>
		</table>
	</center>
	</form>
</div>
<br>
<br>
<?php
	}
}
?>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 200px;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style=" background-color: #343a40;">
      <div class="modal-body">
        <img src="../../gambar/warning (1).png" width="24" height="24">
        <br>
        <br>
        	<center class="text text-light">Data Belum Lengkap!</center>
        <br>
        <div align="right"><button type="button" class="btn btn-primary" data-dismiss="modal">OK</button></div>
      </div>
    </div>
  </div>
</div>
<?php require('modal_filter.php'); ?>
<?php require('bottom_menu.php'); ?>

<script type="text/javascript">
	function validasi() {
		var nm_o=document.getElementById('nama_o').value;
		var jum_i=document.getElementById('jml_in').value;
		var jum_o=document.getElementById('jml_out').value;
		var fot=document.getElementById('foto').value;
		if (nm_o !="" && jum_i !="" && jum_o !="" && jum_i !="" && jum_o !="" && fot !=""){
			return true;
		}else{
			$('#exampleModalCenter').modal('show');
		}
	}
	
</script>