<?php

	$link=mysqli_connect('localhost','root','','db_rskgm_obat');

	$a = $_GET['kode'];

	$query = "DELETE FROM in_stok WHERE kode='$a'";
	$hapus = mysqli_query($link, $query);
	if ($hapus) {
		header('location:master_out_stok.php');
	}
?>