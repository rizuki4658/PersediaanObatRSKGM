<?php

	$link=mysqli_connect('localhost','root','','db_rskgm_obat');

	$a = $_GET['kode_p'];

	$query = "DELETE FROM in_gudang WHERE kode_p='$a'";
	$hapus = mysqli_query($link, $query);
	if ($hapus) {
		header('location:master_in_gudang.php');
	}
?>