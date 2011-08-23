<?php
/**
 * Image_Text_Widget Class
 */
class Image_Text_Widget extends WP_Widget {
    /** constructor */
	function __construct() {
		$widget_ops = array('classname' => 'img_txt_wgt', 'description' => __( 'Title, image, text and link') );
		parent::__construct('image-text', __('Image Text'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		$image = apply_filters( 'widget_image', $instance['image'], $instance );
		$text = apply_filters( 'widget_text', $instance['text'], $instance );
		$optlink = apply_filters( 'widget_optlink', $instance['optlink'], $instance );
		$clink = apply_filters( 'widget_link', $instance['clink'], $instance );
		$plink = apply_filters( 'widget_link', $instance['plink'], $instance );
		$elink = apply_filters( 'widget_link', $instance['elink'], $instance );
		echo $before_widget;?>
		<?php
		    if ($optlink=='cat'){$link = get_category_link( $clink );}
		    elseif($optlink=='pag'){$link = get_page_link( $plink );}
		    else{$link = $elink;}
		?>
		<a href="<?php echo $link; ?>"><img src="<?php echo $image; ?>" alt="" /></a>
		<?php if ( !empty( $title ) ) { echo $before_title . '<a href="' . $link .'">' . $title . '</a>' .$after_title; } ?>
		<div class="img_txt_wgt"><?php echo $text; ?></div>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( stripslashes($new_instance['title']) );
		$instance['image'] = $new_instance['image'];
		$instance['text'] =  $new_instance['text'];
		$instance['optlink'] =  $new_instance['optlink'];
		$instance['clink'] =  $new_instance['clink'];
		$instance['plink'] =  $new_instance['plink'];
		$instance['elink'] =  $new_instance['elink'];
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'image' => '', 'text' => '', 'optlink' => '', 'clink' => '', 'plink' => '', 'elink' => '') );
		$title = strip_tags($instance['title']);
		$image = esc_textarea($instance['image']);
		$text = esc_textarea($instance['text']);
		$optlink = esc_textarea($instance['optlink']);
		$clink = esc_textarea($instance['clink']);
		$plink = esc_textarea($instance['plink']);
		$elink = esc_textarea($instance['elink']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image:'); ?></label>
		<select class="widefat" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>">
		
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
		
		<p><label><?php _e('Link Source:'); ?></label><br />
		<input type="radio" name="<?php echo $this->get_field_name('optlink'); ?>" value="cat" <?php if($optlink == 'cat') echo 'checked="checked"'; ?> />Category
		<input type="radio" name="<?php echo $this->get_field_name('optlink'); ?>" value="pag" <?php if($optlink == 'pag') echo 'checked="checked"'; ?> />Page
		<input type="radio" name="<?php echo $this->get_field_name('optlink'); ?>" value="ext" <?php if($optlink == 'ext') echo 'checked="checked"'; ?> />External
		</p>
		
		<p><label for="<?php echo $this->get_field_id('clink'); ?>"><?php _e('Category Link:'); ?></label>
		<select class="widefat" id="<?php echo $this->get_field_id('clink'); ?>" name="<?php echo $this->get_field_name('clink'); ?>">
		
			<?php
			// The Query
			global $wpdb;
			$the_query = $wpdb->get_results("SELECT $wpdb->terms.term_id, $wpdb->terms.name
							FROM $wpdb->terms, $wpdb->term_taxonomy
							WHERE $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id
							AND $wpdb->term_taxonomy.taxonomy =  'category'
							ORDER BY $wpdb->terms.name ASC ");
			foreach( $the_query as $post_results ) :
				$selected = $post_results->term_id == $instance['clink'] ? ' selected="selected"' : '';
				echo '<option value="'. $post_results->term_id .'" '. $selected .' >'. $post_results->name .'</option>';
			endforeach; ?>
			
		</select></p>
		
		<p><label for="<?php echo $this->get_field_id('plink'); ?>"><?php _e('Page Link:'); ?></label>
		<select class="widefat" id="<?php echo $this->get_field_id('plink'); ?>" name="<?php echo $this->get_field_name('plink'); ?>">
		
			<?php
			// The Query
			global $wpdb;
			$the_query = $wpdb->get_results("SELECT post_title, ID
							FROM $wpdb->posts
							WHERE post_type = 'page' AND post_status = 'publish'
							ORDER BY  post_title ASC ");
			foreach( $the_query as $post_results ) :
				$selected = $post_results->ID == $instance['plink'] ? ' selected="selected"' : '';
				echo '<option value="'. $post_results->ID .'" '. $selected .' >'. $post_results->post_title .'</option>';
			endforeach; ?>
			
		</select></p>
		
		<p><label for="<?php echo $this->get_field_id('elink'); ?>"><?php _e('External Link:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('elink'); ?>" name="<?php echo $this->get_field_name('elink'); ?>" type="text" value="<?php if($elink == '') { echo esc_attr_e('http://'); }else{ echo esc_attr($elink);} ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text:'); ?></label>
		<textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea></p>

		
<?php
	}

}

/**
 * Quotes_Widget Class
 */
class Quotes_Widget extends WP_Widget {
    /** constructor */
	function __construct() {
		$widget_ops = array('classname' => 'aside_quote', 'description' => __( 'Alumni Quote Widget') );
		parent::__construct('quotes-widget', __('Quotes Widget'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		$optlink = apply_filters( 'widget_optlink', $instance['optlink'], $instance );
		echo $before_widget;?>
		<div id="aside_quote">
		<?php if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } ?><?php
		    global $post;
		    $orderby = $optlink == 'random' ? 'rand' : 'post_date';
		    $args = array( 'numberposts' => 1, 'post_type'=> 'sc_quote', 'orderby' => $orderby,'order' => 'DESC' );
		    $myposts = get_posts( $args );
		    foreach( $myposts as $post ) : setup_postdata($post);?>
			    <?php the_content(); ?>
			    <?php $thelink = count(get_post_meta(get_the_ID(), 'Link')) ? get_post_meta(get_the_ID(), 'Link', true) : ''; ?>
			    <ul class="post-meta">
			    <li><a href="<?php echo esc_url($thelink) ?>"><strong><?php echo get_post_meta(get_the_ID(), 'Name', true); ?></strong></a></li>
			    <li><a href="<?php echo esc_url($thelink) ?>"><?php echo get_post_meta(get_the_ID(), 'Location', true); ?></a></li>
			    <li><a href="<?php echo esc_url($thelink) ?>"><?php echo get_post_meta(get_the_ID(), 'School', true); ?></a></li>
			    <li><a href="<?php echo esc_url($thelink) ?>"><?php echo get_post_meta(get_the_ID(), 'Class', true); ?></a></li>
			    <li><a href="<?php echo esc_url($thelink) ?>"><?php echo get_post_meta(get_the_ID(), 'Other', true); ?></a></li>
			    </ul>
		    <?php endforeach; ?>
		</div>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( stripslashes($new_instance['title']) );
		$instance['optlink'] =  $new_instance['optlink'];
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'optlink' => '') );
		$title = strip_tags($instance['title']);
		$optlink = esc_textarea($instance['optlink']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		
		<p><label><?php _e('Quote View Order:'); ?></label><br />
		<input type="radio" name="<?php echo $this->get_field_name('optlink'); ?>" value="random" <?php if($optlink == 'random' || $optlink != 'last') echo 'checked="checked"'; ?> />Random
		<input type="radio" name="<?php echo $this->get_field_name('optlink'); ?>" value="last" <?php if($optlink == 'last') echo 'checked="checked"'; ?> />Last
		</p>
<?php
	}

}