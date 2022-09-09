<?php

/**
 * Template name: Projects Archive
 */

use empat\helper\svg_icons;
use empat\helper\options;

$archive_page_id = options::get('apples_archive_page', 'option');

get_header();
?>

<div class="hero">
	<div class="container">
		<div class="row">
			<div class="hero-title col-md-6">
				<h1><?php echo 'Portfolio'; ?></h1>
				<h4>Only public projects</h4>
			</div>

		</div>
	</div>
	<div class="hero-wave"></div>
	<div class="hero-wave"></div>
	<div class="hero-wave"></div>
</div>

<?php
/**
 * Terms navigation
 */
/*
$terms = get_terms('project_cat', [
	'hide_empty' => true,
]);

if (!empty($terms)) : ?>

	<div id="sub-nav-spacer"></div>
	<div id="sub-nav">

		<div class="container">
			<div class="row">
				<div class="col-12">

					<?php foreach ($terms as $term) : ?>
						<a href="#!/category-<?php echo $term->slug; ?>" class=""><?php echo $term->name; ?></a>
					<?php endforeach; ?>

				</div>
			</div>
		</div>

	</div>
<?php endif; */ ?>


<div id="content-blocks">
	<?php

	query_posts([
		'post_type' => 'project',
		'post_status' => 'publish',
		'posts_per_page' => -1
	]);

	get_template_part('/template-parts/project/grid');
	?>


</div>

<?php get_footer(); ?>