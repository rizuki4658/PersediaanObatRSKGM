<!DOCTYPE html>
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
		<a href="master_in_stok.php">Master Penerimaan Stok</a>
	</li>
	<li class="breadcrumb-item active">Tambah Stok</li>
</ol>
 <br>

<div class="container" style="margin-left: 20px;">	
	<form method="post" action="simpan_in_stok.php">
		<table>
			<tr>
				<td>Kode Penerimaan</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="text" name="kode_p" id="kode_p" class="form-control"></td>
			</tr>
		</table><hr style="margin-right: 20px;">

	<center>
		<table border="0">
			<tr>
				<td style="width: 200px; height: 50px;">Tanggal</td>
				<td>&nbsp;:&nbsp;</td>
				<td style="width: 300px;"><input type="date" name="tanggal" id="tanggal" class="form-control"></td>
				<td rowspan="13"><center><img src="../../gambar/chart.png" height="300px" width="300px" style="margin-left: 20px;"></center></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Kode Gudang</td>
				<td>&nbsp;:&nbsp;</td>
				<td style="width: 300px;"><select name="kode_pg" id="kode_pg" onchange="changeValue(this.value)" class="form-control">
									<?php
									$link=mysqli_connect('localhost','root','','db_rskgm_obat');
									$hasil = mysqli_query($link,"select * from in_gudang");
									$javaArray = "var KoPG = new Array();\n";
									echo "<option value='0' dselected/>Pilih</option>";
									while ($row = mysqli_fetch_array($hasil)) {

										echo "<option value='".$row['kode_p']."'>".$row['kode_p']."</option>";
										$javaArray .= "KoPG['" . $row['kode_p'] . "'] = {kode:'" . addslashes($row['kode_obat']) . "',nama:'" . addslashes($row['nama_obat']) . "',jum:'" . addslashes($row['jumlah1']) . "',sat:'" . addslashes($row['satuan1']) . "',jum2:'" . addslashes($row['jumlah2']) . "',sat2:'" . addslashes($row['satuan2']) . "',ruang:'" . addslashes($row['ruangan']) . "'};\n";
									}
									mysqli_close($link);
									?>
								</select><p></p></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Kode Obat</td>
				<td>&nbsp;:&nbsp;</td>
				<td style="width: 300px;"><input type="text" name="kode_o" id="kode_o" class="form-control" readonly="true"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Nama Obat</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="text" name="nama_o" id="nama_o" class="form-control" readonly="true"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Jumlah Obat</td>
				<td>&nbsp;:&nbsp;</td>
				<td>
					<input type="number" name="jml" id="jml" class="form-control" style="width: 200px;" readonly="true">
				</td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;"></td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="text" name="satuan" id="satuan" class="form-control" readonly="true"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Satuan Obat</td>
				<td>&nbsp;:&nbsp;</td>
				<td>
					<input type="number" name="jml_in" id="jml_in" class="form-control" style="width: 200px;" readonly="true">
				</td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;"></td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="text" name="satuan_in" id="satuan_in" class="form-control" readonly="true"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Nama Ruangan</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="text" name="nama_r" id="nama_r" class="form-control" readonly="true"></td>
			</tr>
		</table>
		
		<br>

		<table border="0">
			<tr>
				<td colspan="4" style="width: 300px;">
					<div align="right">
					<input type="reset" name="Batal" class="btn btn-secondary btn-md" value="Batal">
					
					<input type="submit" name="Simpan" class="btn btn-primary btn-md" value="Simpan" onmousedown="validasi()">
					</div>
				</td>
			</tr>
		</table>
	</center>
	</form>
</div>
<br>
<br>


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
	document.getElementById('kode_o').value = KoPG[kode_pg].kode;
	document.getElementById('nama_o').value = KoPG[kode_pg].nama;
	document.getElementById('jml').value = KoPG[kode_pg].jum;
	document.getElementById('satuan').value = KoPG[kode_pg].sat;
	document.getElementById('jml_in').value = KoPG[kode_pg].jum2;
	document.getElementById('satuan_in').value = KoPG[kode_pg].sat2;
	document.getElementById('nama_r').value = KoPG[kode_pg].ruang;
	};
	
</script>
<?php require('../modal_filter.php'); ?>
<?php require('bottom_menu.php'); ?>
<script type="text/javascript">
	function validasi() {
		var kode_pen=document.getElementById('kode_p').value;
		var tanggal_i=document.getElementById('tanggal').value;
		var kode_gud=document.getElementById('kode_pg').value;
		var kode_ob=document.getElementById('kode_o').value;
		var nm_o=document.getElementById('nama_o').value;
		var jum=document.getElementById('jml').value;
		var sat=document.getElementById('satuan').value;
		var jum2=document.getElementById('jml_in').value;
		var sat2=document.getElementById('satuan_in').value;
		var ruangan=document.getElementById('nama_r').value;
		if (kode_pen !="" && tanggal_i !="" && tanggal_i !=0 && kode_gud !=0 && kode_ob !="" && nm_o !="" && jum !="" && sat !="" && jum2 !="" && sat2 !="" && ruangan !=""){
			return true;
		}else{
			$('#exampleModalCenter').modal('show');
		}
	}
	
</script>