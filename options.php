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

	$options['widgetized_footer'] = array(
		'name' => __('Widgetized Footer?', 'options_framework_theme'),
		'desc' => __('Check box to enable the widgetized footer area.', 'options_framework_theme'),
		'id' => 'widgetized_footer',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array( "name" => __('Custom CSS', 'options_framework_theme'),
						"desc" => __('If you would like to make light styling modifications, you can add custom CSS here. If you are going to make heavy modifications to the theme, consider doing them in a <a href="http://codex.wordpress.org/Child_Themes">child theme</a>.', 'options_framework_theme'),
						"id" => "custom_css",
						"std" => "",
						"type" => "textarea"); 		
		

	// Advanced Settings Tab
	// $options[] = array(
	// 	'name' => __('Social Settings', 'options_framework_theme'),
	// 	'type' => 'heading');

	// $options[] = array(
	// 	'name' => __('Facebook URL', 'options_framework_theme'),
	// 	'desc' => __('Enter your facebook link here.', 'options_framework_theme'),
	// 	'id' => 'fb',
	// 	'std' => 'Facebook URL',
	// 	'type' => 'text');

	// $options[] = array(
	// 	'name' => __('Twitter URL', 'options_framework_theme'),
	// 	'desc' => __('Enter your twitter link here.', 'options_framework_theme'),
	// 	'id' => 'tw',
	// 	'std' => 'Twitter URL',
	// 	'type' => 'text');

	// $options[] = array(
	// 	'name' => __('Pinterest URL', 'options_framework_theme'),
	// 	'desc' => __('Enter your pinterest link here.', 'options_framework_theme'),
	// 	'id' => 'pn',
	// 	'std' => 'Pinterest URL',
	// 	'type' => 'text');

	// $options[] = array(
	// 	'name' => __('Instagram URL', 'options_framework_theme'),
	// 	'desc' => __('Enter your instagram link here.', 'options_framework_theme'),
	// 	'id' => 'in',
	// 	'std' => 'Instagram URL',
	// 	'type' => 'text');

	$options[] = array(
		'name' => __('Blog', 'options_framework_theme'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Author Bio?', 'options_framework_theme'),
		'desc' => __('Check box to enable featured images on single blog posts.', 'options_framework_theme'),
		'id' => 'blog_bio',
		'std' => '1',
		'type' => 'checkbox');
			
	$options[] = array(
		'name' => __('Tags?', 'options_framework_theme'),
		'desc' => __('Check box to enable featured images on single blog posts.', 'options_framework_theme'),
		'id' => 'blog_tags',
		'std' => '1',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('Related Posts?', 'options_framework_theme'),
		'desc' => __('Check box to enable featured images on single blog posts.', 'options_framework_theme'),
		'id' => 'blog_related',
		'std' => '1',
		'type' => 'checkbox');

	// Custom
	$options[] = array(
		'name' => __('Customize', 'options_framework_theme'),
		'type' => 'heading' );

	 $options[] = array(
    'name' =>  __('Font Color', 'options_framework_theme'),
    'desc' => __('Change your Font color here, the default is #777777', 'options_framework_theme'),
    'id' => 'color',
    'type' => "color");

	$options[] = array(
    'name' =>  __('Link Color', 'options_framework_theme'),
    'desc' => __('Change your Link color here, the default is #70706E', 'options_framework_theme'),
    'id' => 'font-color',
    'type' => "color");

    $options[] = array(
    'name' =>  __('Link Hover Color', 'options_framework_theme'),
    'desc' => __('Change your Link Hover color here, the default is #70706E', 'options_framework_theme'),
    'id' => 'font-color-hover',
    'type' => "color");

    $options[] = array( 
    "name" => "Header Font",
	"desc" => "Choose a font from the <a href='http://google.com/webfonts'>Google WebFont Directory</a> and type its name in the text field.",
	"id" => 'header_font',
	"std" => "",
	"type" => "text");

    $options[] = array( 
    "name" => "Paragraph Font",
	"desc" => "Choose a font from the <a href='http://google.com/webfonts'>Google WebFont Directory</a> and type its name in the text field.",
	"id" => 'paragraph_font',
	"std" => "",
	"type" => "text");
	
	// Tab
	$options[] = array(
		'name' => __('Support', 'options_framework_theme'),
		'type' => 'heading' );

	$options[] = array( "name" => __('Theme Documentation & Support', 'options_framework_theme'),
						"desc" => "<p>Theme support and documentation is available for all customers. Visit <a target='blank' href='http://sanjaykhemlani.com/contacts/'>Support</a> to get started. Please include a detailed description of the issue, and wait for my response within 48hrs.</p>

							<p>For more Wordpress / Web Design needs, please contact me by clicking <a target='blank' href='http://sanjaykhemlani.com/contacts/'>here</a>.</p>
						",
						"type" => "info");	
	

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