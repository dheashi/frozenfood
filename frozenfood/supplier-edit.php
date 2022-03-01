<?php 
	include './config/koneksi.php';
	include 'header.php';

	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		//menampilkan data berdasarkan ID
		$data = mysqli_query($dbconnect, "SELECT * FROM supplier where id_supplier='$id'");
		$data = mysqli_fetch_assoc($data);
	}

	if (isset($_POST['update'])) {
	$id = $_GET['id'];

	$nama_supplier = $_POST['nama_supplier'];
	$alamat_supplier = $_POST['alamat_supplier'];		
	$kontak_supplier = $_POST['kontak_supplier'];
	$username = $_POST['username'];
	$password = $_POST['password'];	

	// menyimpan ke database
	mysqli_query($dbconnect, "UPDATE supplier SET nama_supplier='$nama_supplier', alamat_supplier='$alamat_supplier', kontak_supplier='$kontak_supplier', username='$username', password='$password' where id_supplier='$id' ");

	//menggunakan halaman ke list barang
	header("location:supplier.php?alert=edit_sukses");
}
?>

<div class="container">
	<h1>Edit Supplier</h1>
	<form method="post">
		<div class="form-group">
			<label>Nama Supplier</label>
			<input type="text" name="nama_supplier" class="form-control" placeholder="Nama Supplier" value="<?=$data['nama_supplier']?>">
		</div>
		<div class="form-group">
			<label>Alamat Supplier</label>
			<input type="text" name="alamat_supplier" class="form-control" placeholder="Alamat Supplier" value="<?=$data['alamat_supplier']?>">
		</div>
		<div class="form-group">
			<label>Kontak Supplier</label>
			<input type="text" name="kontak_supplier" class="form-control" placeholder="Kontak Supplier" value="<?=$data['kontak_supplier']?>">
		</div>
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control" placeholder="Username" value="<?=$data['username']?>">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="text" name="password" class="form-control" placeholder="Password" value="<?=$data['password']?>">
		</div>

	<input type="submit" name="update" value="Perbarui" class="btn btn-primary">
	<a href="supplier.php" class="btn btn-warning">Kembali</a>
	</form>
</div>
<?php include ('footer.php'); ?>