<?php 
	include ('./config/koneksi.php');
	include('header.php');

	if (isset($_POST['simpan'])) {
		//echo var_dump($_POST);
		$nama_departemen = $_POST['nama_departemen'];

		// menyimpan ke database
		mysqli_query($dbconnect, "INSERT INTO departemen VALUES ('', '$nama_departemen')");


		// mengalihkan halaman ke list barang
		header("location:departemen.php?alert=tambah_sukses");
	}
?>

	<div class="container">
		<h1>Tambah Departemen</h1>
		<form method="post">
			<div class="form-group">
				<label>Nama Departemen</label>
				<input type="text" name="nama_departemen" class="form-control" placeholder="Nama Departemen" required>
			</div>
		<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
		<a href="departemen.php" class="btn btn-warning">Kembali</a>
		</form>	
	</div>
<?php include ('footer.php'); ?>