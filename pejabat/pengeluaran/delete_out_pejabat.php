<?php

	$link=mysqli_connect('localhost','root','','db_rskgm_obat');

	$a = $_GET['id'];

	$query = "DELETE FROM out_pejabat WHERE id='$a'";
	$hapus = mysqli_query($link, $query);
	if ($hapus) {
		header('location:master_out_pejabat.php');
	}
?>