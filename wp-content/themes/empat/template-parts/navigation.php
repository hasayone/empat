<?php

use empat\helper\svg_icons;
?>

<div id="head-holder">
	<?php
	/**
	 * Desktop navigation
	 */
	?>
	<div id="spacer"></div>

	<header id="header" class="">
		<div class="container">
			<div class="row">

				<!-- Logo -->
				<div class="logo col-xs-10 col-sm-10 col-md-2">
					<a href="<?php echo get_home_url(); ?>" class="header-logo">
						<picture class="light">
							<source srcset="<?php echo get_template_directory_uri() . '/assets/img/logo/logo.webp' ?>" type="image/webp">
							<source srcset="<?php echo get_template_directory_uri() . '/assets/img/logo/logo.png' ?>" type="image/png">
							<img width="24" height="23" alt="logo" src="<?php echo get_template_directory_uri() . '/assets/img/logo/logo.png' ?>">
						</picture>
						<div class="header-logo__description">Empat <span>Developer</span></div>
					</a>
				</div>

				<!-- Desktope content -->
				<div class="header-desktope-content col-md-10">
					<nav class="nav col-xs-2 col-sm-2 col-md-10 d-xs-none d-md-flex">
						<?php
						wp_nav_menu([
							'menu' => 'header_menu',
							'theme_location' => 'header_menu',
							'menu_class' => 'header_menu',
							'container' => false
						]);
						?>
					</nav>
				</div>

				<!-- Mobile Menu -->
				<div class="hamburger-mobile col-xs-2 col-sm-2">
					<a id="hamburger-mobile-toggler" onclick="return false">
						<?php echo svg_icons::get('menu'); ?>
					</a>
				</div>

			</div>
		</div>
		<div class="mobile-menu d-none">
			<div class="mobile-menu__overlay"></div>
			<div class="mobile-menu__content">
				<a id="header-mobile-nav-close" onclick="return false">
					<?php echo svg_icons::get('close'); ?>
				</a>
				<nav class="nav">
					<?php
					wp_nav_menu([
						'menu' => 'header_menu',
						'theme_location' => 'header_menu',
						'menu_class' => 'header_menu',
						'container' => false
					]);
					?>
				</nav>
			</div>
		</div>
	</header>

</div>