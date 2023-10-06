<div class="hero">
	<div class="container">
		<div class="row">
			<div class="hero-title col-md-6">
				<?= is_404() ? '<h1>' . __( 'Oops... Page not Found', 'empat' ) . '</h1>' : the_title( '<h1>', '</h1>' ); ?>
			</div>
		</div>
	</div>
	<div class="hero-wave"></div>
	<div class="hero-wave"></div>
	<div class="hero-wave"></div>
</div>
