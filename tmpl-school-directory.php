<?php
/**
 * Template Name: School Directory
 * Description: Template and search script
 */
?>

<?php get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
				<header class="entry-header">					
					<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'schechtertheme' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				</header><!-- .entry-header -->
				<div id="school-directory">
				<?php
					global $wpdb;
					$statenametemp ='';
					
					$the_query = $wpdb->get_results(
						"SELECT * 
						FROM  `wp_dbt_schools` 
						ORDER BY state ASC , name ASC ");
					
					
					//schools list results layout
					foreach( $the_query as $post_results ) :
						//db queries for state abbrev and grade levels
						$state_abbr = $wpdb->get_var("SELECT abbrev FROM wp_dbt_states WHERE stateID = $post_results->state");
						$state_name = $wpdb->get_var("SELECT name FROM wp_dbt_states WHERE stateID = $post_results->state");
						$lower_level = $wpdb->get_var("SELECT label FROM wp_dbt_gradelevels WHERE value = $post_results->lower_grade_level");
						$upper_level = $wpdb->get_var("SELECT label FROM wp_dbt_gradelevels WHERE value = $post_results->upper_grade_level");
						if( $statenametemp != $state_name) : ?>
						<h2 class="school-directory"><?php echo $state_name ?></h2>
						<?php $statenametemp = $state_name;
						endif;
						$re_html = '<article class="school_item">';
						$re_html = $re_html . '<img src="' . $post_results->logo .'" title="' . $post_results->name . '" />';
						$re_html = $re_html . '<div class="school-content">';
						$re_html = $re_html . '<h1><a href="' . $post_results->url .'" target="_blank" >' . $post_results->name . '</a></h1>';
						$re_html = $re_html . '<p>' . $post_results->description . '</p>';
						$re_html = $re_html . '<ul style="width:50px;">';
						$re_html = $re_html . '<li>Grades:</li>';
						$re_html = $re_html . '<li>' . $lower_level . '-' . $upper_level . '</li>';
						$re_html = $re_html . '</ul><ul style="width:160px;">';
						$re_html = $re_html . '<li>Address:</li>';
						$re_html = $re_html . '<li>' . $post_results->address . '</li>';
						$re_html = $re_html . '<li>' . $post_results->city . ', ' . $state_abbr . ' ' . $post_results->zip . '</li>';
						$re_html = $re_html . '</ul><ul style="width:270px;">';
						$re_html = $re_html . '<li>Contact:</li>';
						$re_html = $re_html . '<li>Tel: ' . $post_results->tel . '</li>';
						$re_html = $re_html . '<li>Fax: ' . $post_results->fax . '</li>';
						$re_html = $re_html . '<li>E-mail: <a href="mailto:' . $post_results->e_mail . '" title="mail" >' . $post_results->e_mail . '</a></li>';
						$re_html = $re_html . '<li>Website: <a href="' . $post_results->url . '" target="_blank" >' . $post_results->url . '</a></li>';
						$re_html = $re_html . '</ul></div></article>';
						 
						echo $re_html ;
					endforeach; ?>
				</div>	
				
			
			</div><!-- #content -->
			
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>