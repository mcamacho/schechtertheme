<?php
/**
 * Schechter Site Home Page
 * 
 */
 ?>
<?php get_header(); ?>
	<div id="primary">
		<div id="home-nav">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'depth' => '2' ) ); ?>
			<!--end home navigation aside-->
			<div id="rotate-carousel" class="slider-wrap">
				<ul class="slider slider-1">
				<?php
				global $post;
				$args = array(
				  'post_type' => 'sc_carousel',
				  'numberposts' => -1,
				  'post_status' => null,
				'orderby' => 'meta_value_num',
				'meta_key' => 'Order',
				'order' => 'ASC',
				  );
				
				$attachments = get_posts($args);
				$carousel_images = false;
				$carousel_amount = 0;
				if ($attachments) : ?>
					<?php foreach ($attachments as $attachment) :
						//Loop through attachments (images)
						echo '<li><a href="'. get_permalink(get_post_meta($attachment->ID, 'page ID', true)) .'">' . get_the_post_thumbnail($attachment->ID, 'full') . '</a>';
						echo '<hgroup><h1>' . $attachment->post_title . '</h1>';
						echo '<h2></h2></hgroup></li>';
						$carousel_images = true;
						$carousel_amount += 1;
						//End loop through attachments
					endforeach;
				endif ;
				if ( ! $attachments || ! $carousel_images ) :
					echo '<li><img src="' . get_stylesheet_directory_uri() . '/images/home-default.jpg" alt="" />';
					echo '<hgroup><h1>Schechter Network</h1>';
					echo '<h2>Welcome to a place</h2></hgroup></li>';
				endif ; ?>
				</ul>
				<?php if ( $carousel_amount > 1 ) : ?>
					<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.rotator.min.js"></script>
					<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/home-carousel.js"></script>
				<?php endif ; ?>
			</div><!-- #rotate-carousel -->
		</div><!-- #home-nav -->
		<div id="home-division"></div>
	</div><!-- #primary -->
	
	<?php if ( is_active_sidebar( 'sidebar-home' ) ) : ?>
	
	<div id="supplementary" class="footer-widgets" >
		
		<?php dynamic_sidebar( 'sidebar-home' ); ?>
	
	</div><!-- #supplementary -->
	
	<?php endif; ?>

<?php get_footer(); ?>