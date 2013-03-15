<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'options_framework_theme'),
		'two' => __('Two', 'options_framework_theme'),
		'three' => __('Three', 'options_framework_theme'),
		'four' => __('Four', 'options_framework_theme'),
		'five' => __('Five', 'options_framework_theme')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_framework_theme'),
		'two' => __('Pancake', 'options_framework_theme'),
		'three' => __('Omelette', 'options_framework_theme'),
		'four' => __('Crepe', 'options_framework_theme'),
		'five' => __('Waffle', 'options_framework_theme')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );
		
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	// General Settings
	$options[] = array(
		'name' => __('General Settings', 'options_framework_theme'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Upload a Logo', 'options_framework_theme'),
		'desc' => __('Upload a logo on your theme, size must be 300px by 150px.', 'options_framework_theme'),
		'id' => 'logo',
		'type' => 'upload');
		
	$options[] = array(
	'name' => __('Upload a Favicon', 'options_framework_theme'),
	'desc' => __('Upload a favicon on your theme, size must be 16px by 16px', 'options_framework_theme'),
	'id' => 'favicon',
	'type' => 'upload');
		
		

	// Advanced Settings Tab
	$options[] = array(
		'name' => __('Social Settings', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Facebook URL', 'options_framework_theme'),
		'desc' => __('Enter your facebook link here.', 'options_framework_theme'),
		'id' => 'fb',
		'std' => 'Facebook URL',
		'type' => 'text');

	$options[] = array(
		'name' => __('Twitter URL', 'options_framework_theme'),
		'desc' => __('Enter your twitter link here.', 'options_framework_theme'),
		'id' => 'tw',
		'std' => 'Twitter URL',
		'type' => 'text');

	$options[] = array(
		'name' => __('Pinterest URL', 'options_framework_theme'),
		'desc' => __('Enter your pinterest link here.', 'options_framework_theme'),
		'id' => 'pn',
		'std' => 'Pinterest URL',
		'type' => 'text');

	$options[] = array(
		'name' => __('Instagram URL', 'options_framework_theme'),
		'desc' => __('Enter your instagram link here.', 'options_framework_theme'),
		'id' => 'in',
		'std' => 'Instagram URL',
		'type' => 'text');
	
	
	
	// Tab
	$options[] = array(
		'name' => __('Text Editor', 'options_framework_theme'),
		'type' => 'heading' );

	

	return $options;
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#example_showhidden').click(function() {
  		$('#section-example_text_hidden').fadeToggle(400);
	});

	if ($('#example_showhidden:checked').val() !== undefined) {
		$('#section-example_text_hidden').show();
	}

});
</script>

<?php
}