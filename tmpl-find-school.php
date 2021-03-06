<?php
/**
 * Template Name: Find a School
 * Description: Template and search script
 */
?>

<?php get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
				<?php
				//display the search results when variables on $_get url appears	
				if ( isset($_GET['state_id']) || isset($_GET['zip_code']) ) : ?>
				<header class="entry-header">					
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->
				<div id="sc-results">
				<?php
					global $wpdb;
					
					
					echo '<h2>Search Results: ';
					if ( ! empty($_GET['state_id']) ) {
						$state = $_GET['state_id'];
						//make the query
						$the_query = $wpdb->get_results(
							"SELECT *
							FROM wp_dbt_schools
							WHERE state = $state
							ORDER BY state ASC , name ASC");
						//print the state query
						echo $wpdb->get_var("SELECT name FROM wp_dbt_states WHERE stateID = $state");
					}
					
					elseif ( ! empty($_GET['zip_code']) &&  ! empty($_GET['grade_id']) ) {
						$zip = $_GET['zip_code'];
						//search for zipcodes in 50 milles round
						$query_string = 'SELECT *
                                FROM wp_dbt_schools y INNER JOIN
                                (SELECT o.ZipCode,
								(3956 * (2 * ASIN(SQRT(
									POWER(SIN(((z.Latitude-o.Latitude)*0.017453293)/2),2) +
									COS(z.Latitude*0.017453293) *
									COS(o.Latitude*0.017453293) *
									POWER(SIN(((z.Longitude-o.Longitude)*0.017453293)/2),2)
								)))) AS Distance

							FROM ZipCodes z,
								ZipCodes o,
								ZipCodes a

							WHERE z.ZipCode = '.$zip.'  AND
								z.ZipCode = a.ZipCode AND
								(3956 * (2 * ASIN(SQRT(
									POWER(SIN(((z.Latitude-o.Latitude)*0.017453293)/2),2) +
									COS(z.Latitude*0.017453293) *
									COS(o.Latitude*0.017453293) *
									POWER(SIN(((z.Longitude-o.Longitude)*0.017453293)/2),2)
								)))) <= 25) x
                                WHERE y.zip = x.ZipCode
';
							echo 'zip code ' . $_GET['zip_code'];
						//construct the query based in the zip_query
						$grade = $_GET['grade_id'];
						if($grade == '1'){
						$query_string = $query_string . 'AND lower_grade_level <= 22
								AND upper_grade_level >= 9';
							echo ', all grade levels
';
						}else{
						$query_string = $query_string . 'AND lower_grade_level <= ' . $grade
								. ' AND upper_grade_level >= ' . $grade;
							echo ', including level ' . $wpdb->get_var("SELECT label FROM wp_dbt_gradelevels WHERE value = $grade");
						}
						$query_string = $query_string . '
ORDER BY Distance';
						//make the query
						$the_query = $wpdb->get_results($query_string);
					}
					
					elseif ( ! empty($_GET['grade_id']) ) {
						$grade = $_GET['grade_id'];
						//search for all the schools
						if($grade == '1'){
						$the_query = $wpdb->get_results(
							"SELECT *
							FROM wp_dbt_schools
							ORDER BY state ASC , name ASC");
						echo 'all grade levels';
						}
						//search for school grades
						else{
							$the_query = $wpdb->get_results(
							"SELECT *
							FROM wp_dbt_schools
							WHERE lower_grade_level <= $grade
							AND upper_grade_level >= $grade
							ORDER BY state ASC , name ASC");
						echo 'including level ' . $wpdb->get_var("SELECT label FROM wp_dbt_gradelevels WHERE value = $grade");
						}
					}
					
					//schools list results layout
					echo '<a href="' . get_site_url() . '/?p=' . get_the_ID() . '" >Search Again</a>';
					echo '</h2><span style="display:none;">' . $zip . '</span>';
					if (count($the_query)):
					foreach( $the_query as $post_results ) :
						//db queries for state abbrev and grade levels
						$state_name = $wpdb->get_var("SELECT abbrev FROM wp_dbt_states WHERE stateID = $post_results->state");
						$lower_level = $wpdb->get_var("SELECT label FROM wp_dbt_gradelevels WHERE value = $post_results->lower_grade_level");
						$upper_level = $wpdb->get_var("SELECT label FROM wp_dbt_gradelevels WHERE value = $post_results->upper_grade_level");
						
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
						$re_html = $re_html . '<li>' . $post_results->city . ', ' . $state_name . ' ' . $post_results->zip . '</li>';
						$re_html = $re_html . '</ul><ul style="width:270px;">';
						$re_html = $re_html . '<li>Contact:</li>';
						$re_html = $re_html . '<li>Tel: ' . $post_results->tel . '</li>';
						$re_html = $re_html . '<li>Fax: ' . $post_results->fax . '</li>';
						$re_html = $re_html . '<li>E-mail: <a href="mailto:' . $post_results->e_mail . '" title="mail" >' . $post_results->e_mail . '</a></li>';
						$re_html = $re_html . '<li>Website: <a href="' . $post_results->url . '" target="_blank" >' . $post_results->url . '</a></li>';
						$re_html = $re_html . '</ul></div></article>';
						 
						echo $re_html ;
					endforeach;
					else:
						echo '<blockquote>no results for your search</blockquote>';
					endif;
					echo '<a href="' . get_site_url() . '/?p=' . get_the_ID() . '" >Search Again</a>'; ?>
				</div>	
				<? else :
				//display the search alternatives
				if ( has_post_thumbnail() ) {
				  the_post_thumbnail();
				} 
				?>

				<?php the_post(); ?>

				<div class="entry-content find-school">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
				<div id="sc-search-options">
					<h2>SEARCH BY ZIP CODE AND GRADE LEVEL:</h2>
					<p>Enter your zip code and a grade level below.</p>
					
					<form>
					<p class="wide"><label for="zip_code">Enter Zip Code </label>
					<input name="zip_code" id="zip_code" type="text" /></p>
					<p class="downl">+</p>
					
					<p class="wide"><label for="grade_id">Select a Grade Level</label>
					<select id="grade_id" name="grade_id" >
						<option value="1">Any</option>					
						<?php
						global $wpdb;
						$the_query = $wpdb->get_results("SELECT *
										FROM wp_dbt_gradelevels");
						foreach( $the_query as $post_results ) :
						echo '<option value="' . $post_results->value. '" >';
						echo $post_results->label . '</option>' ;
						endforeach;
						?>
					</select></p>
					
					<input type="submit" value="SEARCH" class="downl" />
					</form>
					
				</div><!-- #search-options -->
				
				<div id="sc-search-map">
					<h2>OR SEARCH BY GEOGRAPHIC LOCATION:</h2>
					<p>Select a state or province on the map below.</p>
					<?php include('inc/usa.php') ?>
				</div><!-- #search-map -->
				
				<?php endif; ?>
			
			</div><!-- #content -->
			
		</div><!-- #primary -->
<script type="text/javascript">
/*jQuery(function(){
$zip = $('#sc-results > span').text();
$('#sc-results').prepend($('article.school_item:contains('+ $zip +')'));
$('#sc-results').prepend($('#sc-results > h2'));
});*/
</script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>