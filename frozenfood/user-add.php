<?php 
	include ('./config/koneksi.php');
	include('header.php');

	if (isset($_POST['simpan'])) {
		//echo var_dump($_POST);
		$nama_user = $_POST['nama_user'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$role = $_POST['role'];
		$id_departemen = $_POST['id_departemen'];

		// menyimpan ke database
		mysqli_query($dbconnect, "INSERT INTO user VALUES ('', '$nama_user', '$username', '$password', '$role', '$id_departemen')");


		// mengalihkan halaman ke list barang
		header("location:user.php?alert=tambah_sukses");
	}
?>
	<div class="container">
		<h1>Tambah User</h1>
		<form method="post">
			<div class="form-group">
				<label>Nama User</label>
				<input type="text" name="nama_user" class="form-control" placeholder="Nama User" required>
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control" placeholder="Username" required>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="text" name="password" class="form-control" placeholder="Password" required>
			</div>
			<div class="form-group">
				<label>Role</label>
				<select name="role" class="form-control" id="role" required>
					<option disabled selected>Pilih</option>
					<option value="Super Admin">Super Admin</option>
					<option value="Admin">Admin</option>
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
		<a href="user.php" class="btn btn-warning">Kembali</a>
		</form>	
	</div>
<?php include ('footer.php'); ?>