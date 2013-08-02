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
		//set favicon if defined in admin
		if(of_get_option('favicon')) { ?>
		<!-- Favicon
		================================================== -->
		<link rel="icon" type="image/png" href="<?php echo of_get_option('favicon'); ?>" />
		<?php } ?>
		
		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script>window.jQuery || document.write(unescape('%3Cscript src="<?php echo get_template_directory_uri(); ?>/library/js/libs/jquery-1.7.1.min.js"%3E%3C/script%3E'))  			</script>
		
	    <?php wp_enqueue_script('jquery'); ?>
		<?php wp_head(); ?>

		<style type="text/css"><?php if ( of_get_option('custom_css') ) { echo of_get_option('custom_css'); } ?></style>
		
  		<link rel="pingback" href="<?php get_template_directory_uri('pingback_url'); ?>">

  		<?php 
  		echo '<style type="text/css">';
		    $font = of_get_option('font-color');
		    if ($font){
        	 echo 'a {color: ' .$font. '!important;}';
       		}
       		$font_hover = of_get_option('font-color-hover');
       		 if ($font_hover){
        	 echo 'a:hover {color: ' .$font_hover. '!important;}';
       		}
       		 $color = of_get_option('color');
		    if ($color){
        	 echo 'body {color: ' .$color. '!important;}';
       		}
			$header_font = of_get_option('header_font');
		    if ($header_font){
        	 echo 'h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5 {font-family: ' .$header_font. '!important;}';
       		}
       		$paragraph_font = of_get_option('paragraph_font');
		    if ($paragraph_font){
        	 echo 'p {font-family: ' .$paragraph_font. '!important;}';
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
					   <?php $framework_logo = of_get_option('logo');
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
