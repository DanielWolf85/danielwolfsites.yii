<?php

use app\widgets\Alert;
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!doctype html>
<html lang="<?= Yii::$app->language ?>">

<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $this->registerCsrfMetaTags() ?>
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title><?= Html::encode($this->title) ?></title>


	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">

	<?php $this->head() ?>

</head>

<body>
	<?php $this->beginBody() ?>
	<div>

		<!-- preloader -->
		<div class="preloader">
			<div>
				<img src="/img/Blocks-1s-200px.svg" alt="preloader">
			</div>
		</div>
		<!-- preloader -->




		<!-- header -->
		<header id="header">
			<div class="container-fluid">
				<div class="row">
					<div class="header col-lg-12 text-center">
						<a href="<?= Url::home() ?>">
							<h1>danielwolfsites</h1>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="social-menu col-lg-3 col-md-3">
						<ul>
							<div class="link"></div>
							<li><a href="https://vk.com/id58472037">
									<img src="/img/vk_14553_[FreeIcon.org].png" alt="вк">
								</a>
							</li>
						</ul>
					</div>



					<!-- mobile-menu -->

					<div class="mobile-menu">
						<a href="<?= Url::to('index'); ?>">Главная</a>
						<!-- <a href="#">Контакты</a> -->
						<a href="<?= Url::to('about'); ?>">О себе</a>

						<?php
						// wp_nav_menu([
						// 	'theme_location' => 'Primary',
						// 	'menu' => 'Primary',
						// 	'container' => null,
						// 	'container_class' => '',
						// 	'container_id' => '',
						// 	'menu_class' => '',
						// 	'menu_id' => '',
						// 	'echo' => true,
						// 	'fallback_cb' => 'wp_page_menu',
						// 	'before' => '',
						// 	'after' => '',
						// 	'link_before' => '',
						// 	'link_after' => '',
						// 	'depth' => 0,
						// 	'walker' => '',
						// ]);
						?>

						<div class="menu_toggle_off">
							<div class="line2"></div>
							<div class="line3"></div>
						</div>
					</div>
					<div class="menu_toggle_on">
						<div class="line"></div>
						<div class="line"></div>
						<div class="line"></div>
					</div>
					<!-- mobile-menu -->



					<div class="nav col-lg-6 col-md-6">
						<div class="nav-link">
							<a class="nav-link" href="<?= Url::to('index'); ?>">Главная</a>
							<a class="nav-link" href="<?= Url::to('about'); ?>">О себе</a>
						</div>



						<?php
						// wp_nav_menu([
						// 	'theme_location' => 'Primary',
						// 	'menu' => 'Primary',
						// 	'container' => null,
						// 	'container_class' => '',
						// 	'container_id' => '',
						// 	'menu_class' => 'nav-link',
						// 	'menu_id' => '',
						// 	'echo' => true,
						// 	'fallback_cb' => 'wp_page_menu',
						// 	'before' => '',
						// 	'after' => '',
						// 	'link_before' => '',
						// 	'link_after' => '',
						// 	'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						// 	'depth' => 0,
						// 	'walker' => '',
						// ]);
						?>
						<!--<div class="nav-link">
								<li><a href="#" class="link">главная</a></li>
							</div>
							<div class="nav-link">
								<li><a href="#" class="link">о себе</a></li>
							</div>
							<div class="nav-link">
								<li><a href="#" class="link">контакты</a></li>
							</div>-->

					</div>

					<div class="phone col-lg-3 col-md-3">
						<p><img src="/img/62818_telephone_receiver_78687_[FreeIcon.org].png" alt="phone">
							<phone>8 918 544-73-94</phone>
						</p>
					</div>

				</div>
			</div>
	</div>
	</header>
	<!-- header -->


	<?= $content; ?>


	<!-- footer -->
	<footer class="text-center">
		<div class="container-fluid">
			<div class="row">
				<div class="footer-menu col-lg-6 col-lg-offset-3">
					<ul>
						<li class="link">
							<a href="<?= Url::to('index'); ?>" class="link">Главная</a>
						</li>
						<li class="link">
							<a href="<?= Url::to('about'); ?>" class="link">О себе</a>
						</li>
						<li class="link">
							<a href="<?= Url::to('/site/policy') ?>" class="link">Политика конфиденциальности</a>
						</li>


					</ul>
				</div>
			</div>
			<div class="row">
				<div class="social-menu col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-xs-6 col-xs-offset-3">
					<ul>
						<div class="link"></div>
						<li><a href="https://vk.com/id58472037">
								<img src="/img/vk_14553_[FreeIcon.org].png" alt="вк">
							</a></li>
				</div>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="rights col-lg-4 col-md-4 col-xs-4">
				<p>&copy; Все права защищены.</p>
			</div>
			<div class="phone col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-xs-4 col-xs-offset-4">
				<p><img src="/img/62818_telephone_receiver_78687_[FreeIcon.org].png" alt="phone">
					<phone>8 918 544-73-94</phone>
				</p>
			</div>
		</div>
		</div>
	</footer>
	<!-- footer -->



	<!-- go-top -->
	<div id="go-top">
		<a href="#header" class="scrollDown" title="Back to Top"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
	</div>
	<!-- go-top -->



	</div><!-- #page -->



	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

	<!-- preloader -->
	<script>
		$(window).on('load', function() {
			$('.preloader').delay(300).fadeOut('slow')
		});
	</script>
	<!-- preloader -->



	<!-- mobile-menu -->
	<script>
		var $menu = $('.mobile-menu');
		var $menu_toggle_on = $('.menu_toggle_on');

		$('.menu_toggle_on').click(function() {
			if ($menu.css('marginTop') < '0px') {
				$($menu).animate({
					'marginTop': '10px',
					'opacity': '1'
				}, 400);
				$($menu_toggle_on).animate({
					'opacity': '0',
				}, 100);
			};
		});
		$('.menu_toggle_off').click(function() {
			if ($menu.css('marginTop') > '0px') {
				$($menu).animate({
					'marginTop': '-300px',
					'opacity': '0'
				}, 100);
				$($menu_toggle_on).animate({
					'opacity': '1',
				}, 600);
			};
		});
	</script>
	<!-- mobile-menu -->


	<!-- go-top -->
	<script>
		$(document).ready(function() {
			var goTopButton = function() {
				var goButtonShow = 500,
					fadeInTime = 400,
					fadeOutTime = 400,
					goTop = $('#go-top');
				$(window).on('scroll', function() {
					if ($(window).scrollTop() >= goButtonShow) {
						goTop.fadeIn(fadeInTime);
					} else {
						goTop.fadeOut(fadeOutTime);
					}
				});
			}
			goTopButton();
		});
	</script>
	<!-- go-top -->


	<!-- Parallax -->
	<!-- <script>
	$(window).scroll(function() {

		var st = $(this).scrollTop();

		$('#body').css({
			'transform' : 'translate(0%, ' + -st/60 + "%)"
		});

	});
</script> -->
	<!-- Parallax -->



	<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>