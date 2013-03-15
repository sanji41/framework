		</div> <!-- end #container -->

			<footer role="contentinfo">
				<div class="foot-wrap">

					<div id="inner-footer" class="clearfix">
						
						<div class="foot col220 left clearfix"><?php dynamic_sidebar('footer1'); ?></div>
						<div class="foot col220 left clearfix"><?php dynamic_sidebar('footer2'); ?></div>
						<div class="foot col220 left clearfix"><?php dynamic_sidebar('footer3'); ?></div>	
					</div> <!-- end #inner-footer -->
				</div>
			</footer> <!-- end footer -->
		
		<!-- scripts are now optimized via Modernizr.load -->	
			<script src="<?php echo get_template_directory_uri(); ?>/library/js/scripts.js"></script>
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
		<div class="none"><!-- none -->
		<?php wp_footer(); // js scripts are inserted using this function ?>
		</div><!-- none -->
	</body>

</html>