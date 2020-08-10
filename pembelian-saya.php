<!DOCTYPE html>
<html lang="zxx">
<?php include 'php/koneksi.php';?>
<?php include 'base_h.php';?>

<body class="js">
    <?php include 'base_nav.php';
    if($_SESSION['username']==''){
        echo "<script>window.alert('Maaf, Anda Harus Login'); window.location=('index.php')</script>";
    }
    ?>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Transaksi Anda</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    $cektransaksi = mysqli_query($koneksi,"select * from transaksi where id_pengguna='$_SESSION[id]'");
    $jumlahtran = mysqli_num_rows($cektransaksi);
    if($jumlahtran > 0){ ?>
    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table" height="100%">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">Kode</th>
                                <th scope="col" class="text-center">Tanggal</th>
                                <th scope="col" class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id = 1;
                            $query = mysqli_query($koneksi,"select * from transaksi where id_pengguna='$_SESSION[id]' order by id desc");
                            while($row=mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td class="text-center"><?php echo $row['kode']?></td>
                                <td class="text-center"><?php echo $row['tanggal']?></td>
                                <td class="text-center"><?php echo $row['status']?></td>
                                <td class="text-center">
                                    <?php if($row['status']=='Menunggu pembayaran'){?>
                                    <a href="detail_transaksi.php?id=<?=$row['id']?>" class="btn"
                                        style="color:white;"><i class="fa fa-eye"></i></a>
                                    <a href="konfirmasi_pembayaran.php?id=<?=$row['id']?>" class="btn"
                                        style="color:white;"><i class="fa fa-money"></i></a>
                                    <a href="php/cancel_transaksi.php?id=<?=$row['id']?>" class="btn"
                                        style="color:white;" onclick="return confirm('Cancel transaksi ?')"><i
                                            class="fa fa-close"></i></a>
                                    <?php }elseif($row['status']=='Menunggu Konfirmasi Admin'){ ?>
                                    <a href="detail_transaksi.php?id=<?=$row['id']?>" class="btn"
                                        style="color:white;"><i class="fa fa-eye"></i></a>
                                    <a href="php/cancel_transaksi.php?id=<?=$row['id']?>" class="btn"
                                        style="color:white;" onclick="return confirm('Cancel transaksi ?')"><i
                                            class="fa fa-close"></i></a>
                                    <?php }elseif($row['status']=='Transaksi Dicancel'){ ?>
                                    <a href="detail_transaksi.php?id=<?=$row['id']?>" class="btn"
                                        style="color:white;"><i class="fa fa-eye"></i></a>
                                    <?php }else if($row['status']=='Prosess Pengiriman'){ ?>
                                    <a href="detail_transaksi.php?id=<?=$row['id']?>" class="btn"
                                        style="color:white;"><i class="fa fa-eye"></i></a>
                                    <a href="php/produk_diterima.php?id=<?=$row['id']?>" class="btn"
                                        style="color:white;"
                                        onclick="return confirm('Apakah produk telah diterima ?')"><i
                                            class="fa fa-check"></i></a>
                                    <?php }else{ ?>
                                    <a href="detail_transaksi.php?id=<?=$row['id']?>" class="btn"
                                        style="color:white;"><i class="fa fa-eye"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
    <?php }else{ ?>
    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="jumbotron">
                        <h1 class="display-4">Oops !</h1>
                        <br>
                        <p class="lead">Transaksi anda kosong</p>
                        <hr class="my-4">
                        <p class="lead">
                            <a href="index.php"> <button class="btn" type="button">Back To Home</button></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php } ?>
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Beli Juga</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="man" role="tabpanel">
                                <div class="tab-single">
                                    <div class="row">
                                        <?php $produk = mysqli_query($koneksi,"select * from produk order by rand() limit 0,4");
                                        while($dpro=mysqli_fetch_assoc($produk)) { ?>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="produk.php?id=<?php echo $dpro['id']?>">
                                                        <img class="default-img"
                                                            src="assets/gambar/produk/<?php echo $dpro['gambar']?>"
                                                            alt="#">
                                                    </a>

                                                    <div class="button-head text-center">
                                                        <a title="Add to cart" href="#">Add to cart</a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a
                                                            href="produk.php?id=<?php echo $dpro['id']?>"><?php echo $dpro['nama']?></a>
                                                    </h3>
                                                    <div class="product-price">
                                                        <span><?php echo "Rp. ".number_format($dpro['harga'],0,',','.'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'base_f.php';?>

</body>

</html>