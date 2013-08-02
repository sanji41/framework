<?php
//add metabox action
//add_action("admin_init", "add_events_metaboxes");
  

//add_action('admin_init','my_meta_init');

add_action( 'add_meta_boxes', 'add_video_metaboxes' );
add_action( 'add_meta_boxes', 'add_services_metaboxes' );

function add_video_metaboxes(){
    //$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;

    // checks for post/page ID
    //if ($post_id == '16')
   // {
        add_meta_box('wpt_video_location', 'Portfolio Info', 'wpt_video_location', 'portfolios', 'normal', 'default');
    }


function wpt_video_location() {
    global $post;
 
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="homemeta_noncename" id="homemeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
 
    // Get the location data if its already been entered
    $link = get_post_meta($post->ID, 'link', true);
    
	 
    // Echo out the field
       
        
         echo '<p>Link</p>';
         echo '<input type="text" name="link" value="' . $link  . '" class="widefat" />';
		
}
// Save the Metabox Data
 
function wpt_save_home_meta($post_id, $post) {
 
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( !wp_verify_nonce( $_POST['homemeta_noncename'], plugin_basename(__FILE__) )) {
    return $post->ID;
    }
 
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;
 
    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
 
    $home_meta['link'] = $_POST['link'];
 
    // Add values of $home_meta as custom fields
 
    foreach ($home_meta as $key => $value) { // Cycle through the $home_meta array!
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }
}
add_action('save_post', 'wpt_save_home_meta', 1, 2); // save the custom fields

//services
function add_services_metaboxes(){
    //$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;

    // checks for post/page ID
    //if ($post_id == '16')
   // {
        add_meta_box('wpt_services_location', 'Highlight Title', 'wpt_services_location', 'services', 'normal', 'default');
    }


function wpt_services_location() {
    global $post;
 
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="homemeta_noncename" id="homemeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
 
    // Get the location data if its already been entered
    $title = get_post_meta($post->ID, 'title', true);
    $vid = get_post_meta($post->ID, 'vid', true);
     
    // Echo out the field
       
         echo '<p>Title</p>';
         echo '<textarea name="title" class="widefat" cols="50" rows="5" />' . $title  . '</textarea>';
         echo '<p>Icon</p>';
         echo '<input type="text" name="vid" value="' . $vid  . '" class="widefat" />';
        
}
// Save the Metabox Data
 
function wpt_save_home_meta_vid($post_id, $post) {
 
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( !wp_verify_nonce( $_POST['homemeta_noncename'], plugin_basename(__FILE__) )) {
    return $post->ID;
    }
 
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;
 
    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
 
    $home_meta['vid'] = $_POST['vid'];
    $home_meta['title'] = $_POST['title'];
 
    // Add values of $home_meta as custom fields
 
    foreach ($home_meta as $key => $value) { // Cycle through the $home_meta array!
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }
}
add_action('save_post', 'wpt_save_home_meta_vid', 1, 2); // save the custom fields