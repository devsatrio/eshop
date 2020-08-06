<?php
error_reporting(1);
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
    <h1 class="h3 mb-4 text-gray-800">Setting Web</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Order</h6>
                </div>
                <div class="card-body">
                    <?php
                    $query = mysqli_query($koneksi,"select * from setting order by id desc limit 0,1");
                    while($row=mysqli_fetch_assoc($query)) { ?>
                    <form action="../php/aksi_edit_setting.php" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">No. Telp 1</label>
                                <input type="text" class="form-control" name="telp_satu" value="<?php echo $row['telp_satu']?>" required>
                                <input type="hidden" name="kode" value="<?php echo $row['id']?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">No. Telp 2</label>
                                <input type="text" class="form-control" name="telp_dua" value="<?php echo $row['telp_dua']?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="text" class="form-control" name="email" value="<?php echo $row['email']?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?php echo $row['alamat']?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Link Facebook</label>
                                <input type="text" class="form-control" name="fb" value="<?php echo $row['link_fb']?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Link Instagram</label>
                                <input type="text" class="form-control" name="ig" value="<?php echo $row['link_ig']?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">No. Rekening</label>
                                <input type="text" class="form-control" name="norek" value="<?php echo $row['rekening']?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Cara Bayar</label>
                                <textarea name="carabayar" class="form-control" rows="3"><?php echo $row['cara_bayar']?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Deskripsi Toko*</label>
                            <textarea name="keterangan" class="form-control" rows="5"><?php echo $row['deskripsi']?></textarea>
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