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
						<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'schechtertheme' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					</header><!-- .entry-header -->
		
					<div class="entry-content">
						<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'schechtertheme' ) ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID(); ?> -->
				<?php if ( is_active_sidebar( 'sidebar-why' ) ) : ?>
	
				<div id="supplementary" class="footer-widgets" >
					
					<?php dynamic_sidebar( 'sidebar-why' ); ?>
				
				</div><!-- #supplementary -->
				
				<?php endif; ?>
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_sidebar(); ?>

<?php get_footer(); ?>