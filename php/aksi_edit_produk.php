<?php
error_reporting(0);	
session_start();

include 'koneksi.php';
$nama=$_POST['nama'];
$kategori=$_POST['kategori'];
$harga=$_POST['harga'];
$deskripsi=$_POST['deskripsi'];
$kode = $_POST['kode'];
$berkas_lama = $_POST['berkas_lama'];

if(!file_exists($_FILES['gambar']['tmp_name']) || !is_uploaded_file($_FILES['gambar']['tmp_name'])) {
    $query = mysqli_query($koneksi,"update produk set nama='$nama',id_kategori='$kategori',harga='$harga',deskripsi='$deskripsi' where id='$kode'");
    echo "<script>window.alert('Data Berhasil Disimpan'); window.location=('../view/data_produk.php')</script>";
}else{
    $target = '../assets/gambar/produk/'.$berkas_lama;
        if(file_exists($target)){
            unlink($target);
        }

        $namaimage = $_FILES['gambar']['name'];
        $hilangspasi = str_replace(' ','-',$namaimage);
        $finalname=strtotime(date('Y-m-d H:i:s'))."-".$hilangspasi;
        $file_tmp   = $_FILES['gambar']['tmp_name'];	
        move_uploaded_file($file_tmp, '../assets/gambar/produk/'.$finalname);
    $query = mysqli_query($koneksi,"update produk set nama='$nama',id_kategori='$kategori',harga='$harga',deskripsi='$deskripsi',gambar='$finalname' where id='$kode'");
    echo "<script>window.alert('Data Berhasil Disimpan'); window.location=('../view/data_produk.php')</script>";
}
    
 ?>