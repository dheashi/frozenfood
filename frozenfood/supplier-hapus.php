<?php 
	include './config/koneksi.php';

	if (isset($_GET['id'])) {
		
		$id = $_GET['id'];

		mysqli_query($dbconnect, "DELETE FROM supplier WHERE id_supplier='$id' ");

		header("location:supplier.php?alert=hapus_sukses");
	}
?>