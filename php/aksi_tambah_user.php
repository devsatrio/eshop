<?php
error_reporting(0);	
session_start();

include 'koneksi.php';
$nama 	= $_POST['nama'];
$alamat = $_POST['alamat'];
$telp 	= $_POST['telp'];
$status = $_POST['status'];
$user 	= $_POST['user'];
$pass 	= $_POST['pass'];
$kpass 	= $_POST['kpass'];

if($pass==$kpass){
	$newpass = md5($pass);
	$query = mysqli_query($koneksi,"insert into user (nama,username,password,status,telp,alamat) values ('$nama','$user','$newpass','$status','$telp','$alamat')");
	echo "<script>window.alert('Data Berhasil Disimpan'); window.location=('../view/data_user.php')</script>";
}else{
	echo "<script>window.alert('Maaf, Konfirmasi Password Salah'); window.location=('../view/data_user.php')</script>";
}

?>