    <!-- =========Footer Area=========== -->
    <section id="footer-fixed">
        <div class="big-footer">
            <div class="container">
                <div class="row">
                    <!--footer logo-->
                    <div class="col-xl-6 col-lg-6 col-md-3 col-sm-6">
                        <div class="footer-logo">
                            <a href="#">
                                <img src="<?= VIEW_DIR . '../Assets/'?>img/footer-logo.png" alt="">
                            </a>
                            <p>Этот сайт является учебным проектом по разработке CMS на нативном PHP. Предусмотрено разграничение ролей пользователей, авторизация, регистрация, кабинет пользователя, система комментариев с модерацией, подписка на статьи. В боковой колонке вы можете посмотреть некоторые из моих коммерческих проектов. </p>
                        </div>
                        <!--footer social-->
                        <div class="social">
                            <ul>
                                <li><a class="footer-socials" href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a class="footer-socials" href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a class="footer-socials" href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a class="footer-socials" href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--footer latest work-->
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                        <div class="footer-heading">
                            <h3>Использованы технологии</h3>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="/">HTML.5, CSS.3</a></li>
                                <li><a href="/">Bootstrap.4</a></li>
                                <li><a href="/">JS(ES7), AJAX</a></li>
                                <li><a href="/">РHP.7</a></li>
                                <li><a href="/">MariaDB.10</a></li>
                                <li><a href="/">ORM Eloquent</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--footer quick links-->
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                        <div class="footer-heading">
                            <h3>Мои коммерческие проекты</h3>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="https://кофе.бел">кофе.бел</a></li>
                                <li><a href="https://bellissima.by">bellissima</a></li>
                                <li><a href="https://avavax.ru/src/kmd/">сайт инженера-проектировщика</a></li>
                                <li><a href="https://svs.guru">svs.guru</a></li>
                                <li><a href="https://kvartiravminske.by">kvartiravminske</a></li>
                                <li><a href="https://mirOborudovania.ru">mirOborudovania</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--copyright-->
        <footer>
            <p>All rights reserved @ <?= date('Y')?></p>
            <p>Powered by <?=$_SERVER["SERVER_SOFTWARE"]; ?> / PHP <?=PHP_VERSION; ?> on <?=PHP_OS; ?></p>
        </footer>
    </section>
    <!-- Jquery JS -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/vendor/jquery-2.2.4.min.js"></script>
    <!-- Proper JS -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/popper.min.js"></script>
    <!-- Bootstrap Js -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/bootstrap.min.js"></script>
    <!-- Video popup Js -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/magnific-popup.min.js"></script>
    <!-- Waypoint Up Js -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/waypoints.min.js"></script>
    <!-- Counter Up Js -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/counterup.min.js"></script>
    <!-- Meanmenu Js -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/meanmenu.min.js"></script>
    <!-- Animation Js -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/aos.min.js"></script>
    <!-- Filtering Js -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/isotope.min.js"></script>
    <!-- Background Move Js -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/jquery.backgroundMove.js"></script>
    <!-- Slick Carousel Js -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/slick.min.js"></script>
    <!-- ScrollUp Js -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/scrollUp.js"></script>
    <!-- Main Js -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/main.js"></script>
</body>

</html>
