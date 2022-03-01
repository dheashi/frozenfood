<?php 
	include './config/koneksi.php';
	include 'header.php';

	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		//menampilkan data berdasarkan ID
		$data = mysqli_query($dbconnect, "SELECT * FROM bahanbaku where id_bahan='$id'");
		$data = mysqli_fetch_assoc($data);
	}

	if (isset($_POST['update'])) {
	$id = $_GET['id'];

	$nama_bahan = $_POST['nama_bahan'];
	$stok_bahan = $_POST['stok_bahan'];
	$satuan = $_POST['satuan'];
	$id_departemen = $_POST['id_departemen'];

	// menyimpan ke database
	mysqli_query($dbconnect, "UPDATE bahanbaku SET nama_bahan='$nama_bahan', stok_bahan='$stok_bahan', satuan='$satuan', id_departemen='$id_departemen' where id_bahan='$id' ");

	//menggunakan halaman ke list barang
	header("location:bahanbaku.php?alert=edit_sukses");
}
?>

<div class="container">
	<h1>Edit Bahan Baku</h1>
	<form method="post">
		<div class="form-group">
			<label>Nama Bahan</label>
			<input type="text" name="nama_bahan" class="form-control" placeholder="Nama Bahan" value="<?=$data['nama_bahan']?>">
		</div>
		<div class="form-group">
			<label>Stok Bahan</label>
			<input type="number" name="stok_bahan" class="form-control" placeholder="Stok Bahan" value="<?=$data['stok_bahan']?>">
		</div>
		<div class="form-group">
			<label>Satuan</label>
			<select name="satuan" class="form-control" id="satuan" required>
				<option disabled selected>Pilih</option>
				<?php $satuan = $data['satuan'] ?>
				<option <?=($satuan=='Kg') ? 'selected="selected"':''?>>Kg</option>
				<option <?=($satuan=='Liter') ? 'selected="selected"':''?>>Liter</option>
			</select>
		</div>
		<div class="form-group">
			<label>Departemen</label>
			<select name="id_departemen" class="form-control" id="id_departemen" required>
			<option disabled selected>Pilih Departemen</option>
			<?php
				$dep = $data['id_departemen']; 
				$view = $dbconnect->query("SELECT * FROM departemen");
				while ($row = $view->fetch_array()) {
				$ket="";
				if (isset($_GET['id'])) {
					if ($dep==$row['id_departemen']) 
					{
						$ket="selected";
					}
				}
			?>
				<option value="<?=$row['id_departemen'] ?>"><?=$row['nama_departemen']?></option>
			<?php } ?>
			</select>
		</div>	
	<input type="submit" name="update" value="Perbarui" class="btn btn-primary">
	<a href="bahanbaku.php" class="btn btn-warning">Kembali</a>
	</form>
</div>
<?php include ('footer.php'); ?>