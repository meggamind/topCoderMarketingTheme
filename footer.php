<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Topcoder_2_Marketing
 */
  
  // get footer-6 id
  global $wp_registered_widgets;
  $sidebars_widgets = wp_get_sidebars_widgets();
  $id = $sidebars_widgets['footer-6'][0];
  $last_nav = $wp_registered_widgets[$id]['callback'];
  $last_nav_id = $last_nav[0]->number;
  
  // get all widget navs
  $navs = get_option('widget_nav_menu');
?>
	</div><!-- #content -->
  <footer class="main-footer">
    <div class="footer-wrap">
      <img class="logo" src="<?php echo get_theme_mod( 'site_logos_footer' ); ?>" alt="Topcoder">
      <div class="footer-menu">

        <div class="show-for-tablet-mobile left-menu">
          <?php 
            foreach( $navs as $nav_key=>$nav ) : 
              if ($nav_key!==$last_nav_id) :
                $nav_items = wp_get_nav_menu_items($nav['nav_menu']);
          ?>
          <a class="highlight show-bottom-list" data-list="#<?php echo sanitize_title($nav['title']); ?>-bottom-list" href="javascript:void(0);">
            <?php echo strtoupper($nav['title']); ?>
          </a>
          <div id="<?php echo sanitize_title($nav['title']); ?>-bottom-list" class="bottom-sub-list">
            <?php foreach($nav_items as $nav_item) : ?>
            <a href="<?php echo $nav_item->url; ?>" target="<?php echo $nav_item->target; ?>">
              <?php echo $nav_item->post_title; ?>
            </a>
            <?php endforeach; ?>
          </div>
          <?php endif; endforeach; ?>
        </div>

        <div class="show-for-tablet-mobile">
          <?php 
            $nav_items = wp_get_nav_menu_items($navs[$last_nav_id]['nav_menu']);
            foreach($nav_items as $nav_item) :
          ?>
          <a href="<?php echo $nav_item->url; ?>" target="<?php echo $nav_item->target; ?>">
            <?php echo $nav_item->post_title; ?>
          </a>
          <?php endforeach; ?>
        </div>


        <?php
          dynamic_sidebar( 'footer-1' );
          dynamic_sidebar( 'footer-2' );
          dynamic_sidebar( 'footer-3' );
          dynamic_sidebar( 'footer-4' );
          dynamic_sidebar( 'footer-5' );
          dynamic_sidebar( 'footer-6' );
        ?>
      </div>
    </div>
	</footer>
</div><!-- #page -->

<div id="video-modal" class="modal-wrap flex center middle">
	<div class="modal">
		<a href="javascript:;" class="btn-close">
			<i class="icons icon-close"></i>
		</a>
		<div class="video-wrap">
			<div id="ytplayer"></div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
