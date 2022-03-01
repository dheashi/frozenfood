<?php 
	include './config/koneksi.php';
	include 'header.php';

	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		//menampilkan data berdasarkan ID
		$data = mysqli_query($dbconnect, "SELECT * FROM user where id_user='$id'");
		$data = mysqli_fetch_assoc($data);
	}

	if (isset($_POST['update'])) {
	$id = $_GET['id'];

	$nama_user = $_POST['nama_user'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['role'];
	$id_departemen = $_POST['id_departemen'];

	// menyimpan ke database
	mysqli_query($dbconnect, "UPDATE user SET nama_user='$nama_user', username='$username', password='$password', role='$role', id_departemen='$id_departemen' WHERE id_user='$id' ");

	//menggunakan halaman ke list barang
	header("location:user.php?alert=edit_sukses");
}
?>

<div class="container">
	<h1>Edit Barang</h1>
	<form method="post">
		<div class="form-group">
			<label>Nama User</label>
			<input type="text" name="nama_user" class="form-control" placeholder="Nama User" value="<?=$data['nama_user']?>">
		</div>
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control" placeholder="Username" value="<?=$data['username']?>">
		</div>
		<div class="form-group">
			<label>Passowrd</label>
			<input type="text" name="password" class="form-control" placeholder="Password" value="<?=$data['password']?>">
		</div>
		<div class="form-group">
			<label>Role</label>
			<select name="role" class="form-control" id="role" required>
				<option disabled selected>Pilih</option>
				<?php $role = $data['role'] ?>
				<option <?=($role=='Super Admin') ? 'selected="selected"':''?>>Super Admin</option>
				<option <?=($role=='Manajer') ? 'selected="selected"':''?>>Manajer</option>
				<option <?=($role=='Admin') ? 'selected="selected"':''?>>Admin</option>
				<option <?=($role=='Suplier') ? 'selected="selected"':''?>>Suplier</option>
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
			<option <?php echo $ket;?> value="<?php echo $row['id_departemen'];?>"><?php echo $row['nama_departemen'];?></option>
			<?php } ?>
			</select>
		</div>	
	<input type="submit" name="update" value="Perbarui" class="btn btn-primary">
	<a href="user.php" class="btn btn-warning">Kembali</a>
	</form>
</div>
<?php include ('footer.php'); ?>