<?php
get_header();
get_template_part( '/template-parts/hero' );
?>

<div id="content-blocks" class="no-page">
	<div class="d-flex align-items-center  justify-content-center flex-column">
		<h1><?= __( '404', 'empat' ); ?></h1>
		<h4><?= __( 'Page not found', 'empat' ); ?></h4>
		<a href="<?= site_url( '/' ); ?>" class="btn"><?= __( '< Visit the homepage', 'empat' ); ?></a>
	</div>
</div>

<?php get_footer(); ?>
