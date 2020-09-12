<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/header.php' ?>

	<!-- =========Blog Image Area=========== -->
	<div class="blog-home-page">
		<div class="blog-hero-home">
			<video autoplay="autoplay" loop="loo" muted="muted" class="hidden-xs" id="video_background" poster="" data-vid_mp4="<source src='<?= ASSETS_DIR ?>video/video_earth.mp4'; type='video/mp4';>">
				<source src="<?= ASSETS_DIR ?>video/video_earth.mp4" type="video/mp4">
			</video>
			<div class="blog-home-text">
				<h1>Только интересные статьи из мира IT</h1>
				<h2>Не забудьте подписаться, чтобы быть в курсе всех новостей!</h2>
			</div>
		</div>

		<div class="container">
			<div class="main-blog-list">
			<!--<div class="row">
				<div class="col-xl-12">
					<div class="section-heading-3">
						<h3>Статьи блога</h3>
					</div>
				</div>
			</div>-->
				<div class="row">

					<?php foreach($previews as $preview): ?>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
						<div class="home-single-blog">
							<div class="s-blog-image">
								<img src="<?= ASSETS_DIR ?>img/blog/<?= $preview['img']; ?>" alt="<?= $preview['excerpt']; ?>">
								<div class="blog-post-date">
									<span><?= $preview['date']; ?></span>
								</div>
							</div>
							<div class="s-blog-content">
								<h4><?= $preview['title']; ?></h4>
								<p><?= $preview['excerpt']; ?></p>
								<a href="/article/<?= $preview['id']; ?>">Перейти к статье</a>
							</div>
						</div>
					</div>
					<?php endforeach; ?>

				</div>

				<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/pagination.php' ?>

			</div>
		</div>
	</div>

	<?php if ($subscribeForm['showForm']): ?>
		<!-- =========Call to Action=========== -->
		<div class="callto-action">
			<div class="container">
				<form action="/" method="POST" id="subscribe-form">
					<input type="hidden" name="subscribe" value="subscribe">

					<?php if ($subscribeForm['showEmailField']): ?>
						<div class="row">
							<div class="col-xl-8 col-lg-8 col-md-8 col-sm-7">
		                		<div class="callto-action-text">
			                    	<input id="callto" name="email" type="text" placeholder="Подпишитесь на новые статьи">
			                	</div>
			            	</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-5">
								<div class="callto-action-btn">
									<button type="submit" name="subscribe" value="submit">Подписаться</button>
								</div>
							</div>
						</div>
					<? else: ?>
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="callto-action-btn text-center">
									<button type="submit" value="submit">Подписаться</button>
								</div>
							</div>
						</div>
					<? endif; ?>

					<p style="color: white;" class="subscribe-msg"></p>
				</form>
			</div>
		</div>
	<?php endif; ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/footer.php' ?>