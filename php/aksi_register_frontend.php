<?php
error_reporting(0);	
session_start();

include 'koneksi.php';

$nama 	    = $_POST['nama'];
$alamat     = $_POST['alamat'];
$telp       = $_POST['telp'];
$username   = $_POST['username'];
$status     = $_POST['status'];
$password   = $_POST['password'];
$kpassword  = $_POST['kpassword'];

if($password==$kpassword){
    
    $newpass = md5($password);
    $query = mysqli_query($koneksi,"insert into pengguna (nama,alamat,notelp,username,password,status) values ('$nama','$alamat','$telp','$username','$newpass','$status')");
    echo "<script>window.alert('Berhasil Mendaftar,Silahkan login untuk melakukan transaksi'); window.location=('../login.php')</script>";

}else{

    echo "<script>window.alert('Maaf, Konfirmasi Password Salah'); window.location=('../register.php')</script>";

} ?>