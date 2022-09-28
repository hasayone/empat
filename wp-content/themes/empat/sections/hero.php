<?php

use empat\helper\svg_icons;
?>

<section class="hero-block">
	<div class="container">
		<div class="row">
			<div class="hero-left col-md-6 col-sm-12">
				<h1>
					<span class="name">Oleksandr</span>
					<span class="lastname">Orlovskyi
						<?php echo svg_icons::get('logo'); ?>
					</span>
				</h1>
				<div class="about">
					<div class="about-subtitle text-color">
						<?php echo __('// About ME', 'empat'); ?>
					</div>
					<h4 class="about-title">
						<?php echo __('Experienced Web Engineer from ', 'empat'); ?><img alt="Ukraine ♥" src="<?php echo get_template_directory_uri() . '/assets/img/ua.png' ?>">
					</h4>
					<div class="about-description text-color">
						<?php echo __('I’m a Full-stack Wordpress Developer, which is engaged in the development of major government projects.', 'empat'); ?>
					</div>
				</div>
			</div>
			<div class="hero-right col-md-6 col-sm-12">
				<picture>
					<source srcset="<?php echo get_template_directory_uri() . '/assets/img/front.webp' ?>" type="image/webp">
					<source srcset="<?php echo get_template_directory_uri() . '/assets/img/front.jpg' ?>" type="image/jpg">
					<img src="<?php echo get_template_directory_uri() . '/assets/img/front.webp' ?>" alt="Alexander Orlovskiy" width="700" height="auto">
				</picture>
			</div>
		</div>
	</div>
</section>