<?php
get_header();
the_post();

get_template_part( '/template-parts/hero' );
?>

	<div id="content-blocks">
		<div class="container">
			<div class="row">

				<?php the_content(); ?>

			</div>
		</div>

	</div>

<?php get_footer(); ?>
