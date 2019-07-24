<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SI | Persediaan Obat</title>
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

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <?php
      $link=mysqli_connect('localhost','root','','db_rskgm_obat');
                $pejabat_in="SELECT * FROM in_pejabat ORDER BY tanggal DESC";
                $pejabat_out="SELECT * FROM out_pejabat ORDER BY tanggal DESC";
                $cek_pej_in=mysqli_query($link,$pejabat_in);
                $cek_pej_out=mysqli_query($link,$pejabat_out);
                
                $gudang_in="SELECT * FROM in_gudang ORDER BY tanggal DESC";
                $gudang_out="SELECT * FROM out_gudang ORDER BY tanggal DESC";
                $cek_gud_in=mysqli_query($link,$gudang_in);
                $cek_gud_out=mysqli_query($link,$gudang_out);
                
                $stok_in="SELECT * FROM in_stok WHERE ket='Masuk' ORDER BY tanggal DESC";
                $stok_out="SELECT * FROM in_stok WHERE ket='Keluar' ORDER BY tanggal DESC";
                $cek_stok_in=mysqli_query($link,$stok_in);
                $cek_stok_out=mysqli_query($link,$stok_out);
              if (mysqli_num_rows($cek_pej_in) > 0 && mysqli_num_rows($cek_pej_out)>0 && mysqli_num_rows($cek_gud_in)>0 && mysqli_num_rows($cek_gud_out)>0 && mysqli_num_rows($cek_stok_in)>0 && mysqli_num_rows($cek_stok_out)>0) {

                $p_i=mysqli_fetch_assoc($cek_pej_in);
                $p_o=mysqli_fetch_assoc($cek_pej_out);

                $g_i=mysqli_fetch_assoc($cek_gud_in);
                $g_o=mysqli_fetch_assoc($cek_gud_out);

                $s_i=mysqli_fetch_assoc($cek_stok_in);
                $s_o=mysqli_fetch_assoc($cek_stok_out);
      ?>
                
  <!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="../index.php"><img src="../../gambar/logo.png" height="40"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Beranda">
          <a class="nav-link" href="../index.php">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Beranda</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Penerimaan Obat">
          <a class="nav-link" href="../penerimaan/master_in_stok.php">
            <i class="fa fa-fw fa-download"></i>
            <span class="nav-link-text">Penerimaan Obat</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pengeluaran Obat">
          <a class="nav-link" href="../pengeluaran/master_out_stok.php">
            <i class="fa fa-fw fa-upload"></i>
            <span class="nav-link-text">Pengeluaran Obat</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Persediaan Obat">
          <a class="nav-link" href="master_stok.php">
            <i class="fa fa-fw fa-line-chart"></i>
            <span class="nav-link-text">Persediaan Obat</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Laporan">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-list-alt"></i>
            <span class="nav-link-text">Laporan</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#LaporanPenerimaan"><i class="fa fa-fw fa-list"></i>Laporan Penerimaan</a>
              <ul class="sidenav-third-level collapse" id="LaporanPenerimaan">
                <li>
                  <a href="#" data-toggle="modal" data-target="#ModalTGLPEN"><i class="fa fa-fw fa-calendar"></i>Per Tanggal</a>
                </li>
                <li>
                  <a href="#" data-toggle="modal" data-target="#ModalKDO" ><i class="fa fa-fw fa-tag"></i>Per Kode Obat</a>
                </li>
                <li>
                  <a href="#" data-toggle="modal" data-target="#ModalRUA"><i class="fa fa-fw fa-codepen"></i>Per Ruangan</a>
                </li>
              </ul>
            </li>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#LaporanPengeluaran"><i class="fa fa-fw fa-list"></i>Laporan Pengeluaran</a>
              <ul class="sidenav-third-level collapse" id="LaporanPengeluaran">
                <li>
                  <a href="#" data-toggle="modal" data-target="#ModalTGLPENG" ><i class="fa fa-fw fa-calendar"></i>Per Tanggal</a>
                </li>
                <li>
                  <a href="#" data-toggle="modal" data-target="#ModalKDOPENG"><i class="fa fa-fw fa-tag"></i>Per Kode Obat</a>
                </li>
                <li>
                  <a href="#" data-toggle="modal" data-target="#ModalRUAPENG"><i class="fa fa-fw fa-codepen"></i>Per Ruangan</a>
                </li>
              </ul>
            </li>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="modal" href="#ModalSTOK"><i class="fa fa-fw fa-area-chart"></i>Laporan Stok</a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bookmark"></i>
            <span class="d-lg-none">Baru
              <span class="badge badge-pill badge-primary">1 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle" style="color: green;"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">Update Terbaru</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Masukan Pejabat!</strong>
              <span class="small float-right text-muted"><?php echo date('d M y',strtotime($p_i['tanggal'])); ?></span>
              <div class="dropdown-message small"> 
                <b>Kode Obat <?php echo $p_i['kode_obat'];?></b><br>
                <b>Nama Distributor <?php echo $p_i['nama_distributor'];?></b>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Keluaran Pejabat</strong>
              <span class="small float-right text-muted"><?php echo date('d M y',strtotime($p_o['tanggal'])); ?></span>
              <div class="dropdown-message small">
                <b>Kode Obat <?php echo $p_o['kode_obat'];?></b><br>
                <b>Nama Penerima <?php echo $p_o['nama_penerima'];?></b>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">Copyright © celeno 2018</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-comments"></i>
            <span class="d-lg-none">Baru
              <span class="badge badge-pill badge-primary">1 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">Update Terbaru</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Masukan Gudang!</strong>
              <span class="small float-right text-muted"><?php echo date('d M y',strtotime($g_i['tanggal'])); ?></span>
              <div class="dropdown-message small"> 
                <b>Kode Obat <?php echo $g_i['kode_obat'];?></b><br>
                <b>jumlah <?php echo $g_i['jumlah1']." ".$g_i['satuan1'];?></b>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Keluaran Gudang</strong>
              <span class="small float-right text-muted"><?php echo date('d M y',strtotime($g_o['tanggal'])); ?></span>
              <div class="dropdown-message small">
                <b>Kode Obat <?php echo $g_o['kode_obat'];?></b><br>
                <b>jumlah <?php echo $g_o['jumlah']." ".$g_o['satuan'];?></b>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">Copyright © celeno 2018</a>
          </div>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bar-chart"></i>
            <span class="d-lg-none">Status Stok
              <span class="badge badge-pill badge-warning">2 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">Status Stok</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Masuk</strong>
              </span>
              <span class="small float-right text-muted"><?php echo date('d M y',strtotime($s_i['tanggal']));?></span>
              <div class="dropdown-message small">
                <b>Kode Obat : <?php echo $s_i['kode_obat'];?></b><br>
                <b>Jumlah Baru Masuk : <?php echo $s_i['jumlah_in']." ".$s_i['satuan'];?></b>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Keluar</strong>
              </span>
              <span class="small float-right text-muted"><?php echo date('d M y',strtotime($s_o['tanggal']));?></span>
              <div class="dropdown-message small">
                <b>Kode Obat : <?php echo $s_o['kode_obat'];?></b><br>
                <b>Jumlah Baru Masuk : <?php echo $s_o['jumlah_out']." ".$s_o['satuan'];?></b></div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">Copyright © celeno 2018</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../login_register/register.html">
            <i class="fa fa-fw fa-user"></i>Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i><?php echo $_SESSION['ses_user']; ?></a>
        </li>
      </ul>
    </div>
  </nav>
      <?php 
    }else{
      ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="../index.php"><img src="../../gambar/logo.png" height="40"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Beranda">
          <a class="nav-link" href="../index.php">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Beranda</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Penerimaan Obat">
          <a class="nav-link" href="../penerimaan/master_in_stok.php">
            <i class="fa fa-fw fa-download"></i>
            <span class="nav-link-text">Penerimaan Obat</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pengeluaran Obat">
          <a class="nav-link" href="../pengeluaran/master_out_stok.php">
            <i class="fa fa-fw fa-upload"></i>
            <span class="nav-link-text">Pengeluaran Obat</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Persediaan Obat">
          <a class="nav-link" href="master_stok.php">
            <i class="fa fa-fw fa-line-chart"></i>
            <span class="nav-link-text">Persediaan Obat</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Laporan">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-list-alt"></i>
            <span class="nav-link-text">Laporan</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#LaporanPenerimaan"><i class="fa fa-fw fa-list"></i>Laporan Penerimaan</a>
              <ul class="sidenav-third-level collapse" id="LaporanPenerimaan">
                <li>
                  <a href="#" data-toggle="modal" data-target="#ModalTGLPEN"><i class="fa fa-fw fa-calendar"></i>Per Tanggal</a>
                </li>
                <li>
                  <a href="#" data-toggle="modal" data-target="#ModalKDO" ><i class="fa fa-fw fa-tag"></i>Per Kode Obat</a>
                </li>
                <li>
                  <a href="#" data-toggle="modal" data-target="#ModalRUA"><i class="fa fa-fw fa-codepen"></i>Per Ruangan</a>
                </li>
              </ul>
            </li>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#LaporanPengeluaran"><i class="fa fa-fw fa-list"></i>Laporan Pengeluaran</a>
              <ul class="sidenav-third-level collapse" id="LaporanPengeluaran">
                <li>
                  <a href="#" data-toggle="modal" data-target="#ModalTGLPENG" ><i class="fa fa-fw fa-calendar"></i>Per Tanggal</a>
                </li>
                <li>
                  <a href="#" data-toggle="modal" data-target="#ModalKDOPENG"><i class="fa fa-fw fa-tag"></i>Per Kode Obat</a>
                </li>
                <li>
                  <a href="#" data-toggle="modal" data-target="#ModalRUAPENG"><i class="fa fa-fw fa-codepen"></i>Per Ruangan</a>
                </li>
              </ul>
            </li>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="modal" href="#ModalSTOK"><i class="fa fa-fw fa-area-chart"></i>Laporan Stok</a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bookmark"></i>
            <span class="d-lg-none">Baru
              <span class="badge badge-pill badge-primary">1 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle" style="color: green;"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">Update Terbaru</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Masukan Pejabat!</strong>
              <span class="small float-right text-muted"><?php echo "-"; ?></span>
              <div class="dropdown-message small"> 
                <b>Kode Obat <?php echo "-"; ?></b><br>
                <b>Nama Distributor <?php echo "-"; ?></b>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Keluaran Pejabat</strong>
              <span class="small float-right text-muted"><?php echo "-"; ?></span>
              <div class="dropdown-message small">
                <b>Kode Obat <?php echo "-"; ?></b><br>
                <b>Nama Penerima <?php echo "-"; ?></b>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">Copyright © celeno 2018</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-comments"></i>
            <span class="d-lg-none">Baru
              <span class="badge badge-pill badge-primary">1 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">Update Terbaru</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Masukan Gudang!</strong>
              <span class="small float-right text-muted"><?php echo "-"; ?></span>
              <div class="dropdown-message small"> 
                <b>Kode Obat <?php echo "-"; ?></b><br>
                <b>jumlah <?php echo "-"; ?></b>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Keluaran Gudang</strong>
              <span class="small float-right text-muted"><?php echo "-"; ?></span>
              <div class="dropdown-message small">
                <b>Kode Obat <?php echo "-";?></b><br>
                <b>jumlah <?php echo "-";?></b>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">Copyright © celeno 2018</a>
          </div>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bar-chart"></i>
            <span class="d-lg-none">Status Stok
              <span class="badge badge-pill badge-warning">2 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">Status Stok</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Masuk</strong>
              </span>
              <span class="small float-right text-muted"><?php echo "-";?></span>
              <div class="dropdown-message small">
                <b>Kode Obat : <?php echo "-";?></b><br>
                <b>Jumlah Baru Masuk : <?php echo "-";?></b>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Keluar</strong>
              </span>
              <span class="small float-right text-muted"><?php echo "-";?></span>
              <div class="dropdown-message small">
                <b>Kode Obat : <?php echo "-";?></b><br>
                <b>Jumlah Baru Masuk : <?php echo "-";?></b></div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">Copyright © celeno 2018</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../login_register/register.html">
            <i class="fa fa-fw fa-user"></i>Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i><?php echo $_SESSION['ses_user']; ?></a>
        </li>
      </ul>
      <?php 
    }
      ?>
    </div>
  </nav>

  <div class="content-wrapper">
