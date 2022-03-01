<?php 
	include './config/koneksi.php';
	include 'header.php';
	$view = $dbconnect->query("SELECT * FROM bahanbaku INNER JOIN departemen ON bahanbaku.id_departemen = departemen.id_departemen;");
?>

	<div class="container">
		<br>
		<?php 
			if (isset($_GET['alert'])){
				if ($_GET['alert']=='tambah_sukses'){
					?>
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check">Berhasil !</i></h4>
						Bahan Baku sudah ditambahkan
					</div>
					<?php 
				}
				elseif ($_GET['alert']=="edit_sukses"){
					?>
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check">Berhasil !</i></h4> Bahan Baku sudah diperbarui
					</div>
					<?php 
				}
				elseif ($_GET['alert']=="hapus_sukses"){
					?>
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check">Berhasil !</i></h4> Bahan Baku sudah dihapus
					</div>
				<?php
				}				
			}
		?>
		<h2>Data Bahan Baku</h2>
    	<a href="bahanbaku-add.php"><button class="btn btn-success">Tambah Data</button></a>
    	<br><br/>
		<table class="table table-hover">
			<thead>
			  <tr>
			    <th>No</th>
			    <th>Nama Bahan</th>
			    <th>Stok Bahan</th>
			    <th>Satuan</th>
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
			    <td><?= $row['nama_bahan'] ?></td>
			    <td><?= $row['stok_bahan'] ?></td>
			    <td><?= $row['satuan'] ?></td>
			    <td><?= $row['nama_departemen'] ?></td>
			    <td>
			    	<a href="bahanbaku-edit.php?id=<?= $row['id_bahan']?>"><button class="btn btn-primary">Edit</button></a>
			    	<a href="bahanbaku-hapus.php?id=<?= $row['id_bahan']?>"><button class="btn btn-danger">Hapus</button></a>
			    </td>
			  </tr>
			</tbody>
			<?php } ?>	
		</table>
	</div>		
<?php include 'footer.php';