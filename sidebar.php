				<div id="sidebar1" class="sidebar right col300 last clearfix" role="complementary">
				
					<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->
						
						
					<?php endif; ?>

				</div>