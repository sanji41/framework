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

		
		
  		<link rel="pingback" href="<?php get_template_directory_uri('pingback_url'); ?>">

	</head>
	
	<body <?php body_class(); ?>>
	
		<div id="container">
			
			<header role="banner">
			
				<div id="inner-header" class="clearfix">
					
					<!--Logo image that was uploaded here-->
                    <div id="logo" class="col40 left first clearfix"><!-- logo -->
					   <?php $framework_logo = of_get_option('logo');
					  if ($framework_logo) { ?>
					  	<h1><a href="<?php echo get_settings('home'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo $framework_logo; ?>" alt="<?php bloginfo('name'); echo ' - '; bloginfo('description'); ?>" /></a></h1>
					  <?php } else { ?>
					  	<h1><a href="<?php echo home_url('home'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
					  	<p><span class="site-description"><?php bloginfo('description'); ?></span></p>
					  <?php } ?>				
					</div>	<!-- logo -->			
					<nav role="navigation">
						<?php framework_main_nav(); // Adjust using Menus in Wordpress Admin ?>
					</nav>
				
				</div> <!-- end #inner-header -->
			
			</header> <!-- end header -->
