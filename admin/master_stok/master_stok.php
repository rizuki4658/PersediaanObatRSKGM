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
	<li class="breadcrumb-item active">Master Stok</li>
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
    $pencarian="SELECT * FROM master_stok WHERE kode_obat like '%$cari%' or nama_obat like '%$cari%' or jumlah_in like '%$cari%' or jumlah_out like '%$cari%' or satuan like '%$cari%' or ruangan like '%$cari%'";
    $result = $link->query($pencarian);
    $total = mysqli_num_rows($result);
    $pages = ceil($total/$halaman);            
    $query = mysqli_query($link, $pencarian ."LIMIT $mulai, $halaman")or die(mysqli_error);
    $no =$mulai+1;
	$query2="SELECT * FROM master_stok ORDER BY tanggal_in DESC";
	$execute2=mysqli_query($link,$query2);
	
	}else if((!isset($_POST['cari'])) || (empty($_POST['cari']))){

	$link=mysqli_connect('localhost','root','','db_rskgm_obat');
	$halaman = 10;
    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
    $result = mysqli_query($link,"SELECT * FROM master_stok");
    $total = mysqli_num_rows($result);
    $pages = ceil($total/$halaman);            
    $query = mysqli_query($link,"select * from master_stok LIMIT $mulai, $halaman")or die(mysqli_error);
    $no =$mulai+1;
	$query2="SELECT * FROM master_stok ORDER BY tanggal_in DESC";
	$execute2=mysqli_query($link,$query2);	
	} 

?>
<!--Div Pertama-->
<div class="container-fuild">
	<!--Div Kedua-->
	<div class="card mb-4">
			<!--Div Ke-empat-->
			<div class="card-body">			
				<!--Div Ke-Lima-->
				<div class="table-responsive">
					<!--Tabel 1-->
					<table width="100%" cellspacing="0">
						<tr>
		              		<th>
		              			<form action="master_stok.php" method="post">
		              			<input type="search" class="form-control" name="cari" placeholder="Cari data" style="width: 200px;">
		              			</form>
		              		</th>
		              	</tr>
					</table>
					<p></p>

					<!--Tabel 2-->
					<table class="table table-bordered">
						<thead>
						<tr style="background-color: #212529; color: white; ">
							<th style="font-size: 12px;"><center>No.</center></th>
							<th style="font-size: 12px;"><center>Kode</center></th>
							<th style="font-size: 12px;"><center>Nama</center></th>
							<th style="font-size: 12px;"><center>Masuk</center></th>
							<th style="font-size: 12px;"><center>Jumlah Masuk</center></th>
							<th style="font-size: 12px;"><center>Keluar</center></th>
							<th style="font-size: 12px;"><center>Jumlah Keluar</center></th>
							<th style="font-size: 12px;"><center>Sisa</center></th>
							<th style="font-size: 12px;"><center>Harga</center></th>
							<!--<th style="font-size: 12px;"><center>Foto</center></th>-->
							<th style="font-size: 12px;"><center>Ruangan</center></th>
							<th style="font-size: 12px;"><center>Aksi</center></th>
						</tr>
						</thead>
						<!--Koding php-->
						<?php
              				if (mysqli_num_rows($result) >0) {
							while ($data = mysqli_fetch_assoc($query)) {
								
										
								
					 	?>
						<tbody>
							<tr>
								<td style="font-size: 12px;"><center><?php echo $no++; ?></center></td>
								<td style="font-size: 12px;"><?php echo $data['kode_obat']; ?></td>
								<td style="font-size: 12px;"><?php echo $data['nama_obat']; ?></td>
								<td style="font-size: 12px;"><center><?php echo $data['tanggal_in']; ?></center></td>
								<td style="font-size: 12px; text-align: right;"><?php echo $data['jumlah_o_in']." ".$data['satuan_o_in']; ?></td>
								<td style="font-size: 12px;"><?php if (empty($data['tanggal_out'])) {
											echo "Belum Keluar";
											}else{
											echo $data['tanggal_out'];
												
											} ?>				
								</td>
								<td style="font-size: 12px; text-align: right;"><?php echo $data['jumlah_o_out']." ".$data['satuan_o_out']; ?></td>
								<td style="font-size: 12px; text-align: right;">
									<?php  
										$x=$data['jumlah_o_in']; 
										$y=$data['jumlah_o_out'];
										$z=$x-$y;
										echo $z." ".$data['satuan_o_out'];
									?>	
								</td>
								<td style="font-size: 12px; text-align: right;"><?php echo "Rp."." ".number_format($data['harga']); ?></td>
								<!--<td style="font-size: 12px;">
									<?php //echo "..".substr($data['foto'],6,10)."."."jpg"; ?>
								</td>-->
								<td style="font-size: 12px;"><center><?php echo $data['ruangan']; ?></center></td>
								<td style="font-size: 12px;">
				                  	<center>
				                  	<a title="Edit" href="<?php echo "edit_stok.php?kode_obat=$data[kode_obat]";?>" class="btn btn-success btn-sm" <?php if ($_SESSION['ses_level']!='Admin') {
                          echo "style='pointer-events:none; opacity:0.5;'";
                        }else{
                          echo "";
                        }?> >
				                  		<i class="fa fa-edit"></i>
				                  	</a>
				                  	<a title="Hapus" onclick="return confirm('Anda Yakin Akan Menghapus data?')" href="<?php echo "delete_stok.php?kode_obat=$data[kode_obat]";?>" class="btn btn-danger btn-sm" <?php if ($_SESSION['ses_level']!='Admin') {
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
        	echo $data2['tanggal_in']; ?>	
						</div>	

	</div><!--Penutup div dua-->
</div><!--Penutup div satu-->

<?php require('modal_filter.php'); ?>

 <?php require('bottom_menu.php'); ?>