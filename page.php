<?php
/**
 * The template for displaying all pages.
 */
?>

<?php get_header(); ?>

<div id="primary">
	<div id="content" role="main">
	<?php if( is_page('search') ) : ?>
		<header class="entry-header"><h1 class="entry-title">Search Options</h1></header><!-- .entry-header -->
		<p>Search Form</p>
		<?php get_search_form(); ?>
		<p>Pages List</p>
		<ul>
			<?php wp_list_pages('title_li='); ?>
		</ul>
		<p>Post Categories</p>
		<ul>
			<?php wp_list_categories('title_li='); ?>
		</ul>
		
	<?php else: ?>
	<?php the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">					
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'schechtertheme' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'schechtertheme' ) ); ?>
			</div><!-- .entry-content -->
		</article><!-- #post-<?php the_ID(); ?> -->
	<?php endif; ?>
	</div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar(); ?>

<?php get_footer(); ?>