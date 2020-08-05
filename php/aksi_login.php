<?php
error_reporting(0);	
session_start();

include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
$cek = mysqli_num_rows($query);

if($cek > 0){
	while($row=mysqli_fetch_assoc($query)) {
		$_SESSION['id']=$row['id'];
		$_SESSION['username']=$row['username'];
		$_SESSION['level']=$row['status'];
		$_SESSION['akses']='admin';
	}
	echo "<script>window.alert('Login Sukses'); window.location=('../view/index.php')</script>";
}else{
	$query2 = mysqli_query($koneksi,"select * from karyawan where username='$username' and password='$password'");
	$cek2 = mysqli_num_rows($query2);
	if($cek2 > 0){
		while($row2=mysqli_fetch_assoc($query2)) {
			$_SESSION['id']=$row2['id'];
			$_SESSION['username']=$row2['username'];
			$_SESSION['level']=$row2['status'];
			$_SESSION['akses']='karyawan';
		}
		echo "<script>window.alert('Login Sukses'); window.location=('../view/index.php')</script>";
	}else{
		echo "<script>window.alert('Maaf, Username atau Password Salah'); window.location=('../loginadm.php')</script>";
	}
}
?>