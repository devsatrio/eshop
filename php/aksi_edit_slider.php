<?php
error_reporting(0);	
session_start();

include 'koneksi.php';
$judul 	    = $_POST['judul'];
$deskripsi 	= $_POST['deskripsi'];
$link 	    = $_POST['link'];
$gambarlama = $_POST['gambarlama'];
$kode       = $_POST['kode'];
$status = $_POST['status'];
if(!file_exists($_FILES['gambar']['tmp_name']) || !is_uploaded_file($_FILES['gambar']['tmp_name'])) {
    $query = mysqli_query($koneksi,"update slider set judul='$judul',status='$status', deskripsi='$deskripsi', link='$link' where id='$kode'");
    echo "<script>window.alert('Data Berhasil Disimpan'); window.location=('../view/data_slider.php')</script>";
}else{
    $target = '../assets/gambar/'.$gambarlama;
        if(file_exists($target)){
            unlink($target);
        }
    $nama       = $_FILES['gambar']['name'];
    $file_tmp   = $_FILES['gambar']['tmp_name'];	
    move_uploaded_file($file_tmp, '../assets/gambar/'.$nama);
    $query = mysqli_query($koneksi,"update slider set gambar='$nama',status='$status', judul='$judul', deskripsi='$deskripsi', link='$link' where id='$kode'");
    echo "<script>window.alert('Data Berhasil Disimpan'); window.location=('../view/data_slider.php')</script>";
}

?>