<?php
error_reporting(0);	
session_start();

include 'koneksi.php';
$keterangan = $_POST['keterangan'];
$kode = $_POST['kode'];

$query = mysqli_query($koneksi,"update transaksi set status='Transaksi Dicancel', keterangan='$keterangan' where id='$kode'");
echo "<script>window.alert('Status berhasil di ubah'); window.location=('../view/data_pembelian.php')</script>";
?>