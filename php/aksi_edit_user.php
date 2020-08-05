<?php
error_reporting(0);	
session_start();

include 'koneksi.php';
$kode 	= $_POST['kode'];
$nama 	= $_POST['nama'];
$alamat = $_POST['alamat'];
$telp 	= $_POST['telp'];
$status = $_POST['status'];
$user 	= $_POST['user'];
$pass 	= $_POST['pass'];
$kpass 	= $_POST['kpass'];

if($pass!=''){
	if($pass==$kpass){
	$newpass = md5($pass);
	$query = mysqli_query($koneksi,"update user set nama='$nama', username='$user', password='$newpass', status='$status', telp='$telp', alamat='$alamat' where id='$kode'");
	echo "<script>window.alert('Data Berhasil Disimpan'); window.location=('../view/data_user.php')</script>";
	}else{
		echo "<script>window.alert('Maaf, Konfirmasi Password Salah'); window.location=('../view/data_user.php')</script>";
	}	
}else{
	$query = mysqli_query($koneksi,"update user set nama='$nama', username='$user', status='$status', telp='$telp', alamat='$alamat' where id='$kode'");
	echo "<script>window.alert('Data Berhasil Disimpan'); window.location=('../view/data_user.php')</script>";
}


?>