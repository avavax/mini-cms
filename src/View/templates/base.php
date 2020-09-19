<div class="blog-hero-banner"
    style="background-image: url(<?= ASSETS_DIR ?>img/blog/<?= $img ?>);">
    <div class="blog-hero-banner-text">
        <h1><?= $title ?? '' ?></h1>
        <p><?= $subtitle ?? '' ?></p>
    </div>
</div>

<div class="blog-body mt-4 mb-4">
    <div class="container">

        <div class="row">
            <div class="offset-xl-2 offset-lg-2 col-xl-8 col-lg-8 col-md-12 col-sm-12">
                <!--=============Left Side Bar==============-->
                <div>
                    <?= $content ?>
                    <?= $aside ?? '' ?>
                </div>
            </div>
        </div>

    </div>
</div>
