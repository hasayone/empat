<?php

use empat\helper\front;
use empat\helper\svg_icons;

get_header();

$url 								= get_field('url');
$short_description 	= get_field('short_description');
$description 				= get_field('description');
$company 						= get_field('company');
$stack 							= get_field('stack');
$content 						= get_field('content');
/* It's getting the featured image from the post. */
$featuredImage 			= get_field('featured_image');
$featuredImageWEBP 	= get_field('featured_image_webp');
$fullSiteImage 			= get_field('full_site_image');
$gallery 						= get_field('gallery');

/* It's getting the tags from the post. */
$techStack 					= explode(", ", strip_tags(get_the_term_list(get_the_ID(), 'project_tag', '', ', ')));
$cat 								= strip_tags(get_the_term_list(get_the_ID(), 'project_cat', '', ', '));
$customer						= strip_tags(get_the_term_list(get_the_ID(), 'project_customer', '', ', '));

// get_template_part('/template-parts/single-hero');
?>

<div class="hero">
	<div class="container">
		<div class="row">
			<div class="hero-title col-md-6">
				<a href="/projects">
					< Back to all projects</a>
						<?php if ($company) : ?>
							<h1><?php echo $company; ?></h1>
						<?php else : ?>
							<?php echo the_title('<h1>', '</h1>'); ?>
						<?php endif; ?>
						<?php if ($cat) echo '<h4>' . $cat . '</h4>'; ?>
			</div>
			<div class="hero-tech-stack col-md-6">
				<?php foreach ($techStack as $tag) :
					echo svg_icons::get(mb_strtolower($tag), mb_strtolower($tag));
				endforeach; ?>
			</div>
		</div>
	</div>
	<div class="hero-wave"></div>
	<div class="hero-wave"></div>
	<div class="hero-wave"></div>
</div>

<div id="content-blocks">

	<div class="intro">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-8 img_block">

					<?php if ($gallery) : ?>
						<div class="swiper">
							<div class="swiper-wrapper">
							<?php endif; ?>
							<?php if ($featuredImage) : ?>
								<?php if ($featuredImage && !$featuredImageWEBP) : ?>
									<a data-lity href="<?php echo $featuredImage['url']; ?>" class="<?php if ($gallery) echo 'swiper-slide' ?>">
										<img src="<?php echo $featuredImage['url'] ?>" alt="<?php the_title() ?>" />
									</a>
								<?php elseif ($featuredImage && $featuredImageWEBP) : ?>
									<a data-lity href="<?php echo $featuredImage['url']; ?>" class="<?php if ($gallery) echo 'swiper-slide' ?>">
										<picture>
											<source srcset="<?php echo $featuredImageWEBP['url'] ?>" type="image/webp">
											<source srcset="<?php echo $featuredImage['url'] ?>" type="image/jpg">
											<img src="<?php echo $featuredImageWEBP['url'] ?>" alt="<?php the_title() ?>">
										</picture>
									</a>
								<?php endif; ?>
							<?php else : ?>
								<a data-lity href="<?php echo get_template_directory_uri() . '/assets/img/EmpatProject.jpg' ?>" class="<?php if ($gallery) echo 'swiper-slide' ?>">
									<picture>
										<source srcset="<?php echo get_template_directory_uri() . '/assets/img/EmpatProject.webp' ?>" type="image/webp">
										<source srcset="<?php echo get_template_directory_uri() . '/assets/img/EmpatProject.jpg' ?>" type="image/jpg">
										<img src="<?php echo get_template_directory_uri() . '/assets/img/EmpatProject.webp' ?>" alt="<?php the_title() ?>">
									</picture>
								</a>
							<?php endif; ?>
							<?php
							if ($gallery) :
								foreach ($gallery  as $item) : ?>
									<a data-lity href="<?php echo $item['url']; ?>" class="swiper-slide">
										<img src="<?php echo $item['url'] ?>" alt="<?php the_title() ?>">
									</a>
							<?php endforeach;
							endif;  ?>
							<?php if ($gallery) : ?>
							</div>
							<div class="swiper-pagination"></div>
						</div>
					<?php endif; ?>
				</div>

				<div class="intro-content col-sm-12  col-md-6 col-lg-4">
					<div class="intro-content__body">
						<?php if ($company) : ?>
							<h3><?php echo $company; ?></h3>
						<?php else : ?>
							<?php echo the_title('<h3>', '</h3>'); ?>
						<?php endif; ?>
						<?php if ($short_description) : ?>
							<div class="intro-content__short_description">
								<p>
									<?php echo $short_description; ?>
								</p>
							</div>
						<?php endif; ?>
						<?php if ($description) : ?>
							<div class="intro-content__description">
								<p>
									<?php echo $description; ?>
								</p>
							</div>
						<?php endif; ?>
						<?php
						if ($stack) : ?>
							<div class="intro-content__stack">
								<div class="intro-content__stack-title">Development Stack:</div>
								<div class="intro-content__stack-content">
									<?php echo $stack; ?>
								</div>
							</div>
						<?php endif;  ?>
						<?php
						if ($customer) : ?>
							<div class="intro-content__customer">
								<div class="intro-content__customer-title">Studio/Company:</div>
								<div class="intro-content__customer-content">
									<?php if ($customer == 'Bilberrry') : ?>
										<a href="https://bilberrry.com/" target="_blank">
											<?php echo svg_icons::get(mb_strtolower($customer), mb_strtolower($customer)); ?><?php echo $customer; ?>
										</a>
									<?php else : ?>
										<?php echo $customer; ?>
									<?php endif;  ?>
								</div>
							</div>
						<?php endif;  ?>
					</div>


					<div class="intro-content__footer">
						<?php if ($url) : ?>
							<a class="btn" href="<?php echo $url; ?>" target="_blank"><?php echo svg_icons::get('link'); ?><span>Open Site</span></a>
						<?php endif; ?>

					</div>

				</div>

			</div>
			<?php if ($content) : ?>
				<div class="custom_content row">
					<div class="col-md-12">
						<?php echo $content; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>

</div>
<div class="nav-arrows">
	<?php previous_post_link('%link', '<div class="arrow-previous"><span></span></div><div class="title"><span>Previous Project</span>%title</div>'); ?>
	<?php next_post_link('%link', '<div class="title"><span>Next Project</span>%title</div><div class="arrow-next"><span></span></div>'); ?>
</div>
<?php get_footer(); ?>