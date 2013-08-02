<?php
		//start related posts section if not disabled
		if(of_get_option('blog_related') =='1') {
			$category = get_the_category(); //get first current category ID
			$this_post = $post->ID; // get ID of current post
			
			$args = array(
				'numberposts' => '3',
				'orderby' => 'rand',
				'category' =>  $category[0]->cat_ID,
				'exclude' => $this_post,
				'offset' => null
			);
			$posts = get_posts($args);
			if($posts) { ?>
				<section id="related-posts" class="boxframe">
					<h3><span><?php _e('Related Articles','framework'); ?></span></h3>
					<?php
					foreach($posts as $post) : setup_postdata($post);
					//featured img
					$thumb = get_post_thumbnail_id();
					$img_url = wp_get_attachment_url($thumb,'framework-150'); //get full URL to image
					$featured_image = aq_resize( $img_url, 150, 120, true ); //resize & crop the image
					?>
					<div class="related-entry clearfix">
						<?php if($featured_image) { ?>
							 <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="alignleft related-entry-img-link">
								<img class="related-post-image blog-entry-img" src="<?php echo $featured_image; ?>" alt="<?php echo the_title(); ?>" />
							 </a>
						<?php } ?>
						<div class="related-entry-content">
						  <h3><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h3>
						  <div class="related-entry-excerpt">
							<?php echo wp_trim_words( get_the_content(), 25, '...' ); ?><p><a href="<?php the_permalink(); ?>" class="read-more"><?php _e('read more','framework'); ?> &rarr;</a></p>
						  </div><!-- /related-entry-excerpt -->
						</div>
						<!-- /related-entry-content -->
					</div>
					<!-- /related-entry -->
					<?php endforeach; wp_reset_postdata(); ?>
					</section> 
					<!-- /related-posts --> 
			<?php } // no posts found
		} //related posts section disabled
		?>