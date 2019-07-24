<?php

	$link=mysqli_connect('localhost','root','','db_rskgm_obat');

	$a = $_GET['kode'];

	$query = "DELETE FROM out_gudang WHERE kode='$a'";
	$hapus = mysqli_query($link, $query);
	if ($hapus) {
		header('location:master_out_gudang.php');
	}
?>