<?php
/**
 * The template for displaying category archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#category
 *
 * @package Topcoder_2_Marketing
 */
global $wp_query;
$menu_items = array();
$mi = get_menu_by_location('menu-2');
if( $mi ) {
 $menu_items = $mi;
}
$cat = get_the_category()[0];

get_header();
?>

	<main id="main" class="main">

    <?php require( dirname(__FILE__).'/template-parts/tabs-menu.php' ); ?>
    
    <div class="solution-details">
      <section class="popular-posts seperation-t">
          <div class="viewport">
            <header>
              <h1 class="alt"><?php echo $cat->name; ?></h1>
              <div class="typo-body-large"><?php echo $cat->description; ?></div>
            </header>

            <div class="section-content seperation-t seperation-pad-b">
              <div class="section-row story-list flex wrap flex-start load-more-insert js-hide-tagfilter-if-no-tag js-aggregate-tags">
                <?php
                while ( have_posts() ) :

                  the_post();
                  $thumbnail_url = get_the_post_thumbnail_url();
                  require( dirname(__FILE__).'/template-parts/category-card.php' );

                endwhile; ?>
              </div>
            </div>
            <!-- /.section-content -->
            <?php
            if (  $wp_query->max_num_pages > 1 ) {?>
              <div class="action flex center">
                <a href="javascript:;" class="tc-btn tc-btn-secondary tc-btn-loadmore">Load More Articles</a>
              </div>
            <?php } ?>
          </div>
      </section>
    </div>
    <div class="seperation-t"></div>

	</main><!-- #main -->

<?php
get_footer();
