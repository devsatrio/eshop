<?php
error_reporting(1);
session_start();
include '../php/koneksi.php';
if($_SESSION['username']==''){
echo "<script>window.alert('Maaf, Anda Harus Login'); window.location=('../loginadm.php')</script>";
}
include 'layout/h.php';
include 'layout/n.php';
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Order</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Order</h6>
                </div>
                <div class="card-body">
                    <?php
                    $query = mysqli_query($koneksi,"select * from pemesanan where id='$_GET[id]'");
                    while($row=mysqli_fetch_assoc($query)) { ?>
                    <form action="../php/aksi_edit_order.php" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">kode</label>
                                <input type="text" class="form-control" value="<?php echo $row['kode'];?>" required
                                    readonly>
                                <input type="hidden" value="<?php echo $row['id'];?>" name="kode">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">pembeli</label>
                                <input type="text" class="form-control" name="pembeli"
                                    value="<?php echo $row['customer'];?>" readonly required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Tgl Masuk</label>
                                <input type="text" class="form-control"
                                    value="<?php echo $row['tanggal_masuk'];?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Tgl Selesai</label>
                                <input type="text" class="form-control" value="<?php echo $row['tanggal_selesai'];?>" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">jenis</label>
                                <input type="text" class="form-control" value="<?php echo $row['jenis'];?>"
                                    readonly>
                                <input type="hidden" name="jenis" value="<?php echo $row['jenis'];?>" required
                                    readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">bahan</label>
                                <input type="text" class="form-control" value="<?php echo $row['bahan'];?>"
                                    readonly>
                                <input type="hidden" name="bahan" value="<?php echo $row['bahan'];?>" required
                                    readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">jumlah</label>
                                <input type="text" class="form-control" value="<?php echo $row['jumlah'];?> Pcs"
                                    readonly>
                                <input type="hidden" name="jumlah" value="<?php echo $row['jumlah'];?>" required
                                    readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">prosess</label>
                                <input type="text" class="form-control" name="prosess"
                                    value="<?php echo $row['prosess'];?>" required readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Karyawan Penanggung Jawab</label>
                                <input type="hidden" name="karyawan" value="<?php echo $row['id_karyawan'];?>" required
                                    readonly>
                                <?php
                                    $datakaryawan = mysqli_query($koneksi,"select * from karyawan where id='$row[id_karyawan]'");
                                    while($karyawan=mysqli_fetch_assoc($datakaryawan)) { ?>

                                <input type="text" class="form-control"
                                    value="<?php echo $karyawan['nama'];?> (<?php echo $karyawan['status'];?>)" required
                                    readonly>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Gambar*</label><br>
                                <?php if($row['gambar']!=''){ ?>
                                <img src="../assets/gambar/order/<?php echo $row['gambar'];?>" alt="..." width="20%">
                                <?php }else{ ?>
                                <img src="../assets/img/noimage.png" alt="..." width="20%">
                                <?php } ?>
                                <input type="hidden" name="gambarlama" value="<?php echo $row['gambar']?>">
                                <input type="file" class="form-control" name="gambar">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Keterangan*</label>
                            <textarea name="keterangan" class="form-control"
                                rows="5" readonly><?php echo $row['catatan'];?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" onclick="history.go(-1)" class="btn btn-danger">Kembali</button>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include'layout/f.php';
?>