<div class="portfolio-block">
	<?php while (have_posts()) : the_post(); ?>
		<?php EMPATDEV()->view->load('/template-parts/project/project-item', ['post_id' => get_the_ID()], false, false); ?>
	<?php endwhile; ?>
</div>