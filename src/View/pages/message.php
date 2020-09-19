<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/header.php' ?>

	<!-- =========404 Image area=========== -->
	<div class="error-page-area">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="error-text">
						<h2><?= $message ?></h2>
						<a href="/">На главную</a>
						<?php if (isset($user) && ($user->status == 'admin' || $user->status == 'manager')): ?>
							<a href="/admin">В админ-панель</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/footer.php' ?>
