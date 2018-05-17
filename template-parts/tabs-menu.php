<div class="tabs-bar-wrap">
  <div class="tabs-bar viewport">
    <div>
      <?php
      foreach ($menu_items as $key => $value) {
        $classes = empty( $value->classes ) ? array() : (array) $value->classes;
        $active = '';
        if( in_array('current-menu-item', $classes) ){
          $active = ' active';
        }?>
        <div class="tab<?php echo $active;?>">
          <a href="<?php echo $value->url; ?>"><?php echo apply_filters( 'the_title', $value->title, $value->ID ); ?></a>
        </div>
      <?php } ?>
    </div>
    <?php
      $page_for_posts = get_post(get_option( 'page_for_posts' ));
      if ( $pagename!=$page_for_posts->post_name) : 
    ?>
    <div>
      <a class="label-el <?php /*has-count*/ ?> js-toggle-filter-pop" href="javascript:;">
        <i class="ic ic-filter ic-s"></i> 
        <span class="label-filter">Filter</span>
        <?php /*<span class="count typo-label-xs">3</span>*/ ?>
      </a>
      <div class="filter-popup">
            <ul class="list sort typo-label-md ">
              <li>
                <a class="js-set-sortorder active" data-order="chronologically" href="#">Sort Chronologically</a>
              </li>
              <li class="seperation-t-xxs">
                <a class="js-set-sortorder" data-order="most-popular" href="#"> Most Popular</a>
              </li>
            </ul>
            <div class="taglist-group">
              <div class="seperator-line"></div>
          
              <h6 class="typo-label-lg fw-md">Tags</h6>
              <ul class="list taglist typo-label-md">
              </ul>
              <!-- /.list taglist -->
            </div>
            <!-- /.taglist-group -->
          </div>
          <!-- /.filter-popup -->
    </div>
    <?php endif; ?>
  </div>
</div>
