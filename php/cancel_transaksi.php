<?php
error_reporting(0);	
session_start();

include 'koneksi.php';
$keterangan = 'Transaksi dicancel oleh pembeli';
$kode = $_GET['id'];

$query = mysqli_query($koneksi,"update transaksi set status='Transaksi Dicancel', keterangan='$keterangan' where id='$kode'");
echo "<script>window.alert('Transaksi berhasil di cancel'); window.location=('../pembelian-saya.php')</script>";
?>