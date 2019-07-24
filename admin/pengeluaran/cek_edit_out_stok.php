<!DOCTYPE html>
<html>
<head>
	<title>Loading</title>
	<link href='../../gambar/Lambang_Kota_Bandung.svg.png' rel='shortcut icon'>
  <!-- Bootstrap core CSS-->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">
</head>
<body>

<?php
	$link=mysqli_connect('localhost','root','','db_rskgm_obat');

	$a=$_POST['kode_p'];
  $b=$_POST['tanggal'];
  $c=$_POST['kode_pg'];
  $d=$_POST['kode_o'];
  $e=$_POST['nama_o'];
  $f=$_POST['jml'];
  $f1=$_POST['jml2'];

  $g=$_POST['harga'];
  $gP=preg_replace("#[^a-z0-9]#i","",$g);

  $h=$_POST['satuan_o'];
  $h1=$_POST['satuan_o2'];
  $i=$_POST['nama_r'];
  
  $cek="SELECT * FROM master_stok WHERE kode_obat='$d'";
  $hasil=mysqli_query($link,$cek);
  if (mysqli_num_rows($hasil) > 0) {
    while ($data = mysqli_fetch_assoc($hasil)) {
     $j= $data['jumlah_o_out'];
      $x=$data['jumlah_out'];
      $ubah="UPDATE master_stok SET tanggal_out='$b',jumlah_o_out='$j'+'$f',jumlah_out='$x'+'$f1',harga='$gP',satuan_o_out='$h',satuan_out='$h1' WHERE kode_obat='$d'";
      
      $aksi=mysqli_query($link,$ubah);
    }
  }


 $query="UPDATE in_stok SET tanggal='$b',kode_pg='$c',kode_obat='$d',nama_obat='$e',jumlah='$f',satuan='$h',jumlah_in='0',satuan_in='Mg',jumlah_out='$f1',satuan_out='$h1',harga='$gP',ruangan='$i',ket='Keluar' WHERE kode='$a'";
	$execute=mysqli_query($link,$query);
	if (!$execute) {		
	?>
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 200px;">
  		<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content" style=" background-color: #343a40;">
      	<div class="modal-body">
        <img src="../../gambar/warning.png" width="24" height="24">
        <br>
        <br>
        	<center class="text text-light">Data Gagal Diubah!</center>
        <br>
        <div align="right"><a href="master_out_stok.php" class="btn btn-warning btn-md">OK</a></div>
      </div>
    </div>
  	</div>
	</div>
<?php }else{
?>
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 200px;">
  		<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content" style=" background-color: #343a40;">
      	<div class="modal-body">
        <img src="../../gambar/checked.png" width="24" height="24">
        <br>
        <br>
        	<center class="text text-light">Data Berhasil Diubah!</center>
        <br>
        <div align="right"><a href="master_out_stok.php" class="btn btn-success btn-md">OK</a></div>
      </div>
    </div>
  	</div>
	</div>

<?php } ?>

<script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../../vendor/chart.js/Chart.min.js"></script>
    <script src="../../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../../js/sb-admin-datatables.min.js"></script>
    <script src="../../js/sb-admin-charts.min.js"></script>

</body>
</html>
<script type="text/javascript">
	
			$('#exampleModalCenter').modal('show');
	
</script>