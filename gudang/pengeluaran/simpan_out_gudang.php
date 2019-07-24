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

	
	$a=$_POST['kode'];
	$b=$_POST['tanggal'];
  $c=$_POST['kode_p'];
	$d=$_POST['kode_o'];
	$e=$_POST['nama_o'];
	$f=$_POST['jml'];
  $g=$_POST['satuan_o'];
  $h=$_POST['nama_p'];
  $i=$_POST['nama_r'];
  $j=$_POST['ket_o'];
  
	$query="INSERT INTO out_gudang(kode,tanggal,kode_p,kode_obat,nama_obat,jumlah,satuan,nama_pet,ruangan,ket) VALUES('".$a."','".$b."','".$c."','".$d."','".$e."','".$f."','".$g."','".$h."','".$i."','".$j."')";
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
        	<center class="text text-light">Data Gagal Disimpan!</center>
        <br>
        <div align="right"><a href="master_out_gudang.php" class="btn btn-warning btn-md">OK</a></div>
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
        	<center class="text text-light">Data Berhasil Disimpan!</center>
        <br>
        <div align="right"><a href="master_out_gudang.php" class="btn btn-success btn-md">OK</a></div>
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