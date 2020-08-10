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
                    <h4>Detail Transaksi <?=$trans['kode']?></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                Tanggal Beli : <?=$trans['tanggal']?>
                </div>
                <br><br>
                <div class="col-12">
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>Produk</th>
                                <th>Nama</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            $query = mysqli_query($koneksi,"select transaksi_detail.*,produk.gambar,produk.nama from transaksi_detail left join produk on produk.id = transaksi_detail.id_produk where transaksi_detail.id_transaksi='$_GET[id]' order by transaksi_detail.id desc");
                            while($row=mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td class="image" data-title="No">
                                    <img src="assets/gambar/produk/<?=$row['gambar']?>" alt="#">
                                </td>
                                <td class="product-des" data-title="Description">
                                    <p class="product-name"><a
                                            href="produk.php?id=<?=$row['id_produk']?>"><?=$row['nama']?></a></p>

                                </td>
                                <td class="price" data-title="Price">
                                    <span><?php echo "Rp. ".number_format($row['harga'],0,',','.'); ?></span></td>
                                <td class="qty" data-title="Qty">
                                    <?=$row['jumlah']?> Pcs
                                </td>
                                <td class="total-amount" data-title="Total">
                                    <span><?php echo "Rp. ".number_format($row['subtotal'],0,',','.'); ?></span>
                                </td>
                            </tr>
                            <?php 
                            $total += $row['subtotal'];
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-12 mb-5">
                            <h4 class="title">Status:</h4>
                                <?=$trans['status']?>
                                <br><br>
                                <h4 class="title">Keterangan:</h4>
                                <?=$trans['keterangan']?>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Subtotal<span><?php echo "Rp. ".number_format($trans['subtotal'],0,',','.'); ?></span>
                                        </li>
                                        <li>Biaya Pengiriman<span><?php echo "Rp. ".number_format($trans['pengiriman'],0,',','.'); ?></span></li>
                                        <li class="last">
                                            Total<span><?php echo "Rp. ".number_format($trans['total'],0,',','.'); ?></span>
                                        </li>
                                    </ul>
                                    <div class="button5">
                                            <a href="#" onclick="history.go(-1)" class="btn">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <h2>Produk Yang Mungkin Anda Suka</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="tab-content" id="myTabContent">
                            <!-- Start Single Tab -->
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