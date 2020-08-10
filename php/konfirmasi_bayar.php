<?php
error_reporting(0);	
session_start();

include 'koneksi.php';
$kode 	    = $_POST['kode'];
$keterangan 	= $_POST['keterangan'];
$now = date('Y-m-d');

if(!file_exists($_FILES['gambar']['tmp_name']) || !is_uploaded_file($_FILES['gambar']['tmp_name'])) {
    $query = mysqli_query($koneksi,"update transaksi set status='Menuggu Konfirmasi Pembayaran', tanggal_bayar='$now',keterangan_bayar='$keterangan' where id='$kode'");
    echo "<script>window.alert('Data Berhasil Disimpan'); window.location=('../view/data_slider.php')</script>";
}else{
    $nama       = $_FILES['gambar']['name'];
$file_tmp   = $_FILES['gambar']['tmp_name'];	
move_uploaded_file($file_tmp, '../assets/gambar/bayar/'.$nama);
    $query = mysqli_query($koneksi,"update transaksi set status='Menuggu Konfirmasi Pembayaran', gambar_bayar='$nama',tanggal_bayar='$now',keterangan_bayar='$keterangan' where id='$kode'");
    echo "<script>window.alert('Berhasil menyimpan bukti pembayaran, harap menunggu konfirmasi dari admin'); window.location=('../pembelian-saya.php')</script>";
}

?>