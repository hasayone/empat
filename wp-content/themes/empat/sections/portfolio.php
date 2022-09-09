<?php

use empat\helper\svg_icons;
?>

<section class="block-portfolio">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="left-block">
					<h2 class="h1">MY PORTFOLIO</h2>
					<span>
						A small gallery of recent projects chosen by me. I've done them all together with amazing people from companies around the globe. It's only a drop in the ocean compared to the entire list. Interested to see some <a href="/projects">more</a> ?
					</span>
				</div>
			</div>
			<div class="col-md-3">
				<a href="/projects" class="btn">ALL PROJECTS</a>
			</div>
		</div>
	</div>
	<div class="portfolio-block">
		<?php
		$posts = get_posts(array(
			'numberposts' => 6,
			'orderby'     => 'date',
			'order'       => 'DESC',
			'post_type'   => 'project',
		));

		foreach ($posts as $post) {
			setup_postdata($post);
			/* It's getting the custom fields from the post. */
			$url 								= get_field('url');
			$short_description 	= get_field('short_description');
			$description 				= get_field('description');
			$company 						= get_field('company');
			/* It's getting the featured image from the post. */
			$featuredImage 			= get_field('featured_image');
			$featuredImageWEBP 	= get_field('featured_image_webp');
			$fullSiteImage 			= get_field('full_site_image');
			/* It's getting the tags from the post and putting them into an array. */
			$techStack = explode(", ", strip_tags(get_the_term_list($post->ID, 'project_tag', '', ', ')));

			/* It's checking if the post has a thumbnail and if it does it's getting the image source. */
			if (has_post_thumbnail($post->ID)) $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
		?>

			<article class="item col-xl-4 col-lg-4 col-md-6 col-sm-12">

				<div class="item_image">
					<?php if ($featuredImage) : ?>
						<?php if ($featuredImage && !$featuredImageWEBP) : ?>
							<img src="<?php echo $featuredImage['url'] ?>" alt="<?php the_title() ?>" />
						<?php elseif ($featuredImage && $featuredImageWEBP) : ?>
							<picture>
								<source srcset="<?php echo $featuredImageWEBP['url'] ?>" type="image/webp">
								<source srcset="<?php echo $featuredImage['url'] ?>" type="image/jpg">
								<img src="<?php echo $featuredImageWEBP['url'] ?>" alt="<?php the_title() ?>">
							</picture>
						<?php endif; ?>
					<?php else : ?>
						<picture>
							<source srcset="<?php echo get_template_directory_uri() . '/assets/img/EmpatProject.webp' ?>" type="image/webp">
							<source srcset="<?php echo get_template_directory_uri() . '/assets/img/EmpatProject.jpg' ?>" type="image/jpg">
							<img src="<?php echo get_template_directory_uri() . '/assets/img/EmpatProject.webp' ?>" alt="<?php the_title() ?>">
						</picture>
					<?php endif; ?>
				</div>
				<div class="content">
					<div class="title">
						<h3><?php the_title() ?></h3>
					</div>
					<a href="<?php echo get_page_link($post->ID); ?>" class="corner right-top-corner">
						<?php echo svg_icons::get('open'); ?>
					</a>
					<?php
					/*
						<a href="" class="corner left-bottom-corner">
							<?php echo svg_icons::get('search'); ?>
						</a>
					*/ ?>
					<div class="description">
						<h5><?php echo strip_tags(get_the_term_list($post->ID, 'project_cat', '', ', ')); ?></h5>


						<?php if ($short_description) : ?>
							<p>
								<?php echo $short_description; ?>
							</p>
						<?php endif; ?>
						<div class="tech-stack">
							<?php foreach ($techStack as $tag) :
								echo svg_icons::get(mb_strtolower($tag), mb_strtolower($tag));
							endforeach; ?>
						</div>
					</div>
				</div>
			</article>


		<?php
		}

		wp_reset_postdata();
		?>


	</div>
</section>