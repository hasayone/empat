<?php
get_header();
get_template_part('/template-parts/hero');
?>

<div id="content-blocks" class="no-page">
	<div class="d-flex align-items-center  justify-content-center flex-column">
		<h1>
			<?php echo _e('404', 'empat'); ?>
		</h1>
		<h4>
			<?php echo _e('Page not found', 'empat'); ?>
		</h4>
		<a href="<?php echo site_url('/'); ?>" class="btn">
			< <?php echo _e('Visit the homepage', 'empat'); ?> </a>
	</div>

</div>

<?php get_footer(); ?>