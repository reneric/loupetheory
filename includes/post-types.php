<?php 
// Register Custom Post Type
function awards() {

	$labels = array(
		'name'                => _x( 'Awards', 'Post Type General Name', 'loupetheory' ),
		'singular_name'       => _x( 'Award', 'Post Type Singular Name', 'loupetheory' ),
		'menu_name'           => __( 'Awards', 'loupetheory' ),
		'parent_item_colon'   => __( 'Parent Award:', 'loupetheory' ),
		'all_items'           => __( 'All Awards', 'loupetheory' ),
		'view_item'           => __( 'View Award', 'loupetheory' ),
		'add_new_item'        => __( 'Add New Award', 'loupetheory' ),
		'add_new'             => __( 'New Award', 'loupetheory' ),
		'edit_item'           => __( 'Edit Award', 'loupetheory' ),
		'update_item'         => __( 'Update Award', 'loupetheory' ),
		'search_items'        => __( 'Search Awards', 'loupetheory' ),
		'not_found'           => __( 'No awards found', 'loupetheory' ),
		'not_found_in_trash'  => __( 'No award found in Trash', 'loupetheory' ),
	);
	$args = array(
		'label'               => __( 'awards', 'loupetheory' ),
		'description'         => __( 'Loupe Theory Awards', 'loupetheory' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'awards', $args );

}

// Hook into the 'init' action
add_action( 'init', 'awards', 0 );

?>