<!DOCTYPE html>
<html lang="zxx">
<?php include 'php/koneksi.php';?>
<?php include 'base_h.php';?>

<body class="js">
    <?php include 'base_nav.php';?>
    <?php 
    if($_SESSION['username']==''){
        echo "<script>window.alert('Maaf, Anda Harus Login'); window.location=('index.php')</script>";
    } ?>
    <?php
    $datatransaksi = mysqli_query($koneksi,"select * from transaksi where id='$_GET[id]'");
    while($trans=mysqli_fetch_assoc($datatransaksi)) {
    ?>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Konfirmasi Pembayaran Transaksi <?=$trans['kode']?></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="shopping-cart section">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="alert alert-warning" role="alert">
                        <h5>Cara Bayar : </h5>
                        <?php
                        $datasetting = mysqli_query($koneksi,"select * from setting order by id desc limit 0,1");
                        while($st=mysqli_fetch_assoc($datasetting)) {
                            echo $st['cara_bayar'];
                        } ?>
                    </div>
                    <div class="alert alert-primary" role="alert">
                        Bayar Sejumlah <?php echo "Rp. ".number_format($trans['total'],0,',','.'); ?>
                    </div>
                    <form action="php/konfirmasi_bayar.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="kode" value="<?=$trans['id']?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Foto Bukti Transfer</label>
                            <input type="file" class="form-control" name="gambar" accept="image/*" required>
                            <small id="emailHelp" class="form-text text-muted">*Bayar sesuai jumlah yang di tentukan,
                                tidak lebih tidak kurang</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Keterangan</label>
                            <textarea name="keterangan" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" onclick="history.go(-1)" class="btn btn-primary">Kembali</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php include 'base_f.php';?>
</body>

</html>