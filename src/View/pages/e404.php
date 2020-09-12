<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/header.php' ?>

	<!-- =========404 Image area=========== -->
	<div class="error-page-area">
		<div class="container">
			<div class="row">
				<!--404 text image-->
				<div class="col-xl-12">
					<div class="error-text">
					<img src="<?= VIEW_DIR . '../Assets/'?>img/404.png" alt="">
						<h2>Запрашиваемая страница отсуствует или была удалена</h2>
						<a href="/">На главную</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- =========Call to Action=========== -->
	<div class="callto-action">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-7">
					<div class="callto-action-text">
						<h5>Like what you see? <span>Let’s work</span> </h5>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-5">
					<div class="callto-action-btn callto-action-btn-2">
						<a href="/about">contact us</a>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/footer.php' ?>