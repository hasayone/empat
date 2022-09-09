<?php
namespace empat\controller;
use empat\helper\options;

/**
 * Init Controller
 **/
class init {

	/**
	 * Constructor
	 **/
	function __construct() {

		$this->add_theme_support();
		$this->register_menus();
		// custom post types
		$this->register_cpt();

	}

	/**
	 * Add theme support
	 */
	function add_theme_support() {

		add_action( 'after_setup_theme', function() {
			add_theme_support( 'title-tag' );
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'html5', [ 'search-form', 'gallery', 'caption', 'script', 'style' ] );
		});

	}

	/**
	 * Register nav menus
	 */
	function register_menus() {

		// register menus
		add_action( 'init', function() {
			register_nav_menus( [
				'header_menu' => __( 'Header menu', 'empat' ),
			] );
		});

	}

	/**
	 * Register custom post types
	 */
	function register_cpt() {

		 EMPATDEV()->model->post->register_post_types();
		 EMPATDEV()->model->post->register_taxonomies();

	}

}

?>
