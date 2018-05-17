<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Topcoder_2_Marketing
 */
global $wp_query;
$search_term = get_search_query();
$frontpage_id = get_option( 'page_on_front' );
$page_for_posts = get_option('page_for_posts');
$ancestor_id = get_query_var('ancestor_id');
$parent_only_query = new WP_Query(array(
	'post__not_in' => array($frontpage_id),
  'post_parent' => 0,
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'post_type' => 'page'
));
get_header();
?>

	<main id="main" class="main">
		<div class="search-page-wrap seperation-t-md">
      <div class="viewport">
        <div class="section-content">
          <h2 class="page-section-title"><?php echo $search_term ?></h2>
          <div class="section-row section-row-search">
            <aside class="section-col section-col-2 align-left">
              <ul class="aside-links aside-search-links">
                <li>
                  <a href="<?php echo get_home_url().'?s='.urlencode($search_term); ?>" class="<?php echo $ancestor_id ? '' : 'active'; ?>">All</a>
                </li>
								<?php while ( $parent_only_query->have_posts() ) :
									$parent_only_query->the_post();
									$cp_id = get_the_ID();
									if( $cp_id != $page_for_posts ) {
										// Display only if it has children
										$children = get_children( array(
											'post_parent' => $cp_id,
											'post_status' => 'publish'
										), ARRAY_N );
										if( count($children) ) {?>
											<li>
			                  <a href="<?php echo get_home_url().'?s='.urlencode($search_term).'&ancestor_id='.$cp_id; ?>" class="<?php echo $ancestor_id == $cp_id ? 'active' : ''; ?>">
													<?php the_title(); ?>
												</a>
			                </li>
										<?php }
									} else {?>
										<li>
		                  <a href="<?php echo get_home_url().'?s='.urlencode($search_term).'&ancestor_id='.$cp_id; ?>" class="<?php echo $ancestor_id == $cp_id ? 'active' : ''; ?>">
												<?php the_title(); ?>
											</a>
		                </li>
								<?php }
							 endwhile; ?>
              </ul>
            </aside>
            <div class="section-col section-col-10">
              <div class="search-result-list-container">
								<div class="search-result-list load-more-insert">
									<?php
									while ( have_posts() ) :
										the_post();
										require( dirname(__FILE__).'/template-parts/search-card.php' );
									endwhile; ?>
								</div>
              </div>
              <!-- /.search-result-list-container -->
            </div>
            <!-- /.section-col -->
          </div>
					<?php
					if (  $wp_query->max_num_pages > 1 ) {?>
	          <div class="action flex center">
							<a href="javascript:;" class="tc-btn tc-btn-secondary tc-btn-loadmore">Load More Results</a>
	          </div>
					<?php } ?>
        </div>
        <!-- /.section-content -->
      </div>
    </div>
		<div class="seperation-t"></div>

	</main><!-- #main -->

<?php
get_footer();
