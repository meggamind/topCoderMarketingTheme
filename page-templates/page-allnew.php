<?php
/**
 * Template Name: All New Posts
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Topcoder_2_Marketing
 */
global $wp_query;
$menu_items = array();
$mi = get_menu_by_location('menu-4');
if( $mi ) {
  $menu_items = $mi;
}

get_header();
?>

  <main id="main" class="main">

    <?php require( dirname(__FILE__).'/../template-parts/tabs-menu.php' ); ?>


    <div class="solution-details seperation-t">
      <section class="popular-posts seperation-t">
          <div class="viewport">
            <header>
              <h1 class="alt">All New Posts</h1>
              <div class="description"></div>
            </header>

            <div class="section-content seperation-t seperation-pad-b">
              <div class="section-row story-list flex wrap flex-start load-more-insert">
                <?php
                $post_idx = 0;
                $styles = array(
                  '',
                  'gradient-style-2',
                  'gradient-style-3',
                  'gradient-style-4'
                );
                $args = array(
                  'post_type' => 'post'
                );
                $my_query = new WP_Query( $args );
    						while ( $my_query->have_posts() ) :

    							$my_query->the_post();
                  $thumbnail_url = get_the_post_thumbnail_url();
                  require( dirname(__FILE__).'/../template-parts/blog-card.php' );

                  $post_idx++;
                  if ($post_idx > 3) {
                    $post_idx = 0;
                  }
                  wp_reset_postdata();
                endwhile; ?>
              </div>
            </div>
            <!-- /.section-content -->
            <?php
            if (  $my_query->max_num_pages > 1 ) {?>
              <div class="action flex center">
                <a href="javascript:;" class="tc-btn tc-btn-secondary tc-btn-loadmore">Load More Articles</a>
              </div>
            <?php } ?>
          </div>
      </section>
    </div>
    <div class="seperation-t"></div>

  </main><!-- #main -->

<?php get_footer(); ?>
<script>
  tc_loadmore_params.posts = <?php echo json_encode( $my_query->query_vars ); ?>;
  tc_loadmore_params.current_page = <?php echo $my_query->paged ? $my_query->paged : 1; ?>;
  tc_loadmore_params.max_page = <?php echo $my_query->max_num_pages; ?>;
</script>
