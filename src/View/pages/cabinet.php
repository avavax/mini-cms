<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/header.php' ?>

<div class="blog-body" style="margin-top: 100px;">
	<div class="container">
		<div class="row">
			<!--============Left Side Bar===============-->
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
				<div class="left-side-2">

					<!--single blog author-->
					<div class="author-profile">
						<h3>Аватар</h3>
						<div class="author-content">
							<img src="<?= ASSETS_DIR ?>img/avatars/<?= $data['img'] ?? 'anonimus.jpg' ?>" alt="avatar">
							<p>Вы можете загрузить картинку c расширением png, jpg, jpeg, bmp, gif, размером не более 2 Мб. В случае отсутствия загруженного аватара используется нейтральное изображение.</p><br>
							<form action="/cabinet/imagechange" method="POST" enctype="multipart/form-data" id="image-change">
								<input type="file" name="avatar"><br><br>
								<p class="message-img-load"></p>
								<input type="submit" value="Загрузить изображение" name="changeUserdata">
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
				<!--============Right Side Bar===============-->
				<div class="right-side-2">
					<div class="blog-post-heading">
						<h1>Персональный кабинет пользователя</h1>
						<span class="publishe-date">Ваш статус -
							<?php
								switch ($userRole) {
									case 'admin':
										echo 'админ';
										break;
									case 'manager':
										echo 'контент-менеджер';
										break;
									default:
										echo 'зарегистрированный пользователь';
										break;
								}
							?>
						</span>
					</div>
					<div class="main-category">
						<h3>Информация о пользователе</h3>
						<div class="category-list">
							<form action="/cabinet" method="POST">
							<input type="hidden" name="id" value="<?= $data['id'] ?? '' ?>">
							<ul>
								<li>
									<p class="user-data">Имя пользователя</p>
									<input type="text" value="<?= $data['name'] ?>" name="name" required>
									<p class="user-data-error"><?= $errors['name'] ?? '' ?></p>
								</li>
								<li>
									<p class="user-data">E-mail</p>
									<input type="email" value="<?= $data['email'] ?>" name="email" required>
									<p class="user-data-error"><?= $errors['email'] ?? '' ?></p>
								</li>
								<li>
									<p class="user-data">О себе (не обязательное поле)</p>
									<textarea name="about"><?= $data['about'] ?? '' ?></textarea>
								</li>
								<li>
									<p>Для того, чтобы оставить прежний пароль, не заполняйте эти поля!</p>
								</li>
								<li>
									<p class="user-data">Пароль</p>
									<input type="password" value="<?= $data['password'] ?? '' ?>" name="password">
									<p class="user-data-error"><?= $errors['password'] ?? '' ?></p>
								</li>
								<li>
									<p class="user-data">Пароль повторно</p>
									<input type="password" value="<?= $data['password'] ?? '' ?>" name="passwordRepeat">
									<p class="user-data-error"><?= $errors['passwordRepeat'] ?? '' ?></p>
								</li>
								<p class="base-cabinet-msg"><?= $message ?? '' ?></p>
								<li><input type="submit" value="Сохранить изменения" name="changeUserdata"></li>
							</ul>
							</form>
						</div>
					</div>
					<div class="main-tags">
						<h3>Статус подписки</h3>
						<div class="tag-list">
							<ul>
								<li>
									<a href="/cabinet/unsubscribe" id="cabinet-subscribe">
									<?= $data['subscribe'] == 1 ? 'Оформлена' : 'Отсутствует' ?>
									</a>
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>

	</div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/footer.php' ?>
