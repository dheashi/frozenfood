<?php 
	include './config/koneksi.php';

	if (isset($_GET['id'])) {
		
		$id = $_GET['id'];

		mysqli_query($dbconnect, "DELETE FROM bahanbaku WHERE id_bahan='$id' ");

		header("location:bahanbaku.php?alert=hapus_sukses");
	}
?>