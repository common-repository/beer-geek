<?php

class BG_Admin {

	function __construct() {
		add_action('init', array($this, 'bg_post_types'));
		add_action('init', array($this, 'bg_taxonomies'));
	}

	function bg_post_types() {
		$slug = apply_filters('bg_slug', __('beers', 'bg'));
		register_post_type('bg_beer',
			array(
				'labels' => array(
					'name' => __('Beers', 'bg'),
					'singular_name' => __('Beer', 'bg'),
					'add_new' => _x('Add New Beer', 'bg'),
					'add_new_item' => __('Add New Beer', 'bg'),
					'edit_item', __('Edit Beer', 'bg'),
					'new_item', __('New Beer', 'bg'),
					'view_item' => __('View Beer', 'bg'),
					'view_items' => __('View Beers', 'bg'),
					'search_items' => __('Search Beers', 'bg'),
					'not_found' => __('No beers found', 'bg'),
					'not_found_in_trash' => __('No beers found in trash', 'bg'),
					'parent_item_colon' => __('Parent Beer', 'bg'),
					'all_items' => __('All Beers', 'bg'),
					'archives' => __('Beer Archives', 'bg'),
					'insert_into_item' => __('Insert into beer', 'bg'),
				),
				'public' => true,
				'show_in_nav_menus' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'show_in_admin_bar' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'hierarchical' => apply_filters('bg_hierarchical', true),
				'menu_position' => 5,
				'capability_type' => 'post',
				'query_var' => true,
				'rewrite' => apply_filters('bg_rewrite', array('slug' => $slug, 'with_front' => true)),
				'has_archive' => apply_filters('bg_has_archive', $slug),
				'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'revisions', 'excerpt'),
				'taxonomies' => array('bg_style'),
				'register_meta_box_cb' => array($this, 'bg_metabox_cb'),
				'show_in_rest' => true,
			)
		);
	}

	function bg_metabox_cb() {

	}

	function bg_taxonomies() {
		$slug = apply_filters('bg_style_slug', __('style', 'bg'));
		$labels = array(
			'name' => __('Styles', 'bg'),
			'singular_name' => __('Style', 'bg'),
			'add_new' => _x('Add New Style', 'bg'),
			'add_new_item' => __('Add New Style', 'bg'),
			'edit_item', __('Edit Style', 'bg'),
			'new_item', __('New Style', 'bg'),
			'view_item' => __('View Style', 'bg'),
			'view_items' => __('View Styles', 'bg'),
			'search_items' => __('Search Styles', 'bg'),
			'not_found' => __('No styles found', 'bg'),
			'not_found_in_trash' => __('No styles found in trash', 'bg'),
			'parent_item_colon' => __('Parent Style', 'bg'),
		);
		$args = array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_rest' => true,
			'update_count_callback' => array($this, 'bg_style_update_count_cb'),
			'query_var' => true,
			'rewrite' => apply_filters('bg_style_rewrite', array('slug' => $slug))
		);
		$args = apply_filters('bg_style_args', $args);
		register_taxonomy('bg_style', 'bg_beer', $args);
	}

	function bg_style_update_count_cb() {

	}
}

?>