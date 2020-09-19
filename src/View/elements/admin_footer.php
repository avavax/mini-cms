    <!-- =========Footer Area=========== -->
    <section id="footer-fixed">
        <footer>
            <p>All rights reserved @ <?= date('Y')?> / Тема: Coagex - Creative Agency Template</p>
            <p>Powered by <?=$_SERVER["SERVER_SOFTWARE"]; ?> / PHP <?=PHP_VERSION; ?> on <?=PHP_OS; ?></p>
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
    <!-- ScrollUp Js -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/scrollUp.js"></script>
    <!-- AJAX Js -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/ajax.js"></script>
    <!-- Main Js -->
    <script src="<?= VIEW_DIR . '../Assets/'?>js/main.js"></script>
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/o9r4u4ug0synuv2pk24gwdetudpi4sj3i4rq4mspxh8woeep/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>
    <script>
        tinymce.init({
            selector: '.wysiwyg',
        });
    </script>
</body>

</html>
