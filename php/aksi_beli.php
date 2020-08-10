<?php
error_reporting(1);	
session_start();

include 'koneksi.php';
$user = $_SESSION['id'];
$total = $_POST['total'];
$alamat = $_POST['alamat'];
$keterangan = $_POST['keterangan'];
$now = date('Y-m-d');
//---------------------------------------------------------------------------------------------
$query = mysqli_query($koneksi, "select max(kode) as kodeTerbesar FROM transaksi");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBarang, 3, 3);
$urutan++;
$huruf = "TRS";
$kodeBarang = $huruf . sprintf("%03s", $urutan);

//---------------------------------------------------------------------------------------------
$sql = "insert into transaksi (kode,id_pengguna,tanggal,status,subtotal,pengiriman,total,alamat_pengiriman,keterangan_pembelian) values
('$kodeBarang','$user','$now','Menunggu Konfirmasi Admin','$total',0,'$total','$alamat','$keterangan')";
if (mysqli_query($koneksi, $sql)) {
    $last_id = mysqli_insert_id($koneksi);
    $keranjang = mysqli_query($koneksi,"select * from keranjang where keranjang.id_pengguna='$_SESSION[id]'");
    while($ker = mysqli_fetch_assoc($keranjang)) {
        mysqli_query($koneksi,"insert into transaksi_detail (id_transaksi,id_produk,jumlah,harga,subtotal) values 
        ('$last_id','$ker[id_produk]','$ker[jumlah]','$ker[harga]','$ker[subtotal]')");
    }
    $hapus = mysqli_query($koneksi,"delete from keranjang where id_pengguna='$user'");
    echo "<script>window.alert('Transaksi anda behasil dibuat dan sedang di proses oleh pihak kami'); window.location=('../pembelian-saya.php')</script>";
} else {
    echo "Error INSERT transaksi";
}

//---------------------------------------------------------------------------------------------

?>