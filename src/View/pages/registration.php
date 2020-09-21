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
							<h3>Регистрация нового пользователя</h3>
						</div>
						<div class="contact-form">
							<form action="/registration" method="POST" id="user-registration">
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<input type="text" placeholder="Ваше имя или псевдоним" name="name" value="<?= $data['name'] ?? '' ?>" required>
										<p><?= $errors['name'] ?? '' ?></p>
									</div>
									<div class="col-md-6 col-sm-12">
										<input type="email" placeholder="Email" name="email" value="<?= $data['email'] ?? '' ?>" required>
										<p><?= $errors['email'] ?? '' ?></p>
									</div>
									<div class="col-md-6 col-sm-12 mt-md-4">
										<input type="password" placeholder="Пароль" name="password" value="<?= $data['password'] ?? '' ?>" required>
										<p><?= $errors['password'] ?? '' ?></p>
									</div>
									<div class="col-md-6 col-sm-12 mt-md-4">
										<input type="password" placeholder="Повторите пароль" name="passwordRepeat" value="<?= $data['passwordRepeat'] ?? '' ?>" required>
										<p><?= $errors['passwordRepeat'] ?? '' ?></p>
									</div>
									<div class="col-md-12 col-sm-12 mt-md-4 text-center">
										<input type="checkbox" name="agreement" id="agreement" value="yes">
										<label for="agreement">Я ознакомился с <a href="/page/1" target="_blank">условиями использования</a> сайта и подтверждаю своё согласие</label>
										<p><?= $errors['agreement'] ?? '' ?></p>
									</div>
								</div>
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
