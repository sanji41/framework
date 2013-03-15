<?php
/* Custom Post Type Example
*/


/*-----------------------------------------------------------------------------------*/
/*	Custom Post Types & Taxonomies
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'create_post_types' );
function create_post_types() {
	//slider post type
	register_post_type( 'slides',
		array(
		  'labels' => array(
			'name' => __( 'HP Slides', '' ),
			'singular_name' => __( 'Slide', '' ),		
			'add_new' => _x( 'Add New', 'Slide', '' ),
			'add_new_item' => __( 'Add New Slide', '' ),
			'edit_item' => __( 'Edit Slide', '' ),
			'new_item' => __( 'New Slide', '' ),
			'view_item' => __( 'View Slide', '' ),
			'search_items' => __( 'Search Slides', '' ),
			'not_found' =>  __( 'No Slides found', '' ),
			'not_found_in_trash' => __( 'No Slides found in Trash', '' ),
			'parent_item_colon' => ''
			
		  ),
		  'public' => true,
		  'supports' => array('title','thumbnail'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'slides' ),
		)
	  );
	  
	//blog post type
	register_post_type( 'folio',
		array(
		  'labels' => array(
			'name' => __( 'Portfolio', '' ),
			'singular_name' => __( 'Portfolio', '' ),		
			'add_new' => _x( 'Add New', 'Portfolio Project', '' ),
			'add_new_item' => __( 'Add New Portfolio Project', '' ),
			'edit_item' => __( 'Edit Portfolio Project', '' ),
			'new_item' => __( 'New Portfolio Project', '' ),
			'view_item' => __( 'View Portfolio Project', '' ),
			'search_items' => __( 'Search Portfolio Projects', '' ),
			'not_found' =>  __( 'No Portfolio Projects found', '' ),
			'not_found_in_trash' => __( 'No Portfolio Projects found in Trash', '' ),
			'parent_item_colon' => ''
			
		  ),
		  'public' => true,
		  'supports' => array('title','editor','thumbnail','comments'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'folio' ),
		)
		
	  );
}


// Add taxonomies
add_action( 'init', 'create_taxonomies' );

//create taxonomies
function create_taxonomies() {
	
// blog taxonomies
	$cat_labels = array(
		'name' => __( 'clients', '' ),
		'singular_name' => __( 'Clients Category', '' ),
		'search_items' =>  __( 'Search Clients Categories', '' ),
		'all_items' => __( 'All Clients Categories', '' ),
		'parent_item' => __( 'Parent Clients Category', '' ),
		'parent_item_colon' => __( 'Parent Clients Category:', '' ),
		'edit_item' => __( 'Edit Clients Category', '' ),
		'update_item' => __( 'Update Clients Category', '' ),
		'add_new_item' => __( 'Add New Clients Category', '' ),
		'new_item_name' => __( 'New Clients Category Name', '' ),
		'choose_from_most_used'	=> __( 'Choose from the most used Clients categories', '' )
	); 	

	register_taxonomy('blog_cats','folio',array(
		'hierarchical' => true,
		'labels' => $cat_labels,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'clients' ),
	));
}


/*-----------------------------------------------------------------------------------*/
/*	blog Cat Pagination
/*-----------------------------------------------------------------------------------*/

// Set number of posts per page for taxonomy pages
$option_posts_per_page = get_option( 'posts_per_page' );
add_action( 'init', 'my_modify_posts_per_page', 0);
function my_modify_posts_per_page() {
    add_filter( 'option_posts_per_page', 'my_option_posts_per_page' );
}
function my_option_posts_per_page( $value ) {
	global $option_posts_per_page;
	
    if ( is_tax( 'blog_cats') ) {
        return 12;
    }
	else {
        return $option_posts_per_page;
    }
}

/*-----------------------------------------------------------------------------------*/
/*	Other functions
/*-----------------------------------------------------------------------------------*/

// Limit Post Word Count
add_filter('excerpt_length', 'new_excerpt_length');
function new_excerpt_length($length) {
	return 40;
}

//Replace Excerpt Link
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more($more) {
       global $post;
	return '...';
}

	

?>