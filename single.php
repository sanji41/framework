<?php
/**
 * @package WordPress
 * @subpackage Framework Theme
*/
 get_header(); ?>
			
			<div id="content" class="clearfix">
			
				<div id="main" class="col620 left first clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
							
							<h2 class="single-title" itemprop="headline"><?php the_title(); ?></h2>

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
					
						<section class="post_content clearfix" itemprop="articleBody">
							<?php the_content(); ?>					
						</section> <!-- end article section -->
						
						<footer>
							<?php
					        //post tags
							if(of_get_option('blog_tags') =='1') {
								the_tags('<p class="tags"><span class="icon">C</span> Tags: ', ', ', '</p>');
							}
							?>
							<hr />

					<h2><?php if(function_exists('dd_twitter_generate')){echo 'Show some love and share!';} ?></h2>

                    <?php if(function_exists('dd_twitter_generate')){dd_twitter_generate('Normal','sanjaykhemlani');} ?>

                    <?php if(function_exists('dd_stumbleupon_generate')){dd_stumbleupon_generate('Normal');} ?>

                    <?php if(function_exists('dd_fbshareme_generate')){dd_fbshareme_generate('Normal');} ?>

                    <?php if(function_exists('dd_google1_generate')){dd_google1_generate('Normal');} ?>

                    <?php
					//author bio
					if(of_get_option('blog_bio') =='1') { ?>
			        <div id="single-author" class="clearfix">
			            <h3 class="heading"><span><?php _e('','framework'); ?></span></h3>
			            <div id="author-image">
			               <?php echo get_avatar( get_the_author_meta('user_email'), '60', '' ); ?>
			            </div><!-- author-image --> 
			            <div id="author-bio">
			                <h3><?php the_author_posts_link(); ?></h3>
			                <?php the_author_meta('description'); ?>
			            </div><!-- author-bio -->
			        </div><!-- /single-author -->
			        <?php } ?>

						</footer> <!-- end article footer -->

						<?php //framework_related_posts(); ?>

						<?php get_template_part( 'includes/related-post' ); ?>
					
					</article> <!-- end article -->
					
					<?php if ('open' == $post->comment_status) : ?>
						<?php comments_template(); ?>
					<?php endif; ?>
					
					<?php endwhile; ?>			
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1>Not Found</h1>
					    </header>
					    <section class="post_content">
					    	<p>Sorry, but the requested resource was not found on this site.</p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>