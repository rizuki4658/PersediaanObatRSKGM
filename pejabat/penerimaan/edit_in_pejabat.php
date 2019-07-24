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
		<a href="master_in_pejabat.php">Master Pengecekan Penerimaan Pejabat</a>
	</li>
	<li class="breadcrumb-item active">Edit Hasil Cek</li>
</ol>
 <br>
<?php
	$link=mysqli_connect('localhost','root','','db_rskgm_obat');
	$id_p = $_GET['id'];
	$query = "SELECT * FROM in_pejabat WHERE id=$id_p";
	$execute = mysqli_query($link,$query);
	if (mysqli_num_rows($execute)>0 ) {
		while ($data = mysqli_fetch_assoc($execute)) {?>
		
		
<div class="container" style="margin-left: 20px;">	
	<form method="post" action="cek_edit_in_pejabat.php">
		<input type="hidden" name="id" id="id" class="form-control" value="<?php echo $data['id']?>">
		<table>
			<tr>
				<td>Tanggal</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo $data['tanggal']?>"></td>
			</tr>
		</table><hr style="margin-right: 20px;">

	<center>
		<table border="0">
			<tr>
				<td style="width: 200px; height: 50px;">Nama Pejabat</td>
				<td>&nbsp;:&nbsp;</td>
				<td style="width: 300px;"><input type="text" name="nama_p" id="nama_p" class="form-control" value="<?php echo $data['nama']?>"></td>
				<td rowspan="7"><center><img src="../../gambar/businessman.png" height="300px" width="300px"></center></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Nama Distributor</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="text" name="nama_d" id="nama_d" class="form-control" value="<?php echo $data['nama_distributor']?>"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Kode Obat</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="text" name="kode_o" id="kode_o" class="form-control" style="width: 200px;" value="<?php echo $data['kode_obat']?>"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Hasil Pengecekan</td>
				<td>&nbsp;:&nbsp;</td>
				<td>
					<select name="hasil_c" id="hasil_c" class="form-control" style="width: 200px;">
						<option value="0"><?php echo $data['hasil_cek']?></option>
						<option>Sesuai/Valid</option>
						<option>Tidak Sesuai</option>
					</select>
				</td>
			</tr>
		</table>
		
		<br>

		<table border="0">
			<tr>
				<td colspan="4" style="width: 300px;">
					<div align="right">
					<a class="btn btn-danger btn-md" href="master_in_pejabat.php">Batal</a>
					<input type="submit" name="Edit" class="btn btn-warning btn-md" value="Edit" onmousedown="validasi()">
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

<?php require('modal_filter.php');?> 
<?php require('bottom_menu.php'); ?>

<script type="text/javascript">
	function validasi() {
		var tanggal_i=document.getElementById('tanggal').value;
		var nama=document.getElementById('nama_p').value;
		var distributor=document.getElementById('nama_d').value;
		var obat=document.getElementById('kode_o').value;
		var valid=document.getElementById('hasil_c').value;
		if (tanggal_i !="" && tanggal_i !=0 && nama !="" && distributor !="" && obat !="" && valid !=0){
			return true;
		}else{
			$('#exampleModalCenter').modal('show');
		}
	}
</script>