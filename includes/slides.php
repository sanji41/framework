<?php
/**
 * @package WordPress
 * @subpackage Framework Theme
 */
 
 global $data; //get theme options
?>

<?php
//get custom post type === > Slides
$args = array(
	'post_type' =>'slides',
	'numberposts' => vp_option('sl_slide'),
	'order' => 'DESC'
);
$slides = get_posts($args);
?>
<?php if($slides) { ?>
<div id="slider-wrap">
	<div class="full-slides flexslider clearfix box-shadow-slide">
		<ul class="slides">
            <?php foreach($slides as $post) : setup_postdata($post); ?>
            	<li class="slide">
                        <?php
                                if (has_post_thumbnail()) {
                                //get featured image
                                $thumb = get_post_thumbnail_id();
                                $img_url = wp_get_attachment_url($thumb,'framework-900'); //get full URL to image
                                
                                //crop image
                                $featured_image = aq_resize( $img_url, 900, 400, true ); //resize & crop the image
                            ?>
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><img src="<?php echo $featured_image; ?>" alt="<?php the_title_attribute(); ?>"></a>
                        <?php }?>
                  
			</li><!--/slide -->
            <?php endforeach; wp_reset_postdata(); ?>
		</ul><!-- /slides -->
    </div><!--/full-slides -->
</div>
<!-- /slider-wrap -->
<?php } ?>
