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
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <p>
                        List Pembelian Tanggal <?=$_GET['tglsatu']?> sd <?=$_GET['tgldua']?>
                    </p>
                </div>
                <div class="card-body">
                    <table class="table">
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
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include'layout/f.php';
?>
<script>
window.onload = function() {
    window.print();
    setTimeout(window.close, 0);
}
</script>