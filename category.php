<?php
/**
 * The template for displaying Search Results pages.
 *
 */
?>
<?php get_header(); ?>

		<section id="primary">
			<div id="content" role="main">
				<header class="page-header">
					<?php $cat = single_cat_title("", false); ?>
					<h1 class="page-title">Category: <?php echo $cat; ?></h1>
				</header>

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
				
					<h2 class="entry-title">
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'schechtertheme' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h2>
					<p class="entry-meta">
						<?php the_time('F j, Y'); ?> | <?php the_category(', '); ?>
					</p><!-- .entry-meta -->
					<div class="entry-content">
						<?php the_excerpt(); ?>
					</div><!-- .entry-content -->

				<?php endwhile; ?>
			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'schechtertheme' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'schechtertheme' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>