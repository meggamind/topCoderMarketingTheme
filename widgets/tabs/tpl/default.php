<?php
$menu_items = array();
if( !empty( $instance['menu_select'] ) ) {
  $menu_items = wp_get_nav_menu_items( $instance['menu_select'] );
}?>

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

    <div>
      <a class="label-el <?php /*has-count*/ ?> js-toggle-filter-pop" href="javascript:;">
        <i class="ic ic-filter ic-s"></i>
        <span class="label-filter">Filter</span>
        <?php /*<span class="count typo-label-xs">3</span>*/ ?>
      </a>
      <div class="filter-popup">
            <ul class="list sort typo-label-md ">
              <li>
                <a class="js-set-sortorder" data-order="chronological" href="#">Chronological Order</a>
              </li>
              <li>
                <a class="js-set-sortorder active" data-order="reverse-chronological" href="#">Reverse Chronological</a>
              </li>
              <li class="seperation-t-xxs">
                <a class="js-set-sortorder" data-order="most-popular" href="#">Most Popular</a>
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
  </div>
</div>
