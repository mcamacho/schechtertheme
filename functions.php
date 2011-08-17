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
	
	// This theme uses Featured Images (also known as post thumbnails) for specific page Custom Header images
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 712, 300, true );

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
	
	//Add a footer sidebar for the main link first menu
	register_sidebar( array(
		'name' => __( 'Why Schechter', 'schechtertheme' ),
		'id' => 'sidebar-why',
		'description' => __( 'widget area for the why_schechter page over footer', 'schechtertheme' ),
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

//add quote post type
add_action('init', 'quote_post_type');
function quote_post_type() 
{
  $labels = array(
    'name' => _x('Quotes', 'post type general name'),
    'singular_name' => _x('Quote', 'post type singular name'),
    'add_new' => _x('Add New', 'quote'),
    'add_new_item' => __('Add New Quote'),
    'edit_item' => __('Edit Quote'),
    'new_item' => __('New Quote'),
    'all_items' => __('All Quotes'),
    'view_item' => __('View Quote'),
    'search_items' => __('Search Quotes'),
    'not_found' =>  __('No quotes found'),
    'not_found_in_trash' => __('No quotes found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Quotes'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','custom-fields')
  ); 
  register_post_type('sc_quote',$args);
}

//add filter to ensure the text Book, or book, is displayed when user updates a book 
add_filter('post_updated_messages', 'quote_post_type_messages');
function quote_post_type_messages( $messages ) {
  global $post, $post_ID;

  $messages['quote'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('Quote updated. <a href="%s">View quote</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Quote updated.'),
    /* translators: %s: date and time of the revision */
    5 => isset($_GET['revision']) ? sprintf( __('Quote restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Quote published. <a href="%s">View quote</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Quote saved.'),
    8 => sprintf( __('Quote submitted. <a target="_blank" href="%s">Preview quote</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Quote scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview quote</a>'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Quote draft updated. <a target="_blank" href="%s">Preview quote</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}

//display contextual help for Books
//add_action( 'contextual_help', 'quote_post_type_add_help_text', 10, 3 );

function quote_post_type_add_help_text($contextual_help, $screen_id, $screen) { 
  //$contextual_help .= var_dump($screen); // use this to help determine $screen->id
  if ('sc_quote' == $screen->id ) {
    $contextual_help =
      '<p>' . __('Things to remember when adding or editing a quote:') . '</p>' .
      '<ul>' .
      '<li>' . __('Specify the correct genre such as Mystery, or Historic.') . '</li>' .
      '<li>' . __('Specify the correct writer of the book.  Remember that the Author module refers to you, the author of this book review.') . '</li>' .
      '</ul>' .
      '<p>' . __('If you want to schedule the book review to be published in the future:') . '</p>' .
      '<ul>' .
      '<li>' . __('Under the Publish module, click on the Edit link next to Publish.') . '</li>' .
      '<li>' . __('Change the date to the date to actual publish this article, then click on Ok.') . '</li>' .
      '</ul>' .
      '<p><strong>' . __('For more information:') . '</strong></p>' .
      '<p>' . __('<a href="http://codex.wordpress.org/Posts_Edit_SubPanel" target="_blank">Edit Posts Documentation</a>') . '</p>' .
      '<p>' . __('<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>') . '</p>' ;
  } elseif ( 'edit-book' == $screen->id ) {
    $contextual_help = 
      '<p>' . __('This is the help screen displaying the table of books blah blah blah.') . '</p>' ;
  }
  return $contextual_help;
}

// Create the role for private readers
add_role('privatereader', 'Private Reader', array(
            'read' => 1,
            'level_0' => 1,
            'read_private_pages' => 1,
            'read_private_posts' => 1,
        ));

?>
