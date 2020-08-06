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
                    <h4>Keranjang Saya</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>Produk</th>
                                <th>Nama</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            $query = mysqli_query($koneksi,"select keranjang.*,produk.gambar,produk.nama from keranjang left join produk on produk.id = keranjang.id_produk where keranjang.id_pengguna='$_SESSION[id]' order by keranjang.id desc");
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
                                    <span><?php echo "Rp. ".number_format($row['subtotal'],0,',','.'); ?></span></td>
                                <td class="action" data-title="Remove">
                                    <a href="php/aksi_hapus_keranjang.php?id=<?=$row['id']?>" onclick="return confirm('Hapus produk dari keranjang ?')"><i class="ti-trash remove-icon"></i></a>
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

                                <h4 class="title">Noted:</h4>
                                Biaya pengiriman akan di tambahkan manual oleh admin setelah pengajuan transaksi anda di
                                setujui.
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Subtotal<span><?php echo "Rp. ".number_format($total,0,',','.'); ?></span>
                                        </li>
                                        <li>Biaya Pengiriman<span>-</span></li>
                                        <li class="last">
                                            Total<span><?php echo "Rp. ".number_format($total,0,',','.'); ?></span></li>
                                    </ul>
                                    <div class="button5">
                                        <a href="#" class="btn">Beli Sekarang</a>
                                        <a href="index.php" class="btn">Back To Home</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                                        <span class="price-dec"><?php echo $dpro['stok']?> Pcs</span>
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