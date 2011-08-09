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
		
		<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
		
		<p>&#169; 2011 SCHECHTER DAY SCHOOL NETWORK, ALL RIGHTS RESERVED</p>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


</body>
</html>