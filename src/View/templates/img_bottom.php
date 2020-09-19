<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="offset-xl-2 offset-lg-2 col-xl-8 col-lg-8 col-md-12 col-sm-12">
            <!--=============Left Side Bar==============-->
            <div class="blog-body mt-4 mb-4">
                <div class="blog-post-heading">
                    <h1><?= $title ?></h1>
                    <h2><?= $subtitle ?? '' ?></h2>
                </div>
                <!--single blog content-->
                <div>
                    <?= $content ?>
                    <?= $aside ?? '' ?>
                </div>
                <div class="blog-inner">
                    <?php if ($img): ?>
                        <img src="<?= ASSETS_DIR ?>img/blog/<?= $img ?>" alt="<?= $img ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
