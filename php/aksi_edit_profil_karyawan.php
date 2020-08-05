<?php
error_reporting(0);	
session_start();

include 'koneksi.php';
$kode       = $_POST['kode'];
$nama 	    = $_POST['nama'];
$alamat     = $_POST['alamat'];
$telp       = $_POST['telp'];
$username   = $_POST['username'];
$password   = $_POST['password'];
$kpassword  = $_POST['kpassword'];

if($password!=''){
	if($password==$kpassword){
	$newpass = md5($password);
	$query = mysqli_query($koneksi,"update karyawan set nama='$nama', username='$username', password='$newpass', notelp='$telp', alamat='$alamat' where id='$kode'");
	echo "<script>window.alert('Profil berhasil diperbarui, login ulang untuk memperbarui session'); window.location=('../view/index.php')</script>";
	}else{
		echo "<script>window.alert('Maaf, Konfirmasi Password Salah'); window.location=('../view/index.php')</script>";
	}	
}else{
	$query = mysqli_query($koneksi,"update karyawan set nama='$nama', username='$username', notelp='$telp', alamat='$alamat' where id='$kode'");
    echo "<script>window.alert('Profil berhasil diperbarui, login ulang untuk memperbarui session'); window.location=('../view/index.php')</script>";
} ?>