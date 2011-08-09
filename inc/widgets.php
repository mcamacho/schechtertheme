<?php
/**
 * Image_Text_Widget Class
 */
class Image_Text_Widget extends WP_Widget {
    /** constructor */
	function __construct() {
		$widget_ops = array('classname' => 'image_text', 'description' => __( 'Title, image, text and link') );
		parent::__construct('image-text', __('Image Text'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		$image = apply_filters( 'widget_image', $instance['image'], $instance );
		$text = apply_filters( 'widget_text', $instance['text'], $instance );
		$link = apply_filters( 'widget_link', $instance['link'], $instance );
		echo $before_widget;?>
		<a href="<?php echo $link; ?>"><img src="<?php echo $image; ?>" alt="" /></a>
		<?php if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } ?>
		<div class="textwidget"><?php echo $text; ?></div>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( stripslashes($new_instance['title']) );
		$instance['image'] = $new_instance['image'];
		$instance['text'] =  $new_instance['text'];
		$instance['link'] =  $new_instance['link'];
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'image' => '', 'text' => '', 'link' => '') );
		$title = strip_tags($instance['title']);
		$image = esc_textarea($instance['image']);
		$text = esc_textarea($instance['text']);
		$link = esc_textarea($instance['link']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image:'); ?></label>
		<select class="" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>">
		
			<?php
			// The Query
			global $wpdb;
			$the_query = $wpdb->get_results("SELECT post_title, guid
							FROM $wpdb->posts
							WHERE post_type = 'attachment' AND post_excerpt = 'Thumb'");
			foreach( $the_query as $post_results ) :
				$selected = $post_results->guid == $instance['image'] ? ' selected="selected"' : '';
				echo '<option value="'. $post_results->guid .'" '. $selected .' >'. $post_results->post_title .'</option>';
			endforeach; ?>
			
		</select></p>
		
		<p><label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link:'); ?></label>
		<select class="" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>">
		
			<?php
			// The Query
			global $wpdb;
			$the_query = $wpdb->get_results("SELECT post_title, guid
							FROM $wpdb->posts
							WHERE post_type = 'page'");
			foreach( $the_query as $post_results ) :
				$selected = $post_results->guid == $instance['link'] ? ' selected="selected"' : '';
				echo '<option value="'. $post_results->guid .'" '. $selected .' >'. $post_results->post_title .'</option>';
			endforeach; ?>
			
		</select></p>
		<p><label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text:'); ?></label>
		<textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea></p>

		
<?php
	}

}