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
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Laporan Pembelian</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        List Pembelian Tanggal <?=$_GET['tglsatu']?> sd <?=$_GET['tgldua']?>
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered data-table" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Status</th>
                                <th>Pembeli</th>
                                <th>Tanggal</th>
                                <th class="text-right">Subtotal</th>
                                <th class="text-right">Pengiriman</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i =1;
                            $query = mysqli_query($koneksi,"select transaksi.*,pengguna.username from transaksi left join pengguna on pengguna.id =transaksi.id_pengguna order by id desc");
                            while($row=mysqli_fetch_assoc($query)) { ?>
                            <tr class="gradeX">
                                <td class="text-center">
                                    <?php echo $i++;?>
                                </td>
                                <td>
                                    <?php echo $row['kode'];?>
                                </td>
                                <td>
                                    <?php echo $row['status'];?>
                                </td>
                                <td>
                                    <?php echo $row['username'];?>
                                </td>
                                <td>
                                    <?php echo $row['tanggal'];?>
                                </td>
                                <td class="text-right">
                                    <?php echo "Rp. ".number_format($row['subtotal'],0,',','.'); ?>
                                </td>
                                <td class="text-right">
                                    <?php echo "Rp. ".number_format($row['pengiriman'],0,',','.'); ?>
                                </td>
                                <td class="text-right">
                                    <?php echo "Rp. ".number_format($row['total'],0,',','.'); ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <button class="btn btn-danger" onclick="history.go(-1)" type="button">Kembali</button>
                    <a href="cetak_laporan_pembelian.php?tglsatu=<?=$_GET['tglsatu']?>&tgldua=<?=$_GET['tgldua']?>&" class="btn btn-success" target="blank()">Cetak</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include'layout/f.php';
?>