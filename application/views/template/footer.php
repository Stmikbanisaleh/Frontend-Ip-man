<!--=== Footer v8 ===-->
<div class="footer-v8">
    <footer style="background:#1672af;" class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 md-margin-bottom-50">

                    <h2>Akses Cepat</h2>
                    <!-- Footer Lists -->
                    <ul class="footer-lists">
                        <?php foreach ($akses as $ak) { ?>
                            <li><a href="<?= $ak['url']; ?>"><?= $ak['nama_link']; ?>&nbsp;<i class="fa fa-angle-right"></i> </a></li>
                        <?php } ?>
                    </ul>
                    <!-- End Footer Lists -->
                </div>

                <div class="col-md-4 col-sm-6 md-margin-bottom-50">

                    <h2>Tautan Lainnya</h2>
                    <!-- Footer Lists -->
                    <ul class="footer-lists">
                        <?php foreach ($link as $ln) { ?>
                            <li><a href="<?= $ln['url_web']; ?>"><?= $ln['nama_link']; ?>&nbsp;<i class="fa fa-angle-right"></i> </a></li>
                        <?php } ?>
                    </ul>
                    <!-- End Footer Lists -->
                </div>


                <div class="col-md-4 col-sm-6 ">
                    <h2>Hubungi Kami</h2>
                    <p>Jl. Pemuda Persil No. 1 </p>
                    <p>Rawamangun, Jakarta Timur </p>
                    <hr>
                    <p>Phone: 800 123 3456</p>
                    <p>Fax: 800 123 3456</p>
                    <hr>
                    <p>Email Address: <a href="#">info@lapan.go.id</a></p>


                    <div class="tes margin-top-20">
                        <!-- Social Icons -->
                        <ul class="social-icon-list margin-bottom-20 matgin-top-20">
                            <li><a href="https://twitter.com/LAPAN_RI"><i class="rounded-x fa fa-twitter"></i></a></li>
                            <li><a href="https://www.facebook.com/LapanRI"><i class="rounded-x fa fa-facebook"></i></a></li>
                        </ul>
                        <!-- End Social Icons -->
                    </div>

                </div>
            </div>
            <!--/end row-->
        </div>
        <!--/end container-->
    </footer>

    <footer style="background:#fff;" class="copyright">
        <div class="container">
            <ul class="list-inline terms-menu">
                <?php $tahun = date("Y"); ?>
                <li><?= $tahun ?> &copy; All Rights Reserved.</li>
            </ul>
        </div>
        <!--/end container-->
    </footer>
</div>
<!--=== End Footer v8 ===-->

</div>
<!--/wrapper-->


<!-- JS Global Compulsory -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery/jquery-migrate.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script src="<?= base_url() ?>assets/plugins/back-to-top.js"></script>
<!--<script src="<?= base_url() ?>assets/plugins/smoothScroll.js"></script>-->
<script src="<?= base_url() ?>assets/plugins/counter/waypoints.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/counter/jquery.counterup.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<script src="<?= base_url() ?>assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
<script src="<?= base_url() ?>assets/plugins/master-slider/masterslider/masterslider.js"></script>
<script src="<?= base_url() ?>assets/plugins/master-slider/masterslider/jquery.easing.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/modernizr.js"></script>
<script src="<?= base_url() ?>assets/plugins/login-signup-modal-window/js/main.js"></script> <!-- Gem jQuery -->
<script src="<?= base_url() ?>assets/plugins/summernote/summernote.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-fixedheader/dataTables.fixedHeader.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bootstrap/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/dataTables.responsive.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/dataTables.buttons.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/buttons.html5.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/buttons.flash.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/buttons.print.js"></script>
<!-- JS Customization -->
<script src="<?= base_url() ?>assets/js/custom.js"></script>
<!-- JS Page Level -->
<script src="<?= base_url() ?>assets/js/app.js"></script>
<script src="<?= base_url() ?>assets/js/plugins/fancy-box.js"></script>
<script src="<?= base_url() ?>assets/js/plugins/owl-carousel.js"></script>
<script src="<?= base_url() ?>assets/js/plugins/master-slider-showcase1.js"></script>
<script src="<?= base_url() ?>assets/js/plugins/style-switcher.js"></script>
<script src="<?= base_url() ?>assets/plugins/summernote/summernote.min.js"></script>
<script>
    jQuery(document).ready(function() {
        App.init();
        App.initCounter();
        FancyBox.initFancybox();
        OwlCarousel.initOwlCarousel();
        OwlCarousel.initOwlCarousel2();
        StyleSwitcher.initStyleSwitcher();
        MasterSliderShowcase1.initMasterSliderShowcase1();
    });
</script>
<!--[if lt IE 9]>
	<script src="<?= base_url() ?>assets/plugins/respond.js"></script>
	<script src="<?= base_url() ?>assets/plugins/html5shiv.js"></script>
	<script src="<?= base_url() ?>assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->
</body>

</html>