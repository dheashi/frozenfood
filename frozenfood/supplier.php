<?php 
	include './config/koneksi.php';
	include 'header.php';
	$view = $dbconnect->query("SELECT * FROM supplier");
?>

	<div class="container">
		<br>
		<?php 
			if (isset($_GET['alert'])){
				if ($_GET['alert']=='tambah_sukses'){
					?>
					<div class="alert alert-success alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Berhasil !</strong> 
						Supplier sudah ditambahkan
					</div>
					<?php 
				}
				elseif ($_GET['alert']=="edit_sukses"){
					?>
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon">Berhasil !</i></h4> 
						Supplier sudah diperbarui
					</div>
					<?php 
				}
				elseif ($_GET['alert']=="hapus_sukses"){
					?>
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon">Berhasil !</i></h4> Supplier sudah dihapus
					</div>
				<?php
				}				
			}
		?>	
		<h2>Data Supplier</h2>
    	<a href="supplier-add.php"><button class="btn btn-success">Tambah Data</button></a>
    	<br><br/>
		<table class="table table-hover">
			<thead>
			  <tr>
			    <th>No</th>
			    <th>Nama Supplier</th>
			    <th>Alamat Supplier</th>
			    <th>Kontak Supplier</th>
			    <th>Username</th>
			    <th>Password</th>
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
			    <td><?= $row['nama_supplier'] ?></td>
			    <td><?= $row['alamat_supplier'] ?></td>
			    <td><?= $row['kontak_supplier'] ?></td>
			    <td><?= $row['username'] ?></td>
			    <td><?= $row['password'] ?></td>
			    <td align="center">
			    	<a href="supplier-edit.php?id=<?= $row['id_supplier']?>"><button class="btn btn-primary">Edit</button></a>
			    	<a href="supplier-hapus.php?id=<?= $row['id_supplier']?>"><button class="btn btn-danger">Hapus</button></a>
			    </td>
			  </tr>
			</tbody>
			<?php } ?>	
		</table>
	</div>		
<?php include 'footer.php';