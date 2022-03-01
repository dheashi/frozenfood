<?php 
	include ('./config/koneksi.php');
	include('header.php');

	if (isset($_POST['simpan'])) {
		//echo var_dump($_POST);
		$nama_bahan = $_POST['nama_bahan'];
		$stok_bahan = $_POST['stok_bahan'];
		$satuan = $_POST['satuan'];
		$id_departemen = $_POST['id_departemen'];

		// menyimpan ke database
		mysqli_query($dbconnect, "INSERT INTO bahanbaku VALUES ('', '$nama_bahan', '$stok_bahan', '$satuan',
			'$id_departemen')");


		// mengalihkan halaman ke list barang
		header("location:bahanbaku.php?alert=tambah_sukses");
	}
?>
	<div class="container">
		<h1>Tambah Bahan Baku</h1>
		<form method="post">
			<div class="form-group">
				<label>Nama Bahan</label>
				<input type="text" name="nama_bahan" class="form-control" placeholder="Nama Bahan" required>
			</div>
			<div class="form-group">
				<label>Stok Bahan</label>
				<input type="number" name="stok_bahan" class="form-control" placeholder="Stok Bahan" required>
			</div>
			<div class="form-group">
				<label>Satuan</label>
				<select name="satuan" class="form-control" id="satuan" required>
					<option disabled selected>Pilih</option>
					<option value="Kg">Kg</option>
					<option value="Liter">Liter</option>
				</select>
			</div>
			<div class="form-group">
				<label>Departemen</label>
				<select name="id_departemen" class="form-control" id="id_departemen" required>
				<option disabled selected>Pilih Departemen</option>
				<?php 
					$view = $dbconnect->query("SELECT * FROM departemen");
					while ($row = $view->fetch_array()) {
				?>
					<option value="<?=$row['id_departemen'] ?>"><?=$row['nama_departemen']?></option>
				<?php } ?>
				</select>
			</div>
		<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
		<a href="bahanbaku.php" class="btn btn-warning">Kembali</a>
		</form>	
	</div>
<?php include ('footer.php'); ?>