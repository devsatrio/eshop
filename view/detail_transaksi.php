<?php
error_reporting(0);
session_start();
include '../php/koneksi.php';
if($_SESSION['username']==''){
    echo "<script>window.alert('Maaf, Anda Harus Login'); window.location=('../loginadm.php')</script>";
}else{
    if($_SESSION['akses']!='admin'){
        echo "<script>window.alert('Maaf, Anda tidak memiliki akses'); window.location=('../index.php')</script>";
    }
}
include 'layout/h.php';
include 'layout/n.php';
?>
<?php
$i =1;
$query = mysqli_query($koneksi,"select transaksi.*,pengguna.username from transaksi left join pengguna on pengguna.id =transaksi.id_pengguna where transaksi.id='$_GET[id]'");
while($row=mysqli_fetch_assoc($query)) { ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Detail Transaksi</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Transaksi <?=$row['kode']?>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Pembeli : <b><?=$row['username']?></b></p>
                            <p>Tanggal Beli : <b><?=$row['tanggal']?></b></p>
                            <p>Status Transaksi : <b><?=$row['status']?></b></p>
                            <p>Keterangan : <b><?=$row['keterangan']?></b></p>
                        </div>
                        <div class="col-md-6">
                            <p>Keterangan Transaksi: <b><?=$row['keterangan_pembelian']?></b></p>
                            <p>Alamat Pengiriman: <b><?=$row['alamat_pengiriman']?></b></p>
                        </div>
                    </div>
                    <hr>
                    <p><b>List Produk</b></p>
                    <table class="table table-bordered data-table" id="dataTable">
                        <thead>
                            <tr>
                                <th class="text-center">Produk</th>
                                <th>Nama</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $querydua = mysqli_query($koneksi,"select transaksi_detail.*,produk.gambar,produk.nama from transaksi_detail left join produk on produk.id = transaksi_detail.id_produk where transaksi_detail.id_transaksi='$_GET[id]' order by transaksi_detail.id desc");
                            while($rowdua=mysqli_fetch_assoc($querydua)) { ?>
                            <tr>
                                <td class="text-center" data-title="No">
                                    <img src="../assets/gambar/produk/<?=$rowdua['gambar']?>" width="100px;" alt="#">
                                </td>
                                <td class="product-des" data-title="Description">
                                    <p class="product-name"><?=$rowdua['nama']?></p>

                                </td>
                                <td class="text-right" data-title="Price">
                                    <span><?php echo "Rp. ".number_format($rowdua['harga'],0,',','.'); ?></span></td>
                                <td class="text-center" data-title="Qty">
                                    <?=$rowdua['jumlah']?> Pcs
                                </td>
                                <td class="text-right" data-title="Total">
                                    <span><?php echo "Rp. ".number_format($rowdua['subtotal'],0,',','.'); ?></span>
                                </td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="4">
                                    Subtotal
                                </td>
                                <td class="text-right" data-title="Total">
                                    <span><?php echo "Rp. ".number_format($row['subtotal'],0,',','.'); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    Pengiriman
                                </td>
                                <td class="text-right" data-title="Total">
                                    <span><?php echo "Rp. ".number_format($row['pengiriman'],0,',','.'); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    Total
                                </td>
                                <td class="text-right" data-title="Total">
                                    <span><?php echo "Rp. ".number_format($row['total'],0,',','.'); ?></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <p>Tanggal Bayar : <b><?=$row['tanggal_bayar']?></b></p>
                    <p>Keterangan Bayar: <b><?=$row['keterangan_bayar']?></b></p>
                    <p>Gambar Bayar: <br><img src="../assets/gambar/bayar/<?=$row['gambar_bayar']?>" alt="..."
                            class="img-thumbnail" width="300px;"></p>
                    <button class="btn btn-danger" type="button" onclick="history.go(-1)">Kembali</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php
include'layout/f.php';
?>