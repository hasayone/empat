<section class="block-portfolio">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="left-block">
					<h2 class="h1">MY PORTFOLIO</h2>
					<span>
						A small gallery of recent projects chosen by me. I've done them all together with amazing people from companies around the globe. It's only a drop in the ocean compared to the entire list. Interested to see some <a
							href="/projects">more</a> ?
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
		// Get projects
		$posts = get_posts( array(
			'numberposts' => 6,
			'orderby'     => 'date',
			'order'       => 'DESC',
			'post_type'   => 'project',
		) );

		// If there are projects
		foreach ( $posts as $post ) {
			setup_postdata( $post );
			EMPATDEV()->view->load( '/template-parts/project/project-item', [ 'post_id' => $post->ID ], false, false );
		}

		// Reset post data
		wp_reset_postdata(); ?>
	</div>
</section>
