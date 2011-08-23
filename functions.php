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
	
	// This theme uses Featured Images (also known as post thumbnails) for specific page Custom Header images
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 712, 300, true );

	// Add support for custom backgrounds
	//add_custom_background();
	
}// schechter_setup

function schechter_widgets_init() {
	
	// register FooWidget widget
	register_widget("Image_Text_Widget");
	
	// register Quotes widget
	register_widget("Quotes_Widget");
	
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
		'name' => __( 'Widgets - Menu 1', 'schechtertheme' ),
		'id' => 'sidebar-m1',
		'description' => __( 'widget area for the main page of menu 1, hero-footer template must be assigned to the page, and order to 1', 'schechtertheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Widgets - Menu 3', 'schechtertheme' ),
		'id' => 'sidebar-m3',
		'description' => __( 'widget area for the main page of menu 3, hero-footer template must be assigned to the page, and order to 3', 'schechtertheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Widgets - Menu 4', 'schechtertheme' ),
		'id' => 'sidebar-m4',
		'description' => __( 'widget area for the main page of menu 4, hero-footer template must be assigned to the page, and order to 4', 'schechtertheme' ),
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
add_action( 'contextual_help', 'quote_post_type_add_help_text', 10, 3 );

function quote_post_type_add_help_text($contextual_help, $screen_id, $screen) { 
  //$contextual_help .= var_dump($screen); // use this to help determine $screen->id
  if ('sc_quote' == $screen->id ) {
    $contextual_help =
      '<p>' . __('Things to remember when adding or editing a quote:') . '</p>' .
      '<ul>' .
      '<li>' . __('The Title is just for reference,') . '</li>' .
      '<li>' . __('The content will be shown within quotes.') . '</li>' .
      '<li>' . __('The custom fields are shown in this order and are:') . '</li>' .
      '<li>' . __('Name, Location, School, Class, Other and Link (this one not display).') . '</li>' .
      '<li>' . __('If the custom fields are not included just the content will be showed.') . '</li>' .
      '</ul>' ;
  } elseif ( 'edit-book' == $screen->id ) {
    $contextual_help = 
      '<p>' . __('This is the help screen displaying the table of books blah blah blah.') . '</p>' ;
  }
  return $contextual_help;
}

// Create the role for private readers
/*add_role('privatereader', 'Private Reader', array(
            'read' => 1,
            'level_0' => 1,
            'read_private_pages' => 1,
            'read_private_posts' => 1,
        ));*/

?>
