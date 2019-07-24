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
		<a href="master_out_pejabat.php">Master Permintaan Pejabat</a>
	</li>
	<li class="breadcrumb-item active">Tambah Permintaan</li>
</ol>
 <br>

<div class="container" style="margin-left: 20px;">	
	<form method="post" action="simpan_out_pejabat.php">
		<table>
			<tr>
				<td>Tanggal</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="date" name="tanggal" id="tanggal" class="form-control"></td>
			</tr>
		</table><hr style="margin-right: 20px;">

	<center>
		<table border="0">
			<tr>
				<td style="width: 200px; height: 50px;"><i style="color: red;"></i>Kode Penerimaan</td>
				<td>&nbsp;:&nbsp;</td>
				<td style="width: 300px;"><select name="kode_og" id="kode_og" onchange="changeValue(this.value)" class="form-control">
									<?php
									$link=mysqli_connect('localhost','root','','db_rskgm_obat');
									$hasil = mysqli_query($link,"select * from out_gudang");
									$javaArray = "var KoPG = new Array();\n";
									echo "<option value='0' dselected/>Pilih</option>";
									while ($row = mysqli_fetch_array($hasil)) {

										echo "<option value='".$row['kode']."'>".$row['kode']."</option>";
										$javaArray .= "KoPG['" . $row['kode'] . "'] = {kode_p:'" . addslashes($row['kode_obat']) . "',nama:'" . addslashes($row['nama_obat']) . "',sat:'" . addslashes($row['satuan']) . "',jum:'" . addslashes($row['jumlah']) . "'};\n";
									}
									mysqli_close($link);
									?>
								</select></td>
				<td rowspan="15"><center><img src="../../gambar/businessman.png" height="300px" width="300px"></center></td>
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
				<td><input type="text" name="jml1" id="jml1" class="form-control" style="width: 120px;" readonly="true"></td>
			</tr>
			<tr>
				<td style="width: 200px; height: 50px;"></td>
				<td>&nbsp;&nbsp;</td>
				<td><input type="text" name="satuan_o1" id="satuan_o1" class="form-control" style="width: 120px;" readonly="true"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Satuan Obat</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="number" name="jml2" id="jml2" class="form-control" style="width: 120px;"></td>
			</tr>
			<tr>
				<td style="width: 200px; height: 50px;"></td>
				<td>&nbsp;&nbsp;</td>
				<td>
					<select name="satuan_o2" id="satuan_o2" class="form-control" style="width: 120px;">
						<option value="0">~Pilih~</option>
						<option>Mg</option>	
					</select>
				</td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Harga</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="text" name="harga" id="harga" class="form-control" style="width: 120px;" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Nama Pejabat</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="text" name="nama_p" id="nama_p" class="form-control"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Nama Supplier</td>
				<td>&nbsp;:&nbsp;</td>
				<td><input type="text" name="nama_po" id="nama_po" class="form-control"></td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td style="width: 200px; height: 50px;">Hasil Cek</td>
				<td>&nbsp;:&nbsp;</td>
				<td><select name="hasil_c" id="hasil_c" class="form-control" style="width: 150px;">
						<option value="0">~Pilih~</option>
						<option>Sesuai</option>
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
	function changeValue(kode_og){
	document.getElementById('kode_o').value = KoPG[kode_og].kode_p;
	document.getElementById('nama_o').value = KoPG[kode_og].nama;
	document.getElementById('satuan_o1').value = KoPG[kode_og].sat;
	document.getElementById('jml1').value = KoPG[kode_og].jum;
	};
	
</script>

<?php require('angka.php'); ?>
<?php require('modal_filter.php');?> 
<?php require('bottom_menu.php'); ?>

<script type="text/javascript">
	function validasi() {
		var aP=document.getElementById('tanggal').value;
		var bP=document.getElementById('kode_og').value;
		var cP=document.getElementById('kode_o').value;
		var dP=document.getElementById('nama_o').value;
		var eP=document.getElementById('satuan_o1').value;
		var fP=document.getElementById('jml1').value;
		var xP=document.getElementById('satuan_o2').value;
		var yP=document.getElementById('jml2').value;
		var gP=document.getElementById('harga').value;
		var hP=document.getElementById('nama_p').value;
		var iP=document.getElementById('nama_po').value;
		var jP=document.getElementById('hasil_c').value;
		if (aP !="" && aP !=0 && bP !="" && bP !=0 && cP !="" && dP !="" && eP !="" && fP !="" && gP !="" && hP !="" && xP !="" && yP !="" ){
			return true;
		}else{
			$('#exampleModalCenter').modal('show');
		}
	}
</script>