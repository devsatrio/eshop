<?php
error_reporting(0);	
session_start();

include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($koneksi,"select * from pengguna where username='$username' and password='$password'");
$cek = mysqli_num_rows($query);

if($cek > 0){
	while($row=mysqli_fetch_assoc($query)) {
		$_SESSION['id']=$row['id'];
		$_SESSION['username']=$row['username'];
		$_SESSION['akses']='pengguna';
	}
	echo "<script>window.alert('Login Sukses'); window.location=('../index.php')</script>";
}else{
	echo "<script>window.alert('Maaf, Username atau Password Salah'); window.location=('../login.php')</script>";
}
?>