<?php 
	include './config/koneksi.php';

	if (isset($_GET['id'])) {
		
		$id = $_GET['id'];

		mysqli_query($dbconnect, "DELETE FROM departemen WHERE id_departemen='$id' ");

		header("location:departemen.php?alert=hapus_sukses");
	}
?>