<div class="seperation-t">
  <div class="viewport">
    <div class="section-content seperation-t-sm-alt seperation-pad-b">
      <div class="section-row story-list flex wrap flex-start load-more-insert js-hide-tagfilter-if-no-tag">
        <?php
        $post_idx = 0;
        $styles = array(
          '',
          'gradient-style-2',
          'gradient-style-3',
          'gradient-style-4'
        );
        while ( have_posts() ) :

          the_post();
          $thumbnail_url = get_the_post_thumbnail_url();
          require( dirname(__FILE__).'/blog-card.php' );

          $post_idx++;
          if ($post_idx > 3) {
            $post_idx = 0;
          }
        endwhile; ?>
      </div>
    </div>
    <!-- /.section-content -->
    <?php
    if (  $wp_query->max_num_pages > 1 ) {?>
      <div class="action flex center">
        <a href="javascript:;" class="tc-btn tc-btn-secondary tc-btn-loadmore">Load More Articles</a>
      </div>
      <div class="seperation-t"></div>
    <?php } ?>
  </div>
</div>
