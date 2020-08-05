<?php 
error_reporting(0);	
session_start();

include 'koneksi.php';
$nama=$_POST['nama'];
$kategori=$_POST['kategori'];
$stok=$_POST['stok'];
$harga=$_POST['harga'];
$deskripsi=$_POST['deskripsi'];
$namaimage = $_FILES['gambar']['name'];
$hilangspasi = str_replace(' ','-',$namaimage);
$finalname=strtotime(date('Y-m-d H:i:s'))."-".$hilangspasi;
$file_tmp   = $_FILES['gambar']['tmp_name'];	
move_uploaded_file($file_tmp, '../assets/gambar/produk/'.$finalname);
$query = mysqli_query($koneksi,"insert into produk (nama,stok,harga,deskripsi,gambar,id_kategori) values ('$nama','$stok','$harga','$deskripsi','$finalname','$kategori')");
echo "<script>window.alert('Data Berhasil Disimpan'); window.location=('../view/data_produk.php')</script>";

?>