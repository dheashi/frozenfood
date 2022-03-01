<?php 
	include './config/koneksi.php';
	include 'header.php';
	$view = $dbconnect->query("SELECT * FROM departemen");
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
						Departemen sudah ditambahkan
					</div>
					<?php 
				}
				elseif ($_GET['alert']=="edit_sukses"){
					?>
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon">Berhasil !</i></h4> 
						Departemen sudah diperbarui
					</div>
					<?php 
				}
				elseif ($_GET['alert']=="hapus_sukses"){
					?>
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon">Berhasil !</i></h4> Departemen sudah dihapus
					</div>
				<?php
				}				
			}
		?>	
		<h2>Data Departemen</h2>
    	<a href="departemen-add.php"><button class="btn btn-success"> Tambah Data</button></a>
    	<br><br/>
		<table class="table table-hover">
			<thead>
			  <tr>
			    <th>No</th>
			    <th>Nama Departemen</th>
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
			    <td><?= $row['nama_departemen'] ?></td>
			    <td>
			    	<a href="departemen-edit.php?id=<?= $row['id_departemen']?>"><button class="btn btn-primary">Edit</button></a>
			    	<a href="departemen-hapus.php?id=<?= $row['id_departemen']?>"><button class="btn btn-danger">Hapus</button></a>
			    </td>
			  </tr>
			</tbody>
			<?php } ?>	
		</table>
	</div>		
<?php include 'footer.php';