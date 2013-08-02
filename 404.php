<?php
/**
 * @package WordPress
 * @subpackage Framework Theme
*/
 get_header(); ?>
			
			<div id="content" class="clearfix">
			
				<div id="main" class="col620 left first clearfix" role="main">

					<article id="post-not-found" class="clearfix">
						
						<header>
							
							<h1><?php _e("Epic 404 - Article Not Found", "framework"); ?></h1>
						
						</header> <!-- end article header -->
					
						<section class="post_content">
							
							<p><?php _e("The article you were looking for was not found, but maybe try looking again!", "framework"); ?></p>
					
						</section> <!-- end article section -->
						
						<footer>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
			
				</div> <!-- end #main -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
