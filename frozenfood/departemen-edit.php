<?php 
	include './config/koneksi.php';
	include 'header.php';

	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		//menampilkan data berdasarkan ID
		$data = mysqli_query($dbconnect, "SELECT * FROM departemen where id_departemen='$id'");
		$data = mysqli_fetch_assoc($data);
	}

	if (isset($_POST['update'])) {
	$id = $_GET['id'];

	$nama_departemen = $_POST['nama_departemen'];

	// menyimpan ke database
	mysqli_query($dbconnect, "UPDATE departemen SET nama_departemen='$nama_departemen' where id_departemen='$id' ");

	//menggunakan halaman ke list barang
	header("location:departemen.php?alert=edit_sukses");
}
?>

<div class="container">
	<h1>Edit Barang</h1>
	<form method="post">
		<div class="form-group">
			<label>Nama Departemen</label>
			<input type="text" name="nama_departemen" class="form-control" placeholder="Nama Departemen" value="<?=$data['nama_departemen']?>">
		</div>
	<input type="submit" name="update" value="Perbarui" class="btn btn-primary">
	<a href="departemen.php" class="btn btn-warning">Kembali</a>
	</form>
</div>
<?php include ('footer.php'); ?>