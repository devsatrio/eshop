<!-- Jquery -->
<footer class="footer">

    <div class="copyright">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-9 col-12">
                        <div class="left">
                            <p>Copyright © 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a> -
                                All Rights Reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 text-right">
                        <div class="single-footer social">
                            <?php
                            $datasetting = mysqli_query($koneksi,"select * from setting order by id desc limit 0,1");
                            while($st=mysqli_fetch_assoc($datasetting)) { ?>
                            <ul>
                                <li><a href="<?php if($st['link_fb']!=''){echo $st['link_fb'];}else{echo '#';}?>" target="blank()"><i class="ti-facebook"></i></a></li>
                                <li><a href="<?php if($st['link_ig']!=''){echo $st['link_fb'];}else{echo '#';}?>" target="blank()"><i class="ti-instagram"></i></a></li>
                            </ul>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</footer>
<script src="assets/user/js/jquery.min.js"></script>
<script src="assets/user/js/jquery-migrate-3.0.0.js"></script>
<script src="assets/user/js/jquery-ui.min.js"></script>
<!-- Popper JS -->
<script src="assets/user/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="assets/user/js/bootstrap.min.js"></script>
<!-- Slicknav JS -->
<script src="assets/user/js/slicknav.min.js"></script>
<!-- Owl Carousel JS -->
<script src="assets/user/js/owl-carousel.js"></script>
<!-- Magnific Popup JS -->
<script src="assets/user/js/magnific-popup.js"></script>
<!-- Waypoints JS -->
<script src="assets/user/js/waypoints.min.js"></script>
<!-- Countdown JS -->
<script src="assets/user/js/finalcountdown.min.js"></script>
<!-- Nice Select JS -->
<script src="assets/user/js/nicesellect.js"></script>
<!-- Flex Slider JS -->
<script src="assets/user/js/flex-slider.js"></script>
<!-- ScrollUp JS -->
<script src="assets/user/js/scrollup.js"></script>
<!-- Onepage Nav JS -->
<script src="assets/user/js/onepage-nav.min.js"></script>
<!-- Easing JS -->
<script src="assets/user/js/easing.js"></script>
<!-- Active JS -->
<script src="assets/user/js/active.js"></script>