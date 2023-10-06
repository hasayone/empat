<?php use empat\helper\svg_icons;

$post_id           = $data['post_id'];
$url               = get_field( 'url', $post_id );
$short_description = get_field( 'short_description', $post_id );
$description       = get_field( 'description', $post_id );
$company           = get_field( 'company', $post_id );
/* It's getting the featured image from the post. */
$featuredImage     = get_field( 'featured_image', $post_id );
$featuredImageWEBP = get_field( 'featured_image_webp', $post_id );
$fullSiteImage     = get_field( 'full_site_image', $post_id );
/* It's getting the tags from the post and putting them into an array. */
$techStack = explode( ", ", strip_tags( get_the_term_list( $post_id, 'project_tag', '', ', ' ) ) );

/* It's checking if the post has a thumbnail and if it does it's getting the image source. */
if ( has_post_thumbnail( $post_id ) ) {
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'large', $post_id );
}
?>

<article class="item col-xl-4 col-lg-4 col-md-6 col-sm-12">
	<div class="item_image">
		<?php if ( $featuredImage ) : ?>
			<?php if ( $featuredImage && ! $featuredImageWEBP ) : ?>
				<img src="<?= $featuredImage['url'] ?>" alt="<?php the_title() ?>"/>
			<?php elseif ( $featuredImage && $featuredImageWEBP ) : ?>
				<picture>
					<source srcset="<?= $featuredImageWEBP['url'] ?>" type="image/webp">
					<source srcset="<?= $featuredImage['url'] ?>" type="image/jpg">
					<img src="<?= $featuredImageWEBP['url'] ?>" alt="<?php the_title() ?>">
				</picture>
			<?php endif; ?>
		<?php else : ?>
			<picture>
				<source srcset="<?= get_template_directory_uri() . '/assets/img/EmpatProject.webp' ?>" type="image/webp">
				<source srcset="<?= get_template_directory_uri() . '/assets/img/EmpatProject.jpg' ?>" type="image/jpg">
				<img src="<?= get_template_directory_uri() . '/assets/img/EmpatProject.webp' ?>" alt="<?php the_title() ?>">
			</picture>
		<?php endif; ?>
	</div>
	<a href="<?= get_permalink( $post_id ) ?>" class="content">
		<div class="title">
			<h4><?php the_title() ?></h4>
		</div>
		<div class="description">
			<h5><?= strip_tags( get_the_term_list( $post_id, 'project_cat', '', ', ' ) ); ?></h5>
			<?php if ( $short_description ) : ?>
				<p>
					<?= $short_description; ?>
				</p>
			<?php endif; ?>
			<div class="tech-stack">
				<?php foreach ( $techStack as $tag ) :
					echo svg_icons::get( mb_strtolower( $tag ), mb_strtolower( $tag ) );
				endforeach; ?>
			</div>
		</div>
	</a>
</article>
