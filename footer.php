<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
		
		<?php wp_nav_menu( array( 'theme_location' => 'footer', 'depth' => '1' ) ); ?>
		
		<p>&#169; 2011 SCHECHTER DAY SCHOOL NETWORK, ALL RIGHTS RESERVED</p>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php if ( ! is_home() ) : ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/menu.js" type="text/javascript"></script>
<?php endif ?>

<?php wp_footer(); ?>


</body>
</html>