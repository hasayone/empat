<?php
/*
 * Template Name: Home Page
 * Template Post Type: page
 * @package Empat
 */
get_header(); ?>

	<div class="front-page">

		<?php
		// Hero Module
		get_template_part( 'sections/hero' ); ?>

		<?php
		// Skills Module
		get_template_part( 'sections/skills' ); ?>

		<?php
		// Skills Module
		get_template_part( 'sections/portfolio' ); ?>

	</div>

<?php get_footer();
