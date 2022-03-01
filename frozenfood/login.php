 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="config/style.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<script src="assets/bootstrap/js/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="form-login">
		<?php 
			if (isset($_GET['alert'])){
				if ($_GET['alert']=='gagal'){
					?>
					<div class="alert alert-danger alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <h4><i>Error !</i></h4> 
						usernama/password salah
					</div>
					<?php 
				}
				elseif ($_GET['alert']=="logout"){
					?>
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon">Sukses !</i></h4> 
						Anda berhasil logout
					</div>
					<?php 
				}			
			}
		?>
		<form method="post" action="login-cek.php">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" placeholder="Masukkan Username" name="username" id="username" required>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" placeholder="Masukkan Password" name="password" id="password" required>
			</div>
			<input type="submit" class="btn btn-success" value="Login">
		</form>
	</div>
</body>
</html>

