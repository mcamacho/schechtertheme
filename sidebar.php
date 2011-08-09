<?php
/**
 * The Sidebar containing the main widget area.
 *
 */
?>
		<div id="secondary" class="widget-area" role="complementary">
			
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
			
		</div><!-- #secondary .widget-area -->