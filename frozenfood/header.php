<?php 
	include './config/koneksi.php';
	session_start();
	if ($_SESSION['status']!="login") {
		header("location:login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./config/style.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<script src="assets/bootstrap/js/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>

	<title>Frozen Food</title>
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-light navbar-light">
	  <ul class="navbar-nav">
	    <li class="nav-item active">
	      <a class="nav-link" href="index.php">Home</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="departemen.php">Data Departemen</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="user.php">Data User</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="bahanbaku.php">Data Bahan</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="supplier.php">Data Supplier</a>
	    </li>
	    <li style="float: right;" class="dropdown"><a href="logout.php"><?php echo $_SESSION['nama_user'];?>-<?php echo $_SESSION['role'];?> (Logout)</a></li>
	  </ul>
	</nav>