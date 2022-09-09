<?php
/*
 * Template Name: About
 * Template Post Type: page
 * @package Empat
 */
get_header();
get_template_part('/template-parts/hero');

/* The start date of the developer's career, with deduction of entrepreneurial activity */
$years = date("Y") - 2012 - 3;

/* A loop that gets the last project from the custom post type "project" and displays it on the page. */
$last_project = "";
query_posts([
	'post_type' => 'project',
	'post_status' => 'publish',
	'posts_per_page' => 1
]);
while (have_posts()) : the_post();
	$post_id 						= $data['post_id'];
	$last_project = get_page_link($post_id);
endwhile;
?>


<div class="about-page">

	<div class="container">

		<div id='about' class="row">
			<div class="col-md-6 col-lg-4">
				<div class="about">
					<img src="<?php echo get_template_directory_uri() . '/assets/img/Alex.gif' ?>" alt="Orlovskyi Oleksandr">

					<h4>I am <span>Oleksandr Orlovskyi</span>,</h4>
					<h5>Full-stack WordPress Engineer and Web Developer with more than <?php echo $years; ?> years of experience.</h5>
					<div class="about-footer">
						<a href="<?php echo get_template_directory_uri() . '/assets/lib/CV.pdf' ?>" download class="btn">Download CV</a>
						<a href="<?php echo $last_project ?>" class="btn-dark">Last public projects</a>
					</div>
					</p>
				</div>
			</div>
			<div class="experience col-md-6 col-lg-4">

				<h3>WORKING EXPERIENCE</h3>
				<div class="block">
					<h4>Web Development <span><?php echo $years ?> years</span></h4>
					<p>
						I develop sites on Wordpress of varying complexity, from a small theme on ThemeForest to a large commercial project for the state of Washington.
						I strive to learn new technologies, languages, approaches. Now I am actively studying React JS and WP Core.
					</p>
					<div class="block-footer"></div>
				</div>

				<div class="block">
					<h4>Team management <span>3 years</span></h4>
					<p>
						Before returning to IT, I worked in merchandise sales with a team of over 30 people in the development of Landing Pages with a staff of developers, designers, advertisers, and operators.
					</p>
					<div class="block-footer"></div>
				</div>
				<div class="block">
					<h4>UI/UX Designer <span>2 years</span></h4>
					<p>
						Development of interfaces for custom plug-ins and corporate sites.
					</p>
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
								<span class="tag label label-info">PHP</span>
								<span class="tag label label-info">Git</span>
								<span class="tag label label-info">JavaScript</span>
								<span class="tag label label-info">jQuery</span>
								<span class="tag label label-info">HTML</span>
								<span class="tag label label-info">CSS3</span>
								<span class="tag label label-info">Bitbucket</span>
								<span class="tag label label-info">Bootstrap</span>
								<span class="tag label label-info">MySQL</span>
								<span class="tag label label-info">REST API</span>
								<span class="tag label label-info">JSON</span>
								<span class="tag label label-info">AJAX</span>
								<span class="tag label label-info">SQL</span>
								<span class="tag label label-info">Wordpress</span>
								<span class="tag label label-info">HTML5</span>
								<span class="tag label label-info">MVC</span>
								<span class="tag label label-info">Jira</span>
								<span class="tag label label-info">GetUikit</span>
								<span class="tag label label-info">ES6+</span>
								<span class="tag label label-info">front-end</span>
								<span class="tag label label-info">back-end</span>
								<span class="tag label label-info">BEM</span>
								<span class="tag label label-info">npm</span>
								<span class="tag label label-info">Webpack</span>
								<span class="tag label label-info">Gulp</span>
								<span class="tag label label-info">Composer</span>
								<span class="tag label label-info">OOP</span>
								<span class="tag label label-info">WPML</span>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-12">
						<div class="block">
							<h4>Work experience</h4>
							<ul>
								<li>
									Complex corporate websites based on ACF Pro & Elementor
								</li>
								<li>
									CMS WordPress: Plugins, Creating themes from scratch, Custom works
								</li>
								<li>
									Another CMS: Joomla, OpenCart
								</li>
								<li>
									HTML, CSS, JS (ES6+), LESS, SCSS / SASS
								</li>
								<li>
									PHP, MySQL, RESTful API, Twig
								</li>
								<li>Worked with ReactJS
								</li>
								<li>Team lead experience
								</li>
								<li>Experience using version control (GIT)
								</li>
								<li>Graphic design ( PhotoShop, Figma ) , audio and video editing experience
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>



		</div>
		<?php get_footer();
