
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>RSKGM Persediaan Obat</title>
  <link href='../gambar/Lambang_Kota_Bandung.svg.png' rel='shortcut icon'>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark" style="background-image: url(../gambar/head1.jpg);">
  <div class="container" style="width: 500px; margin-top: 100px;">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">
          <center><img src="../gambar/logo.png" width="150px"></center>
          <br>
          <center>SISTEM INFORMASI PERSEDIAAN</center>
      </div>
      <div class="card-body">
        <form action="cek_login.php?OP=in" method="POST">
          <div class="form-group">
            <label for="exampleInputUsername">Username</label>
            <input class="form-control" name="User" id="username" type="text" aria-describedby="nameHelp" placeholder="Username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" name="Pass" id="password" type="password" placeholder="Password">
          </div>
                <input type="submit" name="Login" value="Login" onmousedown="validasi()" class="btn btn-primary btn-block">
        </form>
      </div>
    </div>
  </div>




<div class="modal fade" id="ModalPesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 200px;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <img src="../gambar/warning (1).png" width="24" height="24">
        <br>
        <br>
          <center class="text text-dark">Data Belum Lengkap!</center>
        <br>
        <div align="right"><button type="button" class="btn btn-primary" data-dismiss="modal">OK</button></div>
      </div>
    </div>
  </div>
</div>


  <!-- Bootstrap core JavaScript-->
  <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../js/sb-admin-datatables.min.js"></script>
    <script src="../js/sb-admin-charts.min.js"></script>
 
</body>

</html>
 <script type="text/javascript">
  function validasi() {
    var nama=document.getElementById('username').value;
    var sandi=document.getElementById('password').value;
    
    if (nama !="" && sandi !=""){
       return true;
    }else{
     $('#ModalPesan').modal('show');
    }
  }
</script>