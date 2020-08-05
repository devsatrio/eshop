<?php 
error_reporting(0);	
session_start();

include 'koneksi.php';
$nama=$_POST['nama'];
$slug = strtolower(str_replace(' ','-',$nama));

$namaimage = $_FILES['gambar']['name'];
$hilangspasi = str_replace(' ','-',$namaimage);
$finalname=strtotime(date('Y-m-d H:i:s'))."-".$hilangspasi;
$file_tmp   = $_FILES['gambar']['tmp_name'];	
move_uploaded_file($file_tmp, '../assets/gambar/kategori/'.$finalname);
$query = mysqli_query($koneksi,"insert into kategori (nama,slug,gambar) values ('$nama','$slug','$finalname')");
echo "<script>window.alert('Data Berhasil Disimpan'); window.location=('../view/data_kategori.php')</script>";

?>