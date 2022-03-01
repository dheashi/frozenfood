<?php 
	include './config/koneksi.php';

	$username = $_POST['username'];
	$password = $_POST['password'];

	$login = mysqli_query($dbconnect, "SELECT * FROM user where username='$username'and password='$password'");

	$row = mysqli_fetch_array($login);

	if ($row['username'] == $username AND $row['password'] == $password) {
		session_start();
		$_SESSION['nama_user'] = $row['nama_user'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['role'] = $row['role'];
		$_SESSION['status'] = "login";
		header('location:index.php');
	} else{
		echo "<script>location='login.php?alert=gagal';</script>";
	}
?>