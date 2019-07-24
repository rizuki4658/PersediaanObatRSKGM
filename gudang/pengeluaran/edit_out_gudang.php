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
		<a href="master_out_gudang.php">Master Pengeluaran Gudang</a>
	</li>
	<li class="breadcrumb-item active">Edit Pengeluaran</li>
</ol>
 <br>
<?php
	$link=mysqli_connect('localhost','root','','db_rskgm_obat');
	$a = $_GET['kode'];
	$query = "SELECT * FROM out_gudang WHERE kode='$a'";
	$execute = mysqli_query($link,$query);
	if (mysqli_num_rows($execute)>0 ) {
		while ($data = mysqli_fetch_assoc($execute)) {?>
		
		
<div class="container" style="margin-left: 20px;">	
	<form method="post" action="cek_edit_out_gudang.php">
		<table>
			<tr>
				<td>Kode Penerimaan</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="text" name="kode" id="kode" class="form-control" readonly="true" value="<?php echo $data['kode']; ?>"></td>
			</tr>
		</table><hr style="margin-right: 20px;">

	<center>
		<table border="0">
			<tr>
				<td style="width: 200px; height: 50px;"><i style="color: red;">*</i>Tanggal</td>
				<td>&nbsp;:&nbsp;</td>
				<td style="width: 300px;"><input type="date" name="tanggal" id="tanggal" class="form-control"></td>
				<td rowspan="17"><center><img src="../../gambar/warehouse.png" height="300px" width="300px" style="margin-left: 20px;"></center></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;"><i style="color: red;">*</i>Kode Penerimaan</td>
				<td>&nbsp;:&nbsp;</td>
				<td style="width: 300px;"><select name="kode_p" id="kode_p" onchange="changeValue(this.value)" class="form-control">
									<?php
									$link=mysqli_connect('localhost','root','','db_rskgm_obat');
									$hasil = mysqli_query($link,"select * from in_gudang");
									$javaArray = "var KoPG = new Array();\n";
									echo "<option value='0' dselected/>".$data['kode_p']."</option>";
									while ($row = mysqli_fetch_array($hasil)) {

										echo "<option value='".$row['kode_p']."'>".$row['kode_p']."</option>";
										$javaArray .= "KoPG['" . $row['kode_p'] . "'] = {kode:'" . addslashes($row['kode_obat']) . "',nama:'" . addslashes($row['nama_obat']) . "',sat:'" . addslashes($row['satuan1']) . "',nama_ptg:'" . addslashes($row['nama_pet']) . "',ruang:'" . addslashes($row['ruangan']) . "'};\n";
									}
									mysqli_close($link);
									?>
								</select><p></p></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Kode Obat</td>
				<td>&nbsp;:&nbsp;</td>
				<td style="width: 300px;"><input type="text" name="kode_o" id="kode_o" class="form-control" readonly="true" value="<?php echo $data['kode_obat']; ?>"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Nama Obat</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="text" name="nama_o" id="nama_o" class="form-control" readonly="true" value="<?php echo $data['nama_obat']; ?>"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;"><i style="color: red;">*</i>Jumlah</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="number" name="jml" id="jml" class="form-control" style="width: 120px;" value="<?php echo $data['jumlah']; ?>"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Satuan</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="text" name="satuan_o" id="satuan_o" class="form-control" style="width: 120px;" readonly="true" value="<?php echo $data['satuan']; ?>"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Nama Petugas</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="text" name="nama_p" id="nama_p" class="form-control" readonly="true" value="<?php echo $data['nama_pet']; ?>"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Nama Ruangan</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="text" name="nama_r" id="nama_r" class="form-control" readonly="true" value="<?php echo $data['ruangan']; ?>"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td><i style="color: red;">*</i>Keterangan</td>
				<td>&nbsp;:&nbsp;</td>
				<td>
					<select name="ket_o" id="ket_o" class="form-control" style="width: 120px;">
						<option value="0"><?php echo $data['ket'];?></option>
						<option>Tersedia</option>
						<option>Kosong</option>	
					</select>
				</td>
			</tr>
		</table>
		
		<br>

		<table border="0">
			<tr>
				<td colspan="4" style="width: 300px;">
					<div align="right">
					<a class="btn btn-danger btn-md" href="master_out_gudang.php">Batal</a>
					
					<input type="submit" name="Simpan" class="btn btn-warning btn-md" value="Simpan" onmousedown="validasi()">
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
<script type="text/javascript">  
	<?php echo $javaArray; ?>
	function changeValue(kode_p){
	document.getElementById('kode_o').value = KoPG[kode_p].kode;
	document.getElementById('nama_o').value = KoPG[kode_p].nama;
	document.getElementById('satuan_o').value = KoPG[kode_p].sat;
	document.getElementById('nama_p').value = KoPG[kode_p].nama_ptg;
	document.getElementById('nama_r').value = KoPG[kode_p].ruang;
	};
	
</script>
<?php require('bottom_menu.php'); ?>

<script type="text/javascript">
	function validasi() {
		var kode_i=document.getElementById('kode').value;
		var kode_pen=document.getElementById('kode_p').value;
		var tanggal_i=document.getElementById('tanggal').value;
		var kode_ob=document.getElementById('kode_o').value;
		var nm_o=document.getElementById('nama_o').value;
		var jum=document.getElementById('jml').value;
		var sat=document.getElementById('satuan_o').value;
		var ruangan=document.getElementById('nama_r').value;
		var nama=document.getElementById('nama_p').value;
		var ket=document.getElementById('ket_o').value;
		if (kode_i !="" && kode_pen !=0 && tanggal_i !="" && tanggal_i !=0 && kode_ob !="" && nm_o !="" && jum !="" && sat !="" && ruangan !="" && nama !="" && ket !=0){
			return true;
		}else{
			$('#exampleModalCenter').modal('show');
		}
	}
</script>