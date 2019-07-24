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
  //var_dump($_FILES);
	
  $a=$_POST['kode_o'];
	$b=$_POST['jml_in'];
	$c=$_POST['jml_out'];
  
  $unik=time();
  $nama=$_FILES['foto']['name'];
  $lokasi=$_FILES['foto']['tmp_name'];
  $error=$_FILES['foto']['error'];
  $ukuran=$_FILES['foto']['size'];
  $format=$_FILES['foto']['type'];
  $nama_tujuan='../../upload/'.$nama;

  //format2=pathinfo($nama, PATHINFO_EXTENSION);

  if ($error==0) {?>

    <?php if ($ukuran<1000000) { ?>
              <?php if ($format='image/jpeg' || $format='image/jpg') {?>
                      <?php if (file_exists($nama_tujuan)) {
                        $nama_tujuan=str_replace(".jpg", "", $nama_tujuan);
                        $nama_tujuan=$nama_tujuan."_".$unik.".jpg";
                        $up=move_uploaded_file($lokasi, $nama_tujuan);

                        $query="UPDATE master_stok SET jumlah_o_in='$b',jumlah_o_out='$c',foto='$nama_tujuan' WHERE kode_obat='$a'";
                        $execute=mysqli_query($link,$query);?>
                        
                              <?php if (!$execute) {?>
                                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 200px;">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content" style=" background-color: #343a40;">
                                          <div class="modal-body">
                                          <img src="../../gambar/warning.png" width="24" height="24">
                                          <br>
                                          <br>
                                            <center class="text text-light">Data Gagal Diubah!</center>
                                          <br>
                                          <div align="right"><a href="master_stok.php" class="btn btn-warning btn-md">OK</a></div>
                                        </div>
                                      </div>
                                      </div>
                                    </div>
                                  
                              <?php }else{ ?>
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 200px;">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content" style=" background-color: #343a40;">
                                          <div class="modal-body">
                                          <img src="../../gambar/checked.png" width="24" height="24">
                                          <br>
                                          <br>
                                            <center class="text text-light">Data Berhasil Diubah!</center>
                                          <br>
                                          <div align="right"><a href="master_stok.php" class="btn btn-success btn-md">OK</a></div>
                                        </div>
                                      </div>
                                      </div>
                                    </div>

                              <?php } ?>




                        <?php }else{ 
                        $up=move_uploaded_file($lokasi, $nama_tujuan);
                        $query="UPDATE master_stok SET jumlah_in='$b',jumlah_out='$c',foto='$nama_tujuan' WHERE kode_obat='$a'";
                        $execute=mysqli_query($link,$query);?>

                                <?php if (!$execute) {?>
                                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 200px;">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content" style=" background-color: #343a40;">
                                          <div class="modal-body">
                                          <img src="../../gambar/warning.png" width="24" height="24">
                                          <br>
                                          <br>
                                            <center class="text text-light">Data Gagal Diubah!</center>
                                          <br>
                                          <div align="right"><a href="master_stok.php" class="btn btn-warning btn-md">OK</a></div>
                                        </div>
                                      </div>
                                      </div>
                                    </div>
                                  
                                <?php }else{ ?>
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 200px;">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content" style=" background-color: #343a40;">
                                          <div class="modal-body">
                                          <img src="../../gambar/checked.png" width="24" height="24">
                                          <br>
                                          <br>
                                            <center class="text text-light">Data Berhasil Diubah!</center>
                                          <br>
                                          <div align="right"><a href="master_stok.php" class="btn btn-success btn-md">OK</a></div>
                                        </div>
                                      </div>
                                      </div>
                                    </div>

                                <?php } ?>
                        <?php } ?>
                <?php }else{ ?>


                      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 200px;">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content" style=" background-color: #343a40;">
                              <div class="modal-body">
                              <img src="../../gambar/warning.png" width="24" height="24">
                              <br>
                              <br>
                                <center class="text text-light">Format Tidak Sesuai!</center>
                              <br>
                              <div align="right"><a href="master_stok.php" class="btn btn-warning btn-md">OK</a></div>
                            </div>
                          </div>
                          </div>
                        </div>

                  <?php } ?>

    <?php }else{?>
         <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 200px;">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content" style=" background-color: #343a40;">
                    <div class="modal-body">
                    <img src="../../gambar/warning.png" width="24" height="24">
                    <br>
                    <br>
                      <center class="text text-light">Ukuran Gambar Tidak Sesuai!</center>
                    <br>
                    <div align="right"><a href="master_stok.php" class="btn btn-warning btn-md">OK</a></div>
                  </div>
                </div>
                </div>
              </div>
      <?php } ?>



<?php }else{?>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 200px;">
              <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content" style=" background-color: #343a40;">
              <div class="modal-body">
              <img src="../../gambar/warning.png" width="24" height="24">
              <br>
              <br>
              <center class="text text-light">Ada Error !</center>
            <br>
            <div align="right"><a href="master_stok.php" class="btn btn-warning btn-md">OK</a></div>
        </div>
      </div>
    </div>
</div>
<?php  }
?>
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