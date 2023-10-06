<?php
namespace empat\controller;

use empat\helper\utils;

/**
 * ACF Controller
 **/
class acf {

	/**
	 * Constructor
	 **/
	function __construct() {
		// register options page and load PHP configs with options
		$this->register_options();

		// save options to json
		add_filter( 'acf/settings/save_json', [ $this, 'set_acf_json_save_point' ] );
		add_filter( 'acf/settings/load_json', [ $this, 'set_acf_json_load_point' ] );
	}

	/**
	 * Register theme options
	 */
	function register_options() {
		// ACF Options Page
		if ( function_exists( 'acf_add_options_page' ) ) {
			acf_add_options_page();
		}

		// register custom widgets
		utils::autoload_dir( get_template_directory() . '/app/options/', 1 );
	}

	// Save json folder
	function set_acf_json_save_point() {
		// update path
		$path = get_stylesheet_directory() . '/app/options/json';

		// return
		return $path;
	}

	// Load json
	function set_acf_json_load_point() {
		// remove original path (optional)
		// unset($paths[0]);

		// append path
		$paths[] = get_stylesheet_directory() . '/app/options/json';

		// return
		return $paths;
	}

}
