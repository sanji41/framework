<?php
/**
 * @package WordPress
 * @subpackage Framework Theme
*/
 get_header(); ?>
			
			<div id="content" class="clearfix">
			
				<div id="main" class="col620 left first clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
                        <div class="left thumbs-index">

                        	<?php
                        		if (has_post_thumbnail()) {
				                //get featured image
				                $thumb = get_post_thumbnail_id();
				                $img_url = wp_get_attachment_url($thumb,'framework-200'); //get full URL to image
				                
				                //crop image
				                $featured_image = aq_resize( $img_url, 200, 200, true ); //resize & crop the image
				            ?>
				            <?php if($featured_image) {  ?>
					            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><img src="<?php echo $featured_image; ?>" alt="<?php the_title_attribute(); ?>"></a>
					            <?php }?>
				            <?php } //featured image not set ?>
                        </div>
						<header>
							
							<h2 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

						<p class="meta">

                        	<?php if(function_exists('dd_twitter_generate')){dd_twitter_generate('Compact','twitter_username');} ?>

			                <?php if(function_exists('dd_google1_generate')){dd_google1_generate('Compact (20px)');} ?>

			                <?php if(function_exists('dd_fblike_generate')){dd_fblike_generate('Like Button Count');} ?>

                            <?php if(function_exists('dd_pinterest_generate')){dd_pinterest_generate('Compact');} ?>

						</p>							
						<p class="meta">
							 <span class="icon">P</span>
							 <?php _e('On','framework'); ?> <?php the_time('j'); ?> <?php the_time('M'); ?>, <?php the_time('Y'); ?> 
							 &bull;
       					<span class="icon">+</span>
       					<?php _e('By', 'framework'); ?> <?php the_author_posts_link(); ?> 
       					&bull;
       					<span class="icon">9</span>
       					<?php _e('With', 'framework'); ?>  <?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?>
                        </p>
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix">
							<?php
							    $more_link_text = '<span class="read-more">' . __('Read more on', 'frameworktheme') . the_title(' "', '" &raquo;</span>', false) ;
							    the_excerpt( $more_link_text ); 
							?>

						</section> <!-- end article section -->
					
					</article> <!-- end article -->
					
					<?php if ('open' == $post->comment_status) : ?>
						<?php comments_template(); ?>
					<?php endif; ?>
					
					<?php endwhile; ?>	
					
					<?php if (function_exists('page_navi')) { // if experimental feature is active ?>
						
						<?php page_navi(); // use the page navi function ?>
						
					<?php } else { // if it is disabled, display regular wp prev & next links ?>
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', 'frameworktheme')) ?></li>
								<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', 'frameworktheme')) ?></li>
							</ul>
						</nav>
					<?php } ?>		
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e('Not Found', 'frameworktheme') ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e('Sorry, but the requested resource was not found on this site.', 'frameworktheme'); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
