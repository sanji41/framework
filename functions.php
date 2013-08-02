<?php
/**
 * @package WordPress
 * @subpackage Framework Theme
*/

// Get framework Core Up & Running!
require_once( get_template_directory() .'/library/framework.php');            // core functions (don't remove)
require_once( get_template_directory() .'/library/plugins.php');          // plugins & extra functions (optional)
require_once( get_template_directory() .'/library/custom-post-type.php'); // custom post type example
require_once( get_template_directory() .'/library/metabox.php');
require_once( get_template_directory() .'/library/img_resizer.php');
// Admin Functions (commented out by default)
require_once( get_template_directory() .'/library/admin.php');         // custom admin functions
require_once(get_template_directory() .'/vafpress/bootstrap.php');

/************* CONTENT WIDTH *************/
if ( ! isset( $content_width ) ) $content_width = 600;

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'framework-600', 600, 150, true );
add_image_size( 'framework-300', 300, 200, true );
add_image_size( 'framework-200', 200, 150, true );
add_image_size( 'framework-150', 150, 150, true );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function framework_register_sidebars() {
    register_sidebar(array(
    	'id' => 'sidebar1',
    	'name' => 'Sidebar 1',
    	'description' => 'The first (primary) sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
     register_sidebar(array(
    	'id' => 'footer1',
    	'name' => 'Footer Left',
    	'description' => 'Widget in Footer Left.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
      register_sidebar(array(
    	'id' => 'footer2',
    	'name' => 'Footer Middle',
    	'description' => 'Widget in Footer Middle.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
       register_sidebar(array(
    	'id' => 'footer3',
    	'name' => 'Footer Right',
    	'description' => 'Widget in Footer Right.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/
		
// Comment Layout
function framework_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php echo get_avatar($comment,$size='32',$default='<path_to_url>' ); ?>
				<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>
				<?php edit_comment_link(__('(Edit)'),'framework','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
       			<div class="help">
          			<p><?php _e('Your comment is awaiting moderation.', 'framework') ?></p>
          		</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
    <!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function framework_wpsearch($form) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search..." />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </form>';
    return $form;
} 
add_filter('gallery_style', create_function('$a', 'return "
<div class=\'gallery\'>";'));
/*-----------------------------------------------------------------------------------*/
/*	Javascsript
/*-----------------------------------------------------------------------------------*/

add_action('wp_enqueue_scripts','my_theme_scripts_function');
function my_theme_scripts_function() {
	//get theme options
	global $options;
	
	wp_deregister_script('jquery'); 
		wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"), false, '1.7.1');
	wp_enqueue_script('jquery');	
	
	// Site wide js
	wp_enqueue_script('hoverIntent', get_template_directory_uri() . '/js/jquery.hoverIntent.minified.js');
	wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish.js');
	wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js');
	wp_enqueue_script('prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js');
	wp_enqueue_script('uniform', get_template_directory_uri() . '/js/jquery.uniform.js');
	wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js');
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/library/js/modernizr.custom.min.js');


	//portfolio main
	if(is_page_template('template-portfolio.php')) {
		wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js');
		wp_enqueue_script('quicksand', get_template_directory_uri() . '/js/jquery.quicksand.js');
		wp_enqueue_script('quicksandinit', get_template_directory_uri() . '/js/jquery.quicksandinit.js');

	}
}


/*-----------------------------------------------------------------------------------*/
/*Enqueue CSS
/*-----------------------------------------------------------------------------------*/
add_action('wp_enqueue_scripts', 'surplus_enqueue_css');
function surplus_enqueue_css() {
		
	//prettyPhoto
	wp_enqueue_style('prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css', 'style');

	//awesome font - icon fonts
	wp_enqueue_style('awesome-font', get_template_directory_uri() . '/css/awesome-font.css', 'style');

	//flexislider - slider
	wp_enqueue_style('flexislider', get_template_directory_uri() . '/css/flexislider.css', 'style');

	wp_enqueue_style('normalize', get_template_directory_uri() . '/library/css/normalize.css', 'style');

	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
}
//create featured image column
add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
function posts_columns($defaults){
    $defaults['riv_post_thumbs'] = __('Thumbs', 'powered');
    return $defaults;
}
function posts_custom_columns($column_name, $id){
	if($column_name === 'riv_post_thumbs'){
        echo the_post_thumbnail( 'framework-150' );
    }
}
// Load WebFont
function gfonts_api($gf1) {
$addfont = <<<ADDFONTS
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js'></script>
<script type='text/javascript'>WebFont.load({ google: {families: [ '$gf1' ]}})</script>
<style type='text/css'>#blog-title {font-family: '$gf1', serif;}</style>
ADDFONTS;
echo $addfont;
} 
// don't remove this bracket!
?>