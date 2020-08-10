<?php
error_reporting(0);	
session_start();

include 'koneksi.php';
$kode = $_GET['id'];

$query = mysqli_query($koneksi,"update transaksi set status='Transaksi Sukses' where id='$kode'");
echo "<script>window.alert('Transaksi berhasil, Produk telah diterma'); window.location=('../pembelian-saya.php')</script>";
?>