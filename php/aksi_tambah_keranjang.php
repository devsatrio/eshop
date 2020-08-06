<?php 
error_reporting(0);	
session_start();

include 'koneksi.php';
$kodeproduk=$_POST['kodeproduk'];
$jumlah=$_POST['jumlah'];
$kodeuser = $_SESSION['id'];

$produk = mysqli_query($koneksi,"select * from produk where id='$kodeproduk'");
while($dpro=mysqli_fetch_assoc($produk)) {
$harga = $dpro['harga'];
$subtotal = $harga*$jumlah;
}

$query = mysqli_query($koneksi,"insert into keranjang (id_pengguna,id_produk,harga,jumlah,subtotal) values ('$kodeuser','$kodeproduk','$harga','$jumlah','$subtotal')");
echo "<script>window.alert('Produk berhasil dimasukan keranjang'); window.location=('../produk.php?id=".$kodeproduk."')</script>";

?>