<?php
error_reporting(0);	
session_start();

include 'koneksi.php';
$kode 	= $_POST['kode'];
$nama 	= $_POST['nama'];
$alamat = $_POST['alamat'];
$telp 	= $_POST['telp'];
$user 	= $_POST['user'];
$pass 	= $_POST['pass'];
$kpass 	= $_POST['kpass'];

if($pass!=''){
	if($pass==$kpass){
	$newpass = md5($pass);
	$query = mysqli_query($koneksi,"update user set nama='$nama', username='$user', password='$newpass', telp='$telp', alamat='$alamat' where id='$kode'");
	echo "<script>window.alert('Profil berhasil diperbarui, login ulang untuk memperbarui session'); window.location=('../view/index.php')</script>";
	}else{
		echo "<script>window.alert('Maaf, Konfirmasi Password Salah'); window.location=('../view/index.php')</script>";
	}	
}else{
	$query = mysqli_query($koneksi,"update user set nama='$nama', username='$user', telp='$telp', alamat='$alamat' where id='$kode'");
	echo "<script>window.alert('Profil berhasil diperbarui, login ulang untuk memperbarui session'); window.location=('../view/index.php')</script>";
}


?>