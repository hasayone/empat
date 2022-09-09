<div class="hero">
	<div class="container">
		<div class="row">
			<div class="hero-title col-md-6">

				<?php
				if (is_404()) {
					echo '<h1>Oops... Page not Found</h1>';
				} else {
					echo the_title('<h1>', '</h1>');
				} ?>

			</div>

		</div>
	</div>
	<div class="hero-wave"></div>
	<div class="hero-wave"></div>
	<div class="hero-wave"></div>
</div>