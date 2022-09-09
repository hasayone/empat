<?php
namespace empat\controller;

/**
 * Backend Controller
 **/
class backend {

	/**
	 * Constructor
	 **/
	function __construct() {

		// load admin assets
		add_action( 'admin_enqueue_scripts', [ $this, 'load_assets' ] );

		// add custom columns to admin
		add_filter( 'manage_post_posts_columns', [ $this, 'add_admin_list_columns' ], 10);
		add_action( 'manage_post_posts_custom_column', [ $this, 'print_admin_list_columns' ], 10, 2);

		// add editor style
		$this->add_editor_styles();

		// remove YOAST colums
		add_filter( 'manage_edit-post_columns', [ $this, 'yoast_remove_columns' ], 10, 1 );
		add_filter( 'manage_edit-page_columns', [ $this, 'yoast_remove_columns' ], 10, 1 );

		// disable blog
		add_action( 'init', [ $this, 'deregister_blog' ], 100);
	}

	/**
	 * Load admin assets
	 **/
	function load_assets() {

		$current_screen = get_current_screen();
		wp_enqueue_style( 'empat-admin', get_template_directory_uri() . '/assets/css/admin.css', false, EMPATDEV()->config['cache_time'] );

		wp_enqueue_script( 'empat-admin',
			get_template_directory_uri() . '/assets/js/admin/admin.min.js',
			[ 'jquery' ], EMPATDEV()->config['cache_time'], true
		);

	}

	/**
	 * Add custom editor styles
	 */
	function add_editor_styles() {

		add_action( 'init', function() {
			add_editor_style( 'assets/css/admin-editor-style.css' );
		});

		add_filter( 'tiny_mce_before_init', function( $mce_init ) {
			$mce_init['cache_suffix'] = 'v=' . EMPATDEV()->config['cache_time'];
			return $mce_init;   
		} );

		// add custom formats to the TinyMCE
		/*
		add_filter( 'mce_buttons', function( $buttons ) {
			array_unshift( $buttons, 'styleselect' );
			return $buttons;
		});

		add_filter( 'tiny_mce_before_init', function( $settings ) {

			$style_formats = [
				[
					'title' => __( 'Smallest text', 'empat'),
					'selector' => 'p',
					'classes' => 'text-smallest',
				],
			];

			$settings['style_formats'] = json_encode( $style_formats );

			return $settings;

		});
		*/

	}

	/**
	 * Add custom columns to the list
	 */
	function add_admin_list_columns( $columns ) {

		// Thumb
		$id_col = [ 'thumb' => __( 'Preview', 'empat') ];
		$columns = array_slice( $columns, 0, 1, true ) + $id_col + array_slice( $columns, 1, NULL, true );

		// Post type
		// $id_col = [ 'post_type' => __( 'Post type', 'empat') ];
		// $columns = array_slice( $columns, 0, 6, true ) + $id_col + array_slice( $columns, 6, NULL, true );

		// Featured post
		// $id_col = [ 'is_featured' => __( 'Featured', 'empat') ];
		// $columns = array_slice( $columns, 0, 7, true ) + $id_col + array_slice( $columns, 7, NULL, true );

		return $columns;
	}

	/**
	 * Print custom columns
	 */
	function print_admin_list_columns( $column_name, $post_ID ) {

		$view_data = [ 'post_id' => $post_ID ];

		switch( $column_name ) {

			case 'thumb':

				if( has_post_thumbnail( $post_ID ) ) {
					echo get_the_post_thumbnail( $post_ID, 'thumbnail' );
				}

			break;

			/*
			case 'post_type':

				$edit_link = admin_url( 'post.php?post=' . $post_ID . '&action=edit' );
				echo 'post-tpl-review.php' == get_page_template_slug( $post_ID ) ? '<a href="' . $edit_link . '" class="post-badge post-tpl-review"><i class="dashicons dashicons-awards"></i> Review</a>' : '<a href="' . $edit_link . '" class="post-badge post-tpl-post"><i class="dashicons dashicons-edit-large"></i> Post</a>';

			break;

			case 'is_featured':

				if( get_post_meta( $post_ID, 'featured_post', true ) ) {
					echo '<i class="dashicons dashicons-star-filled"></i>';
				}

			break;
			*/

		}

	}

	/**
	 * Add a filter by featured label
	 **/
	function add_posts_filters() {

		$screen = get_current_screen();
		$post_type = $screen->post_type;

		if( $post_type == 'post' ):
			$type = '';
			if( isset( $_GET['featured'] ) ) {
				$type = $_GET['featured'];
			}
			?>
			<select name="featured">
				<option value=""><?php _e( 'All posts', 'empat' ); ?></option>
				<option <?php echo $type == 'featured' ? 'selected="selected"' : ''; ?> value="featured"><?php _e( 'Featured posts only', 'empat' ); ?></option>
			</select>
			<?php
		endif;

	}

	/**
	 * Filter posts query
	 **/
	function filter_posts( $query ) {
		global $pagenow;

		if( $pagenow == 'edit.php' && isset( $_GET['featured'] ) && $_GET['featured'] != '') {
			$query->query_vars['meta_key'] = 'featured_post';
			$query->query_vars['meta_value'] = 1;
		}
	}

	/**
	 * Remove YOAST columns from table
	 */
	function yoast_remove_columns( $columns ) {
		unset( $columns['wpseo-score']);
		unset( $columns['wpseo-score-readability']);
		unset( $columns['wpseo-title']);
		unset( $columns['wpseo-metadesc']);
		unset( $columns['wpseo-focuskw']);
		unset( $columns['wpseo-links']);
		unset( $columns['wpseo-linked']);
		return $columns;
	}

		/**
	 * Disable blog
	 */
	function deregister_blog() {
		global $wp_post_types;

		if ( isset( $wp_post_types['post'] ) ) {
			$arguments_to_remove = [
				'has_archive',
				'public',
				'publicaly_queryable',
				'rewrite',
				'query_var',
				'show_ui',
				'show_in_admin_bar',
				'show_in_nav_menus',
				'show_in_menu',
				'show_in_rest',
			];

			foreach ( $arguments_to_remove as $arg ) {
				if ( isset( $wp_post_types['post']->$arg ) ) {
					$wp_post_types['post']->$arg = false;
				}
			}

			// exclude from search.
			$wp_post_types['post']->exclude_from_search = true;

			// remove supports.
			$wp_post_types['post']->supports = [];

		}

	}
	
}

?>
