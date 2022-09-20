<?php

namespace empat\model;

/**
 * Post model
 */
class post extends database
{

	/**
	 * Get posts
	 */
	function get($args = [], $nocache = false)
	{

		$default_args = [
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => get_option('posts_per_page')
		];

		$query_args = array_merge($default_args, $args);

		$query = new \WP_Query($query_args);

		return $query;
	}

	/**
	 * Register custom post types
	 */
	function register_post_types()
	{

		register_post_type(
			'project',
			[
				'label'             	=> __('Projects', 'empat'),
				'description'       	=> '',
				'show_in_rest' 				=> false,
				'public'            	=> true,
				'show_ui'           	=> true,
				'show_in_menu'      	=> true,
				'show_in_nav_menus' 	=> false,
				'menu_icon'						=> 'dashicons-editor-table',
				'capability_type'   	=> 'post',
				'hierarchical'      	=> false,
				'supports'          	=> ['title', 'custom-fields', 'thumbnail', 'revisions'],
				'rewrite'           	=> ['slug' => 'projects', 'with_front' => false],
				'has_archive'       	=> false,
				'query_var'         	=> true,
				'exclude_from_search'	=> false,
				'menu_position'     => 22,
				'capabilities'      => [
					'publish_posts'       => 'edit_posts',
					'edit_posts'					=> 'edit_posts',
					'edit_others_posts'   => 'edit_pages',
					'delete_posts'        => 'edit_pages',
					'delete_others_posts' => 'edit_pages',
					'read_private_posts'  => 'edit_pages',
					'edit_post'           => 'edit_posts',
					'delete_post'         => 'edit_posts',
					'read_post'           => 'edit_posts',
				],
				'labels'            => [
					'name'               => __('Projects', 'empat'),
					'singular_name'      => __('Project', 'empat'),
					'menu_name'          => __('Projects', 'empat'),
					'add_new'            => __('Add Project', 'empat'),
					'add_new_item'       => __('Add New Project', 'empat'),
					'all_items'          => __('All Projects', 'empat'),
					'edit_item'          => __('Edit Project', 'empat'),
					'new_item'           => __('New Project', 'empat'),
					'view_item'          => __('View Project', 'empat'),
					'search_items'       => __('Search Projects', 'empat'),
					'not_found'          => __('No Projects found', 'empat'),
					'not_found_in_trash' => __('No Projects found in trasn', 'empat'),
					'parent_item_colon'  => __('Parent Project', 'empat'),
				]
			]
		);
	}

	/**
	 * Register taxonomies
	 */
	function register_taxonomies()
	{

		register_taxonomy(
			'project_tag',
			'project',
			[
				'hierarchical'      => false,
				'show_ui'           => true,
				'query_var'         => true,
				'show_in_nav_menus' => true,
				'rewrite'           => false,
				'show_admin_column' => true,
				'tax_position' 			=> true,
				'labels'            => [
					'name'          => _x('Tech stack', 'taxonomy general name', 'empat'),
					'singular_name' => _x('Tag', 'taxonomy singular name', 'empat'),
					'search_items'  => __('Search in tags', 'empat'),
					'all_items'     => __('All tags', 'empat'),
					'edit_item'     => __('Edit tag', 'empat'),
					'update_item'   => __('Update tag', 'empat'),
					'add_new_item'  => __('Add new tag', 'empat'),
					'new_item_name' => __('New tag', 'empat'),
					'menu_name'     => __('Tech stack', 'empat')
				]
			]
		);

		register_taxonomy(
			'project_customer',
			'project',
			[
				'hierarchical'      => false,
				'show_ui'           => true,
				'query_var'         => true,
				'show_in_nav_menus' => true,
				'rewrite'           => false,
				'show_admin_column' => true,
				'tax_position' 			=> true,
				'labels'            => [
					'name'          => _x('Сustomers', 'taxonomy general name', 'empat'),
					'singular_name' => _x('Сustomer', 'taxonomy singular name', 'empat'),
					'search_items'  => __('Search in customers', 'empat'),
					'all_items'     => __('All customers', 'empat'),
					'edit_item'     => __('Edit customer', 'empat'),
					'update_item'   => __('Update customer', 'empat'),
					'add_new_item'  => __('Add new customer', 'empat'),
					'new_item_name' => __('New customer', 'empat'),
					'menu_name'     => __('Сustomers', 'empat')
				]
			]
		);

		register_taxonomy(
			'project_cat',
			'project',
			[
				'hierarchical'      => true,
				'show_ui'           => true,
				'query_var'         => true,
				'show_in_nav_menus' => true,
				'rewrite'           => ['slug' => 'Project-category', 'with_front' => false],
				'show_admin_column' => true,
				'tax_position' 			=> true,
				'labels'            => [
					'name'          => _x('Categories', 'taxonomy general name', 'empat'),
					'singular_name' => _x('Category', 'taxonomy singular name', 'empat'),
					'search_items'  => __('Search in categories', 'empat'),
					'all_items'     => __('All categories', 'empat'),
					'edit_item'     => __('Edit category', 'empat'),
					'update_item'   => __('Update category', 'empat'),
					'add_new_item'  => __('Add new category', 'empat'),
					'new_item_name' => __('New category', 'empat'),
					'menu_name'     => __('Categories', 'empat')
				]
			]
		);
	}
}
