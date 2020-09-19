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
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                <div class="left-side">
                    <div>
                        <?= $content ?>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="right-side">
                   <?= $aside ?? '' ?>
                </div>
            </div>
        </div>

    </div>
</div>