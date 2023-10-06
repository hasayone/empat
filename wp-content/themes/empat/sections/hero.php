<?php use empat\helper\svg_icons; ?>

<section class="hero-block">
	<div class="container">
		<div class="row">
			<div class="hero-left col-md-6 col-sm-12">
				<h1>
					<span class="name">Oleksandr</span>
					<span class="lastname">Orlovskyi
						<?= svg_icons::get( 'logo' ); ?>
					</span>
				</h1>
				<div class="about">
					<div class="about-subtitle text-color">
						<?= __( '// About ME', 'empat' ); ?>
					</div>
					<h4 class="about-title">
						<?= __( 'Experienced Web Engineer from ', 'empat' ); ?><img alt="Ukraine ♥" src="<?= get_template_directory_uri() . '/assets/img/ua.png' ?>">
					</h4>
					<div class="about-description text-color">
						<?= __( 'I’m a Full-stack WordPress Developer, which is engaged in the development of major government projects.', 'empat' ); ?>
					</div>
				</div>
			</div>
			<div class="hero-right col-md-6 col-sm-12">
				<picture>
					<source srcset="<?= get_template_directory_uri() . '/assets/img/front.webp' ?>" type="image/webp">
					<source srcset="<?= get_template_directory_uri() . '/assets/img/front.jpg' ?>" type="image/jpg">
					<img src="<?= get_template_directory_uri() . '/assets/img/front.webp' ?>" alt="Oleksandr Orlovskyi" width="700" height="auto">
				</picture>
			</div>
		</div>
	</div>
</section>
