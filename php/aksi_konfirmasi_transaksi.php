<?php
error_reporting(0);	
session_start();

include 'koneksi.php';
$subtotal = $_POST['subtotal'];
$ongkir = $_POST['ongkir'];
$total = $subtotal + $ongkir;
$keterangan = $_POST['keterangan'];
$kode = $_POST['kode'];

$query = mysqli_query($koneksi,"update transaksi set total='$total', pengiriman='$ongkir',status='Menunggu pembayaran', keterangan='$keterangan' where id='$kode'");
echo "<script>window.alert('Status berhasil di ubah'); window.location=('../view/data_pembelian.php')</script>";
?>