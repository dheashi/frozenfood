<?php 
	include ('./config/koneksi.php');
	include('header.php');

	if (isset($_POST['simpan'])) {
		//echo var_dump($_POST);
		$nama_supplier = $_POST['nama_supplier'];
		$alamat_supplier = $_POST['alamat_supplier'];
		$kontak_supplier = $_POST['kontak_supplier'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		// menyimpan ke database
		mysqli_query($dbconnect, "INSERT INTO supplier VALUES ('', '$nama_supplier', '$alamat_supplier', '$kontak_supplier', '$username', '$password')");


		// mengalihkan halaman ke list barang
		header("location:supplier.php?alert=tambah_sukses");
	}
?>

	<div class="container">
		<h1>Tambah Supplier</h1>
		<form method="post">
			<div class="form-group">
				<label>Nama Supplier</label>
				<input type="text" name="nama_supplier" class="form-control" placeholder="Nama Supplier" required>
			</div>
			<div class="form-group">
				<label>Alamat Supplier</label>
				<input type="text" name="alamat_supplier" class="form-control" placeholder="Alamat Supplier" required>
			</div>
			<div class="form-group">
				<label>Kontak Supplier</label>
				<input type="text" name="kontak_supplier" class="form-control" placeholder="Kontak Supplier" required>
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control" placeholder="Username" required>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="text" name="password" class="form-control" placeholder="Password" required>
			</div>
		<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
		<a href="supplier.php" class="btn btn-warning">Kembali</a>
		</form>	
	</div>
<?php include ('footer.php'); ?>