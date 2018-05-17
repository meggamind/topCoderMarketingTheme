<div class="section-col with-padding grid-cell section-col-4"
   data-popularity="<?php echo pvc_get_post_views(); ?>"
   data-tags="">
  <div class="story-wrap <?php echo $styles[$post_idx]; ?>">
    <div class="story-container">
      <?php
      if ($thumbnail_url) {?>
        <div class="story-image image-container">
          <a class="img-thumb-link" href="<?php the_permalink(); ?>">
            <img src="<?php echo $thumbnail_url; ?>" alt="">
          </a>
        </div>
      <?php } ?>
      <div class="story-content">
        <h2 class="story-header">
          <a class="title-link" href="<?php the_permalink(); ?>"><?php tc_max_title_length(get_the_title()); ?></a>
        </h2>
        <div class="story-body"><?php the_excerpt(); ?></div>
        <div class="story-footer">
          <div class="story-term">
            <?php
              if(get_post_type() == 'customerstory' || is_tax('customerstorycategor')) {
                the_terms( get_the_ID(), 'customerstorycategor', '', ", ", '' );
              } else {
                the_category( ', ' );?>
            <?php } ?>
            <div class="typo-label-md"><?php echo get_the_date(); ?></div>
          </div>
          <div class="story-btns">
            <a href="<?php the_permalink(); ?>" class="tc-btn tc-btn-md tc-btn-default">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
