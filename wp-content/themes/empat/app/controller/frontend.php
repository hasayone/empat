<?php
namespace empat\controller;
use empat\helper\options;
use empat\helper\media;
use empat\helper\post;

/**
 * Frontend Controller
 **/
class frontend {

	private $_cache_time;

	/**
	 * Constructor
	 **/
	function __construct() {

		$this->_cache_time = EMPATDEV()->config['cache_time'];

		// header actions
		add_action( 'wp_head', [ $this, 'do_header_actions'] );

		// write critical css
		add_filter( 'wp_enqueue_scripts', [ $this, 'write_critical_css'], 1 );

		// move jquery to footer
		// add_filter( 'wp_enqueue_scripts', [ $this, 'move_jquery'] );

		// load assets
		add_action( 'wp_enqueue_scripts', [ $this, 'load_scripts'], 15 );
		add_action( 'wp_enqueue_scripts', [ $this, 'load_styles'], 15 );

		// deregister unused styles
		add_action( 'wp_print_styles', [ $this, 'deregister_styles'], 99 );
		add_action( 'wp_footer', [ $this, 'deregister_styles'] );

		// Change excerpt dots
		add_filter( 'excerpt_more', [ $this, 'change_excerpt_more' ]);

		// Change excerpt length
		add_filter( 'excerpt_length', function() {
			return 30;
		});

		// Disable WP 5.5 lazy loading
		// add_filter( 'wp_lazy_loading_enabled', '__return_false' );

	}

	/**
	 * Header actions
	 */
	function do_header_actions() {

		// add site icon
		if ( function_exists( 'has_site_icon' ) && has_site_icon() ) {
			wp_site_icon();
		}

	}

	/**
	 * Critical css
	 */
	function write_critical_css( $title_tag_content ) {

		$critical_stylesheet = get_template_directory() . '/assets/css/critical-css.css';

		if( file_exists( $critical_stylesheet ) ) {

			ob_start();
			readfile( $critical_stylesheet );
			$critical_css = ob_get_clean();
			$critical_css = trim( str_replace( '/*# sourceMappingURL=critical-css.css.map */', '', $critical_css ) );

			echo '<style id="critical-css">' . $critical_css . '</style>';

		}

	}


	/**
	 * Move jquery to footer
	 */
	function move_jquery() {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
	}

	/**
	 * Load scripts
	 */
	function load_scripts() {

		// $api_keys = options::get( 'api_keys');

		// wp_register_script(
		// 	'google-maps',
		// 	sprintf( 'https://maps.googleapis.com/maps/api/js?key=%s', $api_keys['google_maps_api_key']),
		// 	false, $this->_cache_time, true
		// );

		// wp_enqueue_script( 'google-maps');

		wp_register_script(
			'empat-libs',
			get_template_directory_uri() . '/assets/js/libs.min.js',
			false, $this->_cache_time, true
		);
	
		wp_register_script(
			'empat-lity',
			get_template_directory_uri() . '/assets/js/lity.min.js',
			false,
			$this->_cache_time,
			true
		);

		wp_register_script(
			'empat-marquee',
			get_template_directory_uri() . '/assets/js/jquery.marquee.min.js',
			false,
			$this->_cache_time,
			true
		);
		$deps = [
			'jquery',
			'empat-libs',
			'empat-lity',
			'empat-marquee'
		];
		
		wp_register_script(
			'empat-app',
			get_template_directory_uri() . '/assets/js/app.min.js',
			$deps, $this->_cache_time, true
		);

		wp_enqueue_script( 'empat-app' );

		wp_localize_script( 'empat-app', 'themeVars', [
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'ajaxNonce' => wp_create_nonce( 'empat_ajax_nonce'),
			'siteURL' => site_url('/')
		]);

		// add defer to all scripts
		// add_filter( 'script_loader_tag', function( $tag, $handle ) {
		// 	return str_replace( ' src', ' defer src', $tag );
		// }, 10, 2);

	}

	/**
	 * Load styles
	 */
	function load_styles() {

		wp_register_style(
			'empat-app',
			get_template_directory_uri() . '/assets/css/app.min.css',
			false, $this->_cache_time
		);

		wp_enqueue_style( 'empat-app');

	}

	/**
	 * Deregister unused styles
	 */
	function deregister_styles() {

		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'wc-block-style' ); // REMOVE WOOCOMMERCE BLOCK CSS
		wp_dequeue_style( 'global-styles' ); // REMOVE THEME.JSON

	}

	/**
	 * Change excerpt More text
	 */
	function change_excerpt_more( $more ) {
		return '…';
	}

}
