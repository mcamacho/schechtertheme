<?php
/**
 * The Sidebar containing the main widget area.
 *
 */
?>
		<div id="secondary" class="widget-area" role="complementary">
			
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			
			<div id="aside_quote"><?php
			global $post;
			$args = array( 'numberposts' => 1, 'post_type'=> 'sc_quote', 'orderby' => 'post_date','order' => 'ASC' );
			$myposts = get_posts( $args );
			foreach( $myposts as $post ) : setup_postdata($post);?>
				<?php the_content(); ?>
				<?php the_meta(); ?>
			<?php endforeach; ?>
			</div>
			
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
			
		</div><!-- #secondary .widget-area -->