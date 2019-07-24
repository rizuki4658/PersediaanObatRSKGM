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
		<a href="master_in_gudang.php">Master Penerimaan Gudang</a>
	</li>
	<li class="breadcrumb-item active">Tambah Penerimaan</li>
</ol>
 <br>

<div class="container" style="margin-left: 20px;">	
	<form method="post" action="simpan_in_gudang.php">
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
				<td rowspan="13"><center><img src="../../gambar/warehouse.png" height="300px" width="300px" style="margin-left: 20px;"></center></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Kode Obat</td>
				<td>&nbsp;:&nbsp;</td>
				<td style="width: 300px;"><input type="text" name="kode_o" id="kode_o" class="form-control"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Nama Obat</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="text" name="nama_o" id="nama_o" class="form-control"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Jumlah Obat</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="number" name="jml_b" id="jml_b" class="form-control" style="width: 80px;"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;"></td>
				<td>&nbsp;:&nbsp;</td>
				<td>
					<select name="satuan_b" id="satuan_b" class="form-control" style="width: 200px;">
						<option value="0">~Pilih~</option>
						<option>Box/Dus</option>
						<option>Botol</option>
						<option>Lembar</option>
					</select>
				</td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Satuan Obat</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="number" name="jml_o" id="jml_o" class="form-control" style="width: 80px;"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;"></td>
				<td>&nbsp;:&nbsp;</td>
				<td>
					<select name="satuan_o" id="satuan_o" class="form-control" style="width: 200px;">
						<option value="0">~Pilih~</option>
						<option>Mg</option>
					</select>
				</td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Nama Petugas</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="text" name="nama_p" id="nama_p" class="form-control"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Nama Ruangan</td>
				<td>&nbsp;:&nbsp;</td>
				<td>
					<select name="nama_r" id="nama_r" class="form-control" style="width: 200px;">
						<option value="0">~Pilih~</option>
						<option>Farmasi Umum</option>
						<option>Farmasi BPJS</option>
					</select>
				</td>
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
<?php require('bottom_menu.php'); ?>
<script type="text/javascript">
	function validasi() {
		var kode_pen=document.getElementById('kode_p').value;
		var tanggal_i=document.getElementById('tanggal').value;
		var kode_ob=document.getElementById('kode_o').value;
		var nm_o=document.getElementById('nama_o').value;
		var jum1=document.getElementById('jml_b').value;
		var sat1=document.getElementById('satuan_b').value;
		var jum2=document.getElementById('jml_o').value;
		var sat2=document.getElementById('satuan_o').value;
		var ruangan=document.getElementById('nama_r').value;
		var nama=document.getElementById('nama_p').value;
		if (kode_pen !="" && tanggal_i !="" && tanggal_i !=0 && kode_ob !="" && nm_o !="" && jum1 !="" && sat1 !=0 && jum2 !="" && sat2 !=0 && ruangan !=0 && nama !=""){
			return true;
		}else{
			$('#exampleModalCenter').modal('show');
		}
	}
</script>