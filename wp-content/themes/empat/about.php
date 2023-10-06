<?php
/*
 * Template Name: About
 * Template Post Type: page
 * @package Empat
 * Version: 1.0.0 -> In version 1.1.0: Use ACF as a source of content
 */

/* */
get_header();
get_template_part( '/template-parts/hero' );

/* The start date of the developer's career, with deduction of entrepreneurial activity */
$years = date( "Y" ) - 2012 - 3;

/* A loop that gets the last project from the custom post type "project" and displays it on the page. */
$last_project = "";
query_posts( [
	'post_type'      => 'project',
	'post_status'    => 'publish',
	'posts_per_page' => 1
] );
while ( have_posts() ) : the_post();
	$post_id      = get_the_ID();
	$last_project = get_page_link( $post_id );
endwhile;
?>


	<div class="about-page">
		<div class="container">

			<section id='about' class="row">
				<div class="col-md-6 col-lg-4">
					<div class="about">
						<img src="<?= get_template_directory_uri() . '/assets/img/Alex.gif' ?>" alt="Orlovskyi Oleksandr">
						<h4>I am <span>Oleksandr Orlovskyi</span>,</h4>
						<h5>Full-stack WordPress Engineer and Web Developer with more than <?= $years; ?> years of experience.</h5>
						<div class="about-footer">
							<a href="<?= get_template_directory_uri() . '/assets/lib/CV.pdf' ?>" download class="btn">Download CV</a>
							<a href="<?= $last_project ?>" class="btn-dark">Last public projects</a>
						</div>
					</div>
				</div>
				<div class="experience col-md-6 col-lg-4">
					<h3>WORKING EXPERIENCE</h3>
					<div class="block">
						<h4>Web Development <span><?= $years ?> years</span></h4>
						<p>WordPress Engineer with over 8 years of experience in WordPress development and customization. Specializing in building dynamic and optimized websites, I have a proven
							track record of delivering high quality solutions that improve user experience and drive business growth. I strive to learn new
							technologies, languages, approaches.</p>
						<br>
						<p>Now I am actively studying React JS and Laravel. </p>
						<div class="block-footer"></div>
					</div>
					<div class="block">
						<h4>Team management <span>3 years</span></h4>
						<p>Before returning to IT, I worked in merchandise sales with a team of over 30 people in the development of Landing Pages with a staff of developers, designers, advertisers,
							and
							operators.</p>
						<div class="block-footer"></div>
					</div>
					<div class="block">
						<h4>UI/UX Designer <span>2 years</span></h4>
						<p>Development of interfaces for custom plug-ins and corporate sites.</p>
						<div class="block-footer"></div>
					</div>
				</div>
				<div id='skills' class="col-md-12 col-lg-4">
					<h3>SKILLS</h3>
					<div class="row">
						<div class="col-sm-12 col-md-6 col-lg-12">
							<div class="block">
								<h4>Tech skills</h4>
								<div class="skills">
									<span class="tag label label-info"><?= __( 'PHP', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'Git', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'JavaScript', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'jQuery', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'HTML', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'CSS3', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'Bitbucket', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'Bootstrap', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'MySQL', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'REST API', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'JSON', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'AJAX', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'SQL', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'WordPress', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'HTML5', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'MVC', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'Jira', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'GetUikit', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'ES6+', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'front-end', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'back-end', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'BEM', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'npm', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'Webpack', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'Gulp', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'Composer', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'OOP', 'empat' ) ?></span>
									<span class="tag label label-info"><?= __( 'WPML', 'empat' ) ?></span>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-6 col-lg-12">
							<div class="block">
								<h4>Work experience</h4>
								<ul>
									<li><?= __( 'Creating custom WordPress plugins and themes (based in ACF / Gutenberg / Elementor / WPBakery custom blocks);', 'empat' ) ?></li>
									<li><?= __( 'Proven success in delivering commercial and e-commerce projects;', 'empat' ) ?></li>
									<li><?= __( 'I have worked with other CMS: Joomla / OpenCart / Shopify;', 'empat' ) ?></li>
									<li><?= __( 'Expertise in CRM connection APIs (including REST APIs);', 'empat' ) ?></li>
									<li><?= __( 'I follow the best industry practices: PSR, MVC, OOP, KISS and DRY;', 'empat' ) ?></li>
									<li><?= __( 'Team lead experience;', 'empat' ) ?></li>
									<li><?= __( 'PHP 8, MySQL, REST API, Twig;', 'empat' ) ?></li>
									<li><?= __( 'HTML5, CSS3, JS(ES6+), LESS/SCSS/SASS;', 'empat' ) ?></li>
									<li><?= __( 'Worked with ReactJS;', 'empat' ) ?></li>
									<li><?= __( 'Experience using version control (GIT);', 'empat' ) ?></li>
									<li><?= __( 'Graphic design ( PhotoShop, Figma ), audio and video editing experience.', 'empat' ) ?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>


<?php get_footer();
