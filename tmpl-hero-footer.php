<?php
/**
 * Template Name: Hero Footer
 */
?>

<?php get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
				<?php 
				if ( has_post_thumbnail() ) {
				  the_post_thumbnail();
				} 
				?>
				<?php the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('hero-footer'); ?>>
					<header class="entry-header">					
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->
		
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID(); ?> -->
				<?php if ( is_active_sidebar( 'sidebar-m1' ) && $post->menu_order == 1 ) : ?>
				<div id="supplementary" class="footer-widgets" >
					<?php dynamic_sidebar( 'sidebar-m1' ); ?>
				</div><!-- #supplementary -->
				<?php elseif ( is_active_sidebar( 'sidebar-m3' ) && $post->menu_order == 3 ) : ?>
				<div id="supplementary" class="footer-widgets" >
					<?php dynamic_sidebar( 'sidebar-m3' ); ?>
				</div><!-- #supplementary -->
				<?php elseif ( is_active_sidebar( 'sidebar-m4' ) && $post->menu_order == 4 ) : ?>
				<div id="supplementary" class="footer-widgets" >
					<?php dynamic_sidebar( 'sidebar-m4' ); ?>
				</div><!-- #supplementary -->
				<?php endif; ?>
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_sidebar(); ?>

<?php get_footer(); ?>