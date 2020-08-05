<?php
error_reporting(0);	
session_start();

include 'koneksi.php';
$nama=$_POST['nama'];
$slug = strtolower(str_replace(' ','-',$nama));
$berkas_lama = $_POST['berkas_lama'];
$kode = $_POST['kode'];


if(!file_exists($_FILES['gambar']['tmp_name']) || !is_uploaded_file($_FILES['gambar']['tmp_name'])) {
    $query = mysqli_query($koneksi,"update kategori set nama='$nama', slug='$slug' where id='$kode'");
    echo "<script>window.alert('Data Berhasil Disimpan'); window.location=('../view/data_kategori.php')</script>";
}else{
    $target = '../assets/gambar/kategori/'.$berkas_lama;
        if(file_exists($target)){
            unlink($target);
        }

        $namaimage = $_FILES['gambar']['name'];
        $hilangspasi = str_replace(' ','-',$namaimage);
        $finalname=strtotime(date('Y-m-d H:i:s'))."-".$hilangspasi;
        $file_tmp   = $_FILES['gambar']['tmp_name'];	
        move_uploaded_file($file_tmp, '../assets/gambar/kategori/'.$finalname);
    $query = mysqli_query($koneksi,"update kategori set nama='$nama', slug='$slug',gambar='$finalname' where id='$kode'");
    echo "<script>window.alert('Data Berhasil Disimpan'); window.location=('../view/data_kategori.php')</script>";
}
    
 ?>