    <!-- =========Footer Area=========== -->
    <section id="footer-fixed">
        <div class="big-footer">
            <div class="container">
                <div class="row">
                    <!--footer logo-->
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="footer-logo">
                            <a href="#">
                                <img src="<?= VIEW_DIR . '../Assets/'?>img/footer-logo.png" alt="">
                            </a>
                            <?= isset($settings['footerLeft']) ? htmlspecialchars_decode($settings['footerLeft']) : '' ?>
                        </div>
                    </div>
                    <!--footer latest work-->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <?= isset($settings['footerCenter']) ? htmlspecialchars_decode($settings['footerCenter']) : '' ?>
                    </div>
                    <!--footer quick links-->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <?= isset($settings['footerRight']) ? htmlspecialchars_decode($settings['footerRight']) : '' ?>
                    </div>
                </div>
            </div>
        </div>
        <!--copyright-->
        <footer>
            <p>All rights reserved @ <?= date('Y')?><br>
            Тема: Coagex - Creative Agency Template</p>
        </footer>
    </section>
    <!-- Jquery JS -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/vendor/jquery-2.2.4.min.js"></script>
    <!-- Bootstrap Js -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/bootstrap.min.js"></script>
    <!-- Meanmenu Js -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/meanmenu.min.js"></script>
    <!-- Animation Js -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/aos.min.js"></script>
    <!-- AJAX Js -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/ajax.js"></script>
    <!-- Background Move Js -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/jquery.backgroundMove.js"></script>
    <!-- ScrollUp Js -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/scrollUp.js"></script>
    <!-- Main Js -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/main.js"></script>
</body>

</html>
