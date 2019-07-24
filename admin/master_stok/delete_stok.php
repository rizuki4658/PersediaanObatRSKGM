<?php

	$link=mysqli_connect('localhost','root','','db_rskgm_obat');

	$a = $_GET['kode_obat'];

	$query = "DELETE FROM master_stok WHERE kode_obat='$a'";
	$hapus = mysqli_query($link, $query);
	if ($hapus) {
		header('location:master_stok.php');
	}
?>