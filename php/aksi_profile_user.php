<?php
error_reporting(0);	
session_start();

include 'koneksi.php';
$kode       = $_POST['kode'];
$nama 	    = $_POST['nama'];
$alamat     = $_POST['alamat'];
$telp       = $_POST['notelp'];
$username   = $_POST['username'];
$status     = $_POST['status'];
$password   = $_POST['pass'];
$kpassword  = $_POST['kpass'];

if($password!=''){
	if($password==$kpassword){
	$newpass = md5($password);
	$query = mysqli_query($koneksi,"update pengguna set nama='$nama', username='$username', password='$newpass', status='$status', notelp='$telp', alamat='$alamat' where id='$kode'");
	    echo "<script>window.alert('Data Berhasil Disimpan'); window.location=('../editprofile.php')</script>";
	}else{
		echo "<script>window.alert('Maaf, Konfirmasi Password Salah'); window.location=('../editprofile.php')</script>";
	}	
}else{
	$query = mysqli_query($koneksi,"update pengguna set nama='$nama', username='$username', status='$status', notelp='$telp', alamat='$alamat' where id='$kode'");
	echo "<script>window.alert('Data Berhasil Disimpan'); window.location=('../editprofile.php')</script>";
} ?>