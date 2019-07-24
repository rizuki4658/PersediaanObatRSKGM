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
		<a href="master_out_stok.php">Master Pengeluaran Stock</a>
	</li>
	<li class="breadcrumb-item active">Edit Pengeluaran</li>
</ol>
 <br>
<?php
	$link=mysqli_connect('localhost','root','','db_rskgm_obat');
	$a = $_GET['kode'];
	$query = "SELECT * FROM in_stok WHERE kode='$a'";
	$execute = mysqli_query($link,$query);
	if (mysqli_num_rows($execute)>0 ) {
		while ($data = mysqli_fetch_assoc($execute)) {?>
		
		
<div class="container" style="margin-left: 20px;">	
	<form method="post" action="cek_edit_out_stok.php">
		<table>
			<tr>
				<td>Kode Penerimaan</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="text" name="kode_p" id="kode_p" class="form-control" readonly="true" value="<?php echo $data['kode']; ?>"></td>
			</tr>
		</table><hr style="margin-right: 20px;">

	<center>
		<table border="0">
			<tr>
				<td style="width: 200px; height: 50px;">Tanggal</td>
				<td>&nbsp;:&nbsp;</td>
				<td style="width: 300px;"><input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo $data['tanggal']; ?>"></td>
				<td rowspan="15"><center><img src="../../gambar/chart.png" height="300px" width="300px" style="margin-left: 20px;"></center></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Kode Gudang</td>
				<td>&nbsp;:&nbsp;</td>
				<td style="width: 300px;"><select name="kode_pg" id="kode_pg" onchange="changeValue(this.value)" class="form-control">
									<?php
									$link=mysqli_connect('localhost','root','','db_rskgm_obat');
									$hasil = mysqli_query($link,"select * from out_pejabat where hasil_cek='Sesuai'");
									$javaArray = "var KoPG = new Array();\n";
									while ($row = mysqli_fetch_array($hasil)) {
										echo "<option value='0' dselected/>".$row['id']."</option>";
										echo "<option value='".$row['id']."'>".$row['id']."</option>";
										$javaArray .= "KoPG['" . $row['id'] . "'] = {id:'" . addslashes($row['kode_obat']) . "',nama:'" . addslashes($row['nama_obat']) . "',jum:'" . addslashes($row['jumlah1']) . "',sat:'" . addslashes($row['satuan1']) . "',jum2:'" . addslashes($row['jumlah2']) . "',sat2:'" . addslashes($row['satuan2']) . "',};\n";
									}
									mysqli_close($link);
									?>
								</select></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Kode Obat</td>
				<td>&nbsp;:&nbsp;</td>
				<td style="width: 300px;"><input type="text" name="kode_o" id="kode_o" class="form-control" value="<?php echo $data['kode_obat']; ?>" readonly="true"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Nama Obat</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="text" name="nama_o" id="nama_o" class="form-control" value="<?php echo $data['nama_obat']; ?>" readonly="true"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Jumlah Obat</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="number" name="jml" id="jml" class="form-control" style="width: 200px;" value="<?php echo $data['jumlah']; ?>" readonly="true"></td>
			</tr>
			<tr>
				<td style="width: 200px; height: 50px;"></td>
				<td>&nbsp;&nbsp;</td>
				<td>
					<input type="text" name="satuan_o" id="satuan_o" class="form-control" style="width: 200px;" value="<?php echo $data['satuan']; ?>" readonly="true"> 
				</td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Satuan Obat</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="number" name="jml2" id="jml2" class="form-control" style="width: 200px;" value="<?php echo $data['jumlah_out']; ?>" readonly="true"></td>
			</tr>
			<tr>
				<td style="width: 200px; height: 50px;"></td>
				<td>&nbsp;&nbsp;</td>
				<td>
					<input type="text" name="satuan_o2" id="satuan_o2" class="form-control" style="width: 200px;" value="<?php echo $data['satuan_out']; ?>" readonly="true"> 
				</td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Harga</td>
				<td>&nbsp;:&nbsp;</td>
				<td>
					<input type="text" name="harga" id="harga" class="form-control" style="width: 200px;" value="<?php echo number_format($data['harga']); ?>" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"> 
				</td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Nama Ruangan</td>
				<td>&nbsp;:&nbsp;</td>
				<td>
					<select name="nama_r" id="nama_r" class="form-control">
						<option value="0"><?php echo $data['ruangan']; ?></option>
						<option>A</option>
						<option>B</option>
						<option>C</option>
						<option>D</option>
					</select>
				</td>
			</tr>
		</table>
		
		<br>

		<table border="0">
			<tr>
				<td colspan="4" style="width: 300px;">
					<div align="right">
					<a class="btn btn-danger btn-md" href="master_out_stok.php">Batal</a>
					
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

<script type="text/javascript">  
	<?php echo $javaArray; ?>
	function changeValue(kode_pg){
	document.getElementById('kode_o').value = KoPG[kode_pg].id;
	document.getElementById('nama_o').value = KoPG[kode_pg].nama;
	document.getElementById('jml').value = KoPG[kode_pg].jum;
	document.getElementById('satuan_o').value = KoPG[kode_pg].sat;
	document.getElementById('jml2').value = KoPG[kode_pg].jum2;
	document.getElementById('satuan_o2').value = KoPG[kode_pg].sat2;
	document.getElementById('nama_r').value = KoPG[kode_pg].ruang;
	};
	
</script>

<?php require('angka.php'); ?>
<?php require('modal_filter.php'); ?>
<?php require('bottom_menu.php'); ?>

<script type="text/javascript">
	function validasi() {
		var kode_pen=document.getElementById('kode_p').value;
		var tanggal_i=document.getElementById('tanggal').value;
		var kode_gud=document.getElementById('kode_pg').value;
		var kode_ob=document.getElementById('kode_o').value;
		var nm_o=document.getElementById('nama_o').value;
		var jum=document.getElementById('jml').value;
		var sat=document.getElementById('satuan_o').value;
		var jum2=document.getElementById('jml2').value;
		var sat2=document.getElementById('satuan_o2').value;
		var hrg=document.getElementById('harga').value;
		var ruangan=document.getElementById('nama_r').value;
		if (kode_pen !="" && tanggal_i !="" && tanggal_i !=0 && kode_gud !=0 && kode_ob !="" && nm_o !="" && jum !="" && sat !="" && jum !="" && sat !="" && ruangan !="" && hrg !="" && hrg !=0){
			return true;
		}else{
			$('#exampleModalCenter').modal('show');
		}
	}
	
</script>