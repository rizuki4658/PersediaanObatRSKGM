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
	<li class="breadcrumb-item active">Master Pengeluaran Gudang</li>
</ol>
 <br>

<!--koding php-->
<?php
	
	if (isset($_POST['cari'])) {
	$link=new mysqli('localhost','root','','db_rskgm_obat');
	$cari=$_POST['cari'];
	$cari=preg_replace("#[^a-z0-9]#i"," ", $cari);
    
	$halaman = 10;
    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
    $pencarian="SELECT * FROM out_gudang WHERE kode_p like '%$cari%' or kode_obat like '%$cari%' or nama_obat like '%$cari%' or jumlah like '%$cari%' or satuan like '%$cari%' or nama_pet like '%$cari%' or ruangan like '%$cari%'";
    $result = $link->query($pencarian);
    $total = mysqli_num_rows($result);
    $pages = ceil($total/$halaman);            
    $query = mysqli_query($link, $pencarian ."LIMIT $mulai, $halaman")or die(mysqli_error);
    $no =$mulai+1;
	$query2="SELECT * FROM out_gudang ORDER BY tanggal DESC";
	$execute2=mysqli_query($link,$query2);
	
	}else if((!isset($_POST['cari'])) || (empty($_POST['cari']))){

	$link=mysqli_connect('localhost','root','','db_rskgm_obat');
	$halaman = 10;
    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
    $result = mysqli_query($link,"SELECT * FROM out_gudang");
    $total = mysqli_num_rows($result);
    $pages = ceil($total/$halaman);            
    $query = mysqli_query($link,"select * from out_gudang LIMIT $mulai, $halaman")or die(mysqli_error);
    $no =$mulai+1;
	$query2="SELECT * FROM out_gudang ORDER BY tanggal DESC";
	$execute2=mysqli_query($link,$query2);	
	} 

?>
<!--Div Pertama-->
<div class="container" style="margin-left: 20px;">
	<!--Div Kedua-->
	<div class="card mb-3">
		<!--Div Ketiga-->
		<div class="card-header">
			<i class="fa fa-table"></i>&nbsp;Tabel Pengeluaran Gudang
		</div>
			<!--Div Ke-empat-->
			<div class="card-body">			
				<!--Div Ke-Lima-->
				<div class="table-responsive">
					<!--Tabel 1-->
					<table width="100%" cellspacing="0">
						<tr>
		              		<th colspan="5" style="width: 700px;">
		              			<a class="btn btn-primary btn-md" href="tambah_out_gudang.php" <?php if ($_SESSION['ses_level']!='Gudang') {
                          echo "style='pointer-events:none; opacity:0.5;'";
                        }else{
                          echo "";
                        }?> >
		              				<i class="fa fa-plus"></i>&nbsp;Pengeluaran
		              			</a>
		              		</th>
		              		<th>
		              			<form action="master_in_gudang.php" method="post">
		              			<input type="search" class="form-control" name="cari" placeholder="Cari data">
		              			</form>
		              		</th>
		              	</tr>
					</table>
					<p></p>

					<!--Tabel 2-->
					<table class="table table-bordered table-striped table-hover" width="100%" cellspacing="0">
						<thead>
						<tr>
							<th><center>No.</center></th>
							<th><center>Tanggal</center></th>
							<th><center>Kode Obat</center></th>
							<th><center>Nama Obat</center></th>
							<th><center>Jumlah</center></th>
							<th><center>Satuan</center></th>
							<th><center>Nama Petugas</center></th>
							<th><center>Ruangan</center></th>
							<th><center>Aksi</center></th>							
						</tr>
						</thead>
						<!--Koding php-->
						<?php
              				if (mysqli_num_rows($result) >0) {
							while ($data = mysqli_fetch_assoc($query)) {
					 ?>
						<tbody>
							<tr>
								<td><center><?php echo $no++; ?></center></td>
								<td><center><?php echo $data['tanggal']; ?></center></td>
								<td><center><?php echo $data['kode_obat']; ?></center></td>
								<td><?php echo $data['nama_obat']; ?></td>
								<td><center><?php echo $data['jumlah']; ?></center></td>
								<td><center><?php echo $data['satuan']; ?></center></td>
								<td><?php echo $data['nama_pet']; ?></td>
								<td><center><?php echo $data['ruangan']; ?></center></td>
								<td>
				                  	<center>
				                  	<a title="Edit" href="<?php echo "edit_out_gudang.php?kode=$data[kode]";?>" class="btn btn-success btn-sm" <?php if ($_SESSION['ses_level']!='Gudang') {
                          echo "style='pointer-events:none; opacity:0.5;'";
                        }else{
                          echo "";
                        }?> >
				                  		<i class="fa fa-edit"></i>
				                  	</a>
				                  	<a title="Hapus" onclick="return confirm('Anda Yakin Akan Menghapus data?')" href="<?php echo "delete_out_gudang.php?kode=$data[kode]";?>" class="btn btn-danger btn-sm" <?php if ($_SESSION['ses_level']!='Gudang') {
                          echo "style='pointer-events:none; opacity:0.5;'";
                        }else{
                          echo "";
                        }?> >
				                  		<i class="fa fa-trash"></i>
				                  	</a>
				                  	</center>
				                </td>
							</tr>
						</tbody>
						<!--Koding php-->
						<?php
              				}
              			}
						?>
					</table>

					<!--Div ke enam-->
					<div style="margin-left: 750px;">
                		<nav aria-label="...">
						  <ul class="pagination">
			          	<?php
			            if($page == 1){
			            ?>
            				<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
			            <?php
			            }else{
			              $link_prev = ($page > 1)? $page - 1 : 1;
			            ?>
            				<li class="page-item"><a class="page-link" href="?halaman=<?php echo $link_prev; ?>">Previous</a></li>
              			<?php } ?>
              			<?php for ($i=1; $i<=$pages ; $i++){$link_active = ($page == $i)? ' class="page-item active"' : ''; ?>

        					<li <?php echo $link_active;?>>
          						<a class="page-link active" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
         				 <?php } ?>
					        </li>
					     <?php
					        if($page == $total){
					     ?>
					         <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
					     <?php
					     }else{ 
					     $link_next = ($page < $total)? $page + 1 : $total;
					     ?>
					     <li class="page-item"><a class="page-link" href="?halaman=<?php echo $link_next; ?>">Next</a></li>
					     <?php
					     }
					     ?>
						  </ul>
						</nav>
					</div>
				
				</div><!--Penutup div lima-->
			</div><!--Penutup div empat-->

						<!--Div Ke tujuh-->
						<div class="card-footer small text-muted">Terakhir dirubah <?php $data2 = mysqli_fetch_assoc($execute2); 
        	echo $data2['tanggal']; ?>	
						</div>	

	</div><!--Penutup div dua-->
</div><!--Penutup div satu-->


 <?php require('bottom_menu.php'); ?>