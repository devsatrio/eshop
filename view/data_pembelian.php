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
include 'layout/h_tabel.php';
include 'layout/n.php';
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Pembelian</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        List Data
                    </h6>
                </div>
                <div class="card-body table-responsive">
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
                                <th class="text-center">Aksi</th>
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
                                    <a href="detail_transaksi.php?id=<?=$row['id']?>">
                                        <?php echo $row['kode'];?>
                                    </a>
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
                                <td class="text-center">
                                    <?php if($row['status']=='Menunggu Konfirmasi Admin'){ ?>
                                    <a href="#konfirmasiModal<?php echo $row[id];?>" data-toggle="modal"
                                        class="btn btn-sm btn-primary">Konfirmasi Transaksi</a>
                                    <a href="#canceltransaksiModal<?php echo $row[id];?>" data-toggle="modal"
                                        class="btn btn-sm btn-danger">Cancel Transaksi</a>
                                    <?php }else if($row['status']=='Menunggu pembayaran'){
                                            if($row['tanggal_bayar']==''){ ?>
                                    <a href="#canceltransaksiModal<?php echo $row[id];?>" data-toggle="modal"
                                        class="btn btn-sm btn-danger">Cancel Transaksi</a>
                                    <?php }else{ ?>
                                    <a href="#konfirmasitransaksiModal<?php echo $row[id];?>" data-toggle="modal"
                                        class="btn btn-sm btn-success">Konfirmasi Pembayaran</a>
                                    <a href="#canceltransaksiModal<?php echo $row[id];?>" data-toggle="modal"
                                        class="btn btn-sm btn-danger">Cancel Transaksi</a>
                                    <?php } ?>

                                    <?php }else  if($row['status']=='Transaksi Sukses'){ ?>
                                    <a href="../php/aksi_hapus_transaksi.php?id=<?php echo $row[id];?>"
                                        onclick="return confirm('Hapus transaksi ?')"
                                        class="btn btn-sm btn-danger">Hapus</a>
                                    <?php }else if($row['status']=='Menuggu Konfirmasi Pembayaran'){?>
                                    <a href="#konfirmasitransaksiModal<?php echo $row[id];?>" data-toggle="modal"
                                        class="btn btn-sm btn-success">Konfirmasi Pembayaran</a>
                                    <a href="#canceltransaksiModal<?php echo $row[id];?>" data-toggle="modal"
                                        class="btn btn-sm btn-danger">Cancel Transaksi</a>
                                    <?php }else{?>
                                    <a href="../php/aksi_hapus_transaksi.php?id=<?php echo $row[id];?>"
                                        onclick="return confirm('Hapus transaksi ?')"
                                        class="btn btn-sm btn-danger">Hapus</a>
                                    <?php } ?>
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
$query2 = mysqli_query($koneksi,"select * from transaksi");
while($row2=mysqli_fetch_assoc($query2)) { ?>
<div class="modal fade bd-example-modal-lg" id="konfirmasiModal<?php echo $row2['id'];?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Transaksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../php/aksi_konfirmasi_transaksi.php" method="post">
                    <div class="form-group">
                        <label for="email">Biaya Ongkir</label>
                        <input type="hidden" name="kode" value="<?php echo $row2['id'];?>">
                        <input type="hidden" name="subtotal" value="<?php echo $row2['subtotal'];?>">
                        <input type="number" class="form-control" value="0" name="ongkir" min="0" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Keterangan</label>
                        <textarea name="keterangan" class="form-control"></textarea>
                    </div>
                    <div class="form-actions text-right">
                        <button type="submit" class="btn btn-success btn-large">Konfirmasi</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="konfirmasitransaksiModal<?php echo $row2['id'];?>" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../php/aksi_konfirmasi_transaksi_dua.php" method="post">
                    <div class="form-group">
                        <label for="email">Tanggal Validasi</label>
                        <input type="text" class="form-control" readonly value="<?php echo $row2['tanggal_bayar'];?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Foto Bukti Transfer</label>
                        <br><img src="../assets/gambar/bayar/<?=$row2['gambar_bayar']?>" class="img-thumbnail" alt="...">
                    </div>
                    <div class="form-group">
                        <label for="email">Keterangan Pembayaran</label>
                        <textarea class="form-control" readonly><?php echo $row2['keterangan_bayar'];?></textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="email">Status</label>
                        <input type="hidden" name="kode" value="<?php echo $row2['id'];?>">
                        <select name="status" class="form-control">
                            <option value="Transaksi Sukses">Transaksi Sukses</option>
                            <option value="Prosess Pengiriman">Prosess Pengiriman</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Keterangan</label>
                        <textarea name="keterangan" class="form-control"><?php echo $row2['keterangan'];?></textarea>
                    </div>
                    <div class="form-actions text-right">
                        <button type="submit" class="btn btn-success btn-large">Konfirmasi</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="canceltransaksiModal<?php echo $row2['id'];?>" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cancel Transaksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../php/aksi_cancel_transaksi.php" method="post">
                    <div class="form-group">
                        <label for="email">Keterangan</label>
                        <input type="hidden" name="kode" value="<?php echo $row2['id'];?>">
                        <textarea name="keterangan" class="form-control"><?php echo $row2['keterangan'];?></textarea>
                    </div>
                    <div class="form-actions text-right">
                        <button type="submit" class="btn btn-success btn-large">Konfirmasi</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php
include'layout/f_tabel.php';
?>