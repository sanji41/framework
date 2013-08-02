<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name')?></title>
		<link href='http://fonts.googleapis.com/css?family=Average+Sans' rel='stylesheet' type='text/css'>
		
		<?php
    //add viewport meta if responsive enabled
    if(vp_option('tg_responsive')) { ?>
    <!-- Mobile Specific
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--[if lt IE 9]>
      <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <?php } ?>

    <?php
    //set favicon if defined in admin
    if(vp_option('up_logo')){ ?>
    <!-- Favicon
    ================================================== -->
    <link rel="icon" type="image/png" href="<?php echo vp_option('up_favicon'); ?>" />
    <?php } ?>
		
		
		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script>window.jQuery || document.write(unescape('%3Cscript src="<?php echo get_template_directory_uri(); ?>/library/js/libs/jquery-1.7.1.min.js"%3E%3C/script%3E'))  			</script>
		
	  <?php wp_enqueue_script('jquery'); ?>
		<?php wp_head(); ?>

    <style type="text/css"><?php if ( vp_option('ce_1') ) { echo vp_option('ce_1'); } ?></style>
		
  		<link rel="pingback" href="<?php get_template_directory_uri('pingback_url'); ?>">

      <?php 
      echo '<style type="text/css">';
        $font = vp_option('link_color_accent');
        if ($font){
           echo 'a {color: ' .$font. '!important;}';
          }
          $font_hover = vp_option('hover_color_accent');
           if ($font_hover){
           echo 'a:hover {color: ' .$font_hover. '!important;}';
          }
           $color = vp_option('p_color_accent');
        if ($color){
           echo 'body {color: ' .$color. '!important;}';
          }
      $header_font = vp_option('header_font_face');
        if ($header_font){
           echo 'h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5 {font-family: ' .$header_font. '!important;}';
          }
          $paragraph_font = vp_option('p_font_face');
        if ($paragraph_font){
           echo 'body {font-family: ' .$paragraph_font. '!important;}';
          }
        echo '</style>';
    ?>

	</head>
	
	<body <?php body_class(); ?>>
	
		<div id="container">
			
			<header role="banner">
			
				<div id="inner-header" class="clearfix">
					
					<!--Logo image that was uploaded here-->
                    <div id="logo" class="left first clearfix"><!-- logo -->
					   <?php $framework_logo = vp_option('up_logo');
					  if ($framework_logo) { ?>
					  	<h1><a href="<?php echo home_url(); ?>/" title="<?php get_bloginfo( 'name' ); ?>"><img src="<?php echo $framework_logo; ?>" alt="<?php bloginfo('name'); echo ' - '; bloginfo('description'); ?>" /></a></h1>
					  <?php } else { ?>
					  	<h1><a href="<?php echo home_url(); ?>/" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
					  	<p><span class="site-description"><?php bloginfo('description'); ?></span></p>
					  <?php } ?>				
					</div>	<!-- logo -->			
					<nav role="navigation">
						<?php framework_main_nav(); // Adjust using Menus in Wordpress Admin ?>
					</nav>
				
				</div> <!-- end #inner-header -->
			
			</header> <!-- end header -->

  
      <?php if(vp_option('tg_slider')){ 
          //show homepage slider
          if(is_front_page()) require_once( get_template_directory() .'/includes/slides.php');
        }
        ?>
