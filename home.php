<?php
/**
 * The home template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Topcoder_2_Marketing
 */
$menu_items = array();
$mi = get_menu_by_location('menu-3');
if( $mi ) {
  $menu_items = $mi;
}

get_header();
?>

  <main id="main" class="main">

    <?php require( dirname(__FILE__).'/template-parts/tabs-menu.php' ); ?>

    <div class="solution-details seperation-t">
      <?php if( have_posts() ) :
        the_post();
        $thumbnail_url = get_the_post_thumbnail_url();
        ?>
        <div class="viewport">
          <div class="section-content">
            <div class="section-row wrap center seperation-t">
              <div class="section-col section-col-8">

                <div class="story-col">
                  <div class="story-wrap featured gradient-style-5 image-container">
                    <?php if ($thumbnail_url) {?>
                      <img src="<?php echo $thumbnail_url; ?>" class="story-cover-image" alt="Sample Story 3">
                    <?php } ?>
                    <div class="story-container">
                      <div class="story-content">
                        <h6 class="posted-by tc-label-lg">By
                        <?php wp_list_authors('style=none'); ?> in <?php the_category( ', ' ); ?></h6>
                        <h2 class="story-header seperation-t-xs-alt"><?php the_title(); ?></h2>
                        <div class="story-body"><?php the_excerpt(); ?></div>
                        <div class="story-footer">
                          <div class="story-btns">
                            <a href="<?php the_permalink(); ?>" class="tc-btn tc-btn-md tc-btn-default">Read More</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="section-col section-col-4">
                <header class="header flex space-between middle">
                  <h2 class="typo-heading-medium-large light">New Posts</h2>
                  <a href="<?php echo get_home_url(); ?>/allnew" class="tc-btn tc-btn-secondary view-all">View All New</a>
                </header>
                <div class="tc-body seperation-t-xs">
                  <?php
                  $new_posts_cnt = 0;
              		while ( have_posts() && $new_posts_cnt < 3 ) : the_post();?>
                    <div class="post-card">
                      <h6 class=" typo-label-md"><?php echo get_the_date(); ?></h6>
                      <a href="<?php the_permalink(); ?>" class="que typo-body-lg"><?php the_title(); ?></a>
                    </div>
                    <!-- /.post-card -->
              		<?php
                  $new_posts_cnt++;
                  endwhile; ?>
                </div>
              </div>
            </div>
            <!-- /.section-row -->
          </div>
          <!-- /.section-content -->
        </div>
      <?php endif; ?>

      <section class="popular-posts seperation-t-md">
          <div class="viewport">
            <header>
              <h1 class="alt">Most Popular</h1>
              <div class="description"></div>
            </header>

            <div class="section-content seperation-t seperation-pad-b">
              <div class="section-row story-list flex wrap flex-start">
                <?php
                $post_idx = 0;
                $styles = array(
                  '',
                  'gradient-style-2',
                  'gradient-style-3',
                  'gradient-style-4'
                );
                $most_viewed = pvc_get_most_viewed_posts();
    						foreach ( $most_viewed as $post ) : setup_postdata( $post );
                  $thumbnail_url = get_the_post_thumbnail_url();
                  require( dirname(__FILE__).'/template-parts/blog-card.php' );

                  $post_idx++;
                  if ($post_idx > 3) {
                    $post_idx = 0;
                  }
                endforeach; ?>
              </div>
            </div>
            <!-- /.section-content -->
          </div>
      </section>
    </div>

  </main><!-- #main -->

<?php
get_footer();
