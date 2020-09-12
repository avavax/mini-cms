<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/header.php' ?>

	<!-- =========Single Blog Image Area=========== -->
	<div class="blog-body mt-5">
		<div class="container">
			<div class="row">
				<div class="offset-xl-2 offset-lg-2 col-xl-8 col-lg-8 col-md-12 col-sm-12">
					<!--=============Left Side Bar==============-->
					<div class="left-side">
						<div class="blog-inner">
							<img src="<?= ASSETS_DIR ?>img/blog/<?= $img ?>" alt="<?= $img ?>">
						</div>
						<div class="blog-post-heading">
							<h1><?= $title ?></h1>
							<span class="publishe-date">опубликовано : <?= $date ?></span>
						</div>
						<!--single blog content-->
						<div class="blog-body-content">
							<?= $content ?>

							<!--single blog social share-->
							<div class="blog-share">
								<h4>Поделиться в соцсетях</h4>
								<ul>
									<li><a class="footer-socials" href="#"><i class="fab fa-facebook"></i></a></li>
									<li><a class="footer-socials" href="#"><i class="fab fa-instagram"></i></a></li>
									<li><a class="footer-socials" href="#"><i class="fab fa-twitter"></i></a></li>
									<li><a class="footer-socials" href="#"><i class="fab fa-youtube"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

			</div>

			<!-- single blog comments area-->
			<div class="row">
				<div class="offset-xl-2 offset-lg-2 col-xl-6 col-lg-6 col-md-6 col-sm-12">
					<div class="blog-comments-area">
						<div class="comment-heading">
							<h4><?= empty($comments) ? 'Комментариев пока нет' : 'Комментарии' ?>
							</h4>
						</div>
						<!--single blog coment text-->
						<div class="commnet-text">
							<?php foreach ($comments as $comment): ?>
								<?php if ($comment['show']) : ?>
									<div class="single-comment">
										<div class="image-box">
											<img src="<?= ASSETS_DIR ?>img/avatars/
											<?= $comment['img'] ?? 'anonimus.jpg' ?>" alt="avatar">
										</div>
										<div class="text-box">
											<p>
												<strong><?= $comment['username'] ?> </strong>
												 / <?= $comment['created_at'] ?>
											</p>
											<p><?= $comment['content'] ?> </p>
											<?php if ($comment['moderate']) : ?>
												<p class="comment-moderate"><em>(Комментарий находится на модерации)</em></p>
											<?php endif; ?>
										</div>
									</div>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
			<!--single blog form-->
			<div class="row">
				<div class="offset-xl-2 offset-lg-2 col-xl-6 col-lg-6 col-md-6 col-sm-12">
					<div class="comment-heading">
						<h4>Добавить комментарий</h4>
					</div>
					<div class="comment-field pb-5">
						<form action="/article" method="POST" id="comment-form">
							<input type="hidden" name="method" value="addComment">
							<input type="hidden" name="id" value="<?= $id ?>">
							<textarea cols="30" rows="4" placeholder="Сообщение" name="comment"></textarea>
							<p id="commentAddMessage"></p>
							<button type="submit" id="postcomment">Отправить</button>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/footer.php' ?>
