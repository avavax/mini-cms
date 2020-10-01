<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/header.php' ?>

	<!-- =========404 Image area=========== -->
	<div class="error-page-area">
		<div class="container">
			<div class="row">
				<!--404 text image-->
				<div class="col-xl-12">
					<div class="error-text">
					<!--<img src="<?= VIEW_DIR . '../Assets/'?>img/404.png" alt="">-->
						<h2><?= 'Error ' . $error . ' / ' . $message ?></h2>
						<a href="/">На главную</a>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/footer.php' ?>
