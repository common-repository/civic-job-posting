<?php
function cjp_taxonomies() {

	// Registers the Job Posting post type
	register_post_type(
		'civic-job-posting',
		array(
			'labels'             => array(
				'name'               => __( 'Job Posting', 'civic-job-posting' ),
				'singular_name'      => __( 'Job Posting', 'civic-job-posting' ),
				'add_new'            => __( 'Add New Job Posting', 'civic-job-posting' ),
				'add_new_item'       => __( 'Add New Job Posting', 'civic-job-posting' ),
				'edit_item'          => __( 'Edit Job Posting', 'civic-job-posting' ),
				'new_item'           => __( 'Add New Job Posting', 'civic-job-posting' ),
				'view_item'          => __( 'View Job Posting', 'civic-job-posting' ),
				'search_items'       => __( 'Search Job Posting', 'civic-job-posting' ),
				'not_found'          => __( 'No Job Posting found', 'civic-job-posting' ),
				'not_found_in_trash' => __( 'No Job Postings found in trash', 'civic-job-posting' ),
			),
			'public'             => true,
			'show_in_rest'       => true,
			'supports'           => array( 'title', 'excerpt', 'thumbnail' ),
			'capability_type'    => 'post',
			'publicly_queryable' => true,
			'show_ui'            => true,
			'query_var'          => true,
			'rewrite'            => array(
				'slug'       => 'cjp-jobs',
				'with_front' => true,
			), // Permalinks format
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-admin-site',
			'has_archive'        => true,
		)
	);

	$taxonomies = array(
		array(
			'slug'         => 'cjp_category',
			'single_name'  => 'Category',
			'plural_name'  => 'Category',
			'post_type'    => 'civic-job-posting',
			'hierarchical' => true,
			'rewrite'      => array( 'slug' => 'cjp-category' ),
		),

	);
	foreach ( $taxonomies as $taxonomy ) {
		$labels = array(
			'name'              => $taxonomy['plural_name'],
			'singular_name'     => $taxonomy['single_name'],
			'search_items'      => 'Search ' . $taxonomy['plural_name'],
			'all_items'         => 'All ' . $taxonomy['plural_name'],
			'parent_item'       => 'Parent ' . $taxonomy['single_name'],
			'parent_item_colon' => 'Parent ' . $taxonomy['single_name'] . ':',
			'edit_item'         => 'Edit ' . $taxonomy['single_name'],
			'update_item'       => 'Update ' . $taxonomy['single_name'],
			'add_new_item'      => 'Add New ' . $taxonomy['single_name'],
			'new_item_name'     => 'New ' . $taxonomy['single_name'] . ' Name',
			'menu_name'         => $taxonomy['plural_name'],
		);

		$rewrite      = isset( $taxonomy['rewrite'] ) ? $taxonomy['rewrite'] : array( 'slug' => $taxonomy['slug'] );
		$hierarchical = isset( $taxonomy['hierarchical'] ) ? $taxonomy['hierarchical'] : true;

		register_taxonomy(
			$taxonomy['slug'],
			$taxonomy['post_type'],
			array(
				'hierarchical' => $hierarchical,
				'labels'       => $labels,
				'show_ui'      => true,
				'query_var'    => true,
				'rewrite'      => $rewrite,
			)
		);
	}

}
add_action( 'init', 'cjp_taxonomies', 0 );
