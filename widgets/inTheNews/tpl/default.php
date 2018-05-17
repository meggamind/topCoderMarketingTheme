<?php
$term = get_term($instance['tax_select']);
if( $term && !is_wp_error($term) ) :
$query_args = array(
  'post_type' => 'inthenews',
  'post_status' => 'publish',
  'posts_per_page' => $instance['limit'],
  'tax_query' => array(
    array(
        'taxonomy' => 'inthenewscat',
        'field' => 'id',
        'terms' => $instance['tax_select']
    )
  )
);
$the_query = new WP_Query( $query_args );
?>

<div class="viewport">
  <header class="head flex space-between">
    <h2 class="typo-heading-medium-large"><?php echo $term->name; ?></h2>
    <?php
    if( $instance['limit'] != -1 && $the_query->found_posts > $instance['limit'] ) { ?>
      <a href="<?php echo wp_kses_post($instance['btn_url']); ?>" class="tc-btn tc-btn-secondary view-all">
        <?php echo wp_kses_post($instance['btn_text']); ?>
      </a>
    <?php } ?>
  </header>
  <div class="press-release-body seperation-t-sm-alt">
    <div class="section-content dynamic-height-tiles-wrap">
      <div class="section-row-list dynamic-height-tiles masonry">
        <?php
        while ( $the_query->have_posts() ) : $the_query->the_post();?>
          <div class="section-col with-padding  section-col-4 masonry-brick">
            <div class="story-wrap bar solid-color-2">
              <div class="story-container">
                <div class="story-content">
                  <h2 class="story-header"><?php the_title(); ?></h2>
                  <div class="story-footer">
                    <div class="story-date">
                      <h6><?php the_field('in_the_news_source'); ?></h6>
                      <?php echo get_the_date(); ?>
                    </div>
                    <div class="story-btns">
                      <a href="<?php the_field('in_the_news_external_url'); ?>" target="_blank" class="tc-btn tc-btn-md tc-btn-primary">
                        Read More
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</div>

<?php endif; ?>
