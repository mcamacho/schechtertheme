<?php
/**
 * 
 */

add_action( 'after_setup_theme', 'schechter_setup' );

function schechter_setup() {
	
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Grab Image_Text_WIdget.
	require( dirname( __FILE__ ) . '/inc/widgets.php' );

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() sidebar.
	register_nav_menu( 'primary', __( 'Primary Menu', 'schechtertheme' ) );
	
	// Add menu for the footer.
	register_nav_menu( 'footer', __( 'Footer Menu', 'schechtertheme' ) );
	
	// Add menu for registered users.
	register_nav_menu( 'private', __( 'Private Menu', 'schechtertheme' ) );

	// Add support for custom backgrounds
	//add_custom_background();
	
}// schechter_setup

function schechter_widgets_init() {
	
	// register FooWidget widget
	register_widget("Image_Text_Widget");
	
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'schechtertheme' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	//Add a footer sidebar for the home template
	register_sidebar( array(
		'name' => __( 'Home Footer', 'schechtertheme' ),
		'id' => 'sidebar-home',
		'description' => __( 'widget area for the home area over footer', 'schechtertheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	

	register_sidebar( array(
		'name' => __( 'Content Footer', 'schechtertheme' ),
		'id' => 'sidebar-content',
		'description' => __( 'widget area used in some content footer', 'schechtertheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
}

add_action( 'widgets_init', 'schechter_widgets_init' );

// Create the role for private readers
add_role('privatereader', 'Private Reader', array(
            'read' => 1,
            'level_0' => 1,
            'read_private_pages' => 1,
            'read_private_posts' => 1,
        ));

?>
