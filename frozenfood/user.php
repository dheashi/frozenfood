<?php 
	include './config/koneksi.php';
	include 'header.php';
	$view = $dbconnect->query("SELECT * FROM user INNER JOIN departemen ON user.id_departemen = departemen.id_departemen;");
?>

	<div class="container">
		<br>
		<?php 
			if (isset($_GET['alert'])){
				if ($_GET['alert']=='tambah_sukses'){
					?>
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon">Berhasil !</i></h4>
						User sudah ditambahkan
					</div>
					<?php 
				}
				elseif ($_GET['alert']=="edit_sukses"){
					?>
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon">Berhasil !</i></h4>User sudah diperbarui
					</div>
					<?php 
				}
				elseif ($_GET['alert']=="hapus_sukses"){
					?>
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon">Berhasil !</i></h4>User sudah dihapus
					</div>
				<?php
				}				
			}
		?>
		<h2>Data User</h2>
    	<a href="user-add.php"><button class="btn btn-success">Tambah Data</button></a>
    	<br><br/>
		<table class="table table-hover">
			<thead>
			  <tr>
			    <th>No</th>
			    <th>Nama User</th>
			    <th>Username</th>
			    <th>Password</th>
			    <th>Role</th>
			    <th>Departemen</th>
			    <th>Action</th>
			  </tr>
			  <?php 
			  	$no=0;
			  		while ($row = $view->fetch_array()) {
			  	$no++;
			  ?>
			</thead>
			<tbody>
			  <tr>
			    <td><?= $no;?></td>
			    <td><?= $row['nama_user'] ?></td>
			    <td><?= $row['username'] ?></td>
			    <td><?= $row['password'] ?></td>
			    <td><?= $row['role'] ?></td>
			    <td><?= $row['nama_departemen'] ?></td>
			    <td>
			    	<a href="user-edit.php?id=<?= $row['id_user']?>"><button class="btn btn-primary">Edit</button></a>
			    	<a href="user-hapus.php?id=<?= $row['id_user']?>"><button class="btn btn-danger">Delete</button></a>
			    </td>
			  </tr>
			</tbody>
			<?php } ?>	
		</table>
	</div>		
<?php include 'footer.php';