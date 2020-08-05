<?php
error_reporting(1);	
session_start();

include 'koneksi.php';
$judul 	    = $_POST['judul'];
$deskripsi 	= $_POST['deskripsi'];
$link 	    = $_POST['link'];
$nama       = $_FILES['gambar']['name'];
$file_tmp   = $_FILES['gambar']['tmp_name'];	
move_uploaded_file($file_tmp, '../assets/gambar/'.$nama);
$query = mysqli_query($koneksi,"insert into slider (gambar,judul,deskripsi,link) values ('$nama','$judul','$deskripsi','$link')");
echo "<script>window.alert('Data Berhasil Disimpan'); window.location=('../view/data_slider.php')</script>";
?>