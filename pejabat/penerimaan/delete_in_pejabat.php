<?php

	$link=mysqli_connect('localhost','root','','db_rskgm_obat');

	$id_p = $_GET['id'];

	$query = "DELETE FROM in_pejabat WHERE id=$id_p";
	$hapus = mysqli_query($link, $query);
	if ($hapus) {
		header('location:master_in_pejabat.php');
	}
?>