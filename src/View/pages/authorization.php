<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/header.php' ?>

	<div class="contactus-area">
		<div class="container">

			<div class="row">
				<div class="col-xl-12">
					<div class="contact-form-area">

						<div class="contact-left-bg">
							<img src="<?= ASSETS_DIR ?>img/contact-p-2.png" alt="">
						</div>
						<div class="contact-form-heading">
							<h3>Форма авторизации</h3>
						</div>
						<div class="contact-form">
							<form action="/authorization" method="POST">
								<input type="email" placeholder="Email" name="email" value="<?= $email ?>">
								<input class="margin-top-lb-30 margin-top-sb-30" type="password" placeholder="Пароль" name="password" value="<?= $password ?>">
								<?php if ($error): ?>
									<h4 class="mt-4 text-danger text-center">email или пароль введены некорректно</h4>
								<?php endif; ?>
								<div class="send-btn">
									<input type="submit" value="Войти" id="formsend">
								</div>
							</form>
						</div>

						<div class="contact-right-bg">
							<img src="<?= ASSETS_DIR ?>img/contact-p-1.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/footer.php' ?>
