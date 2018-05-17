<?php
$banner_classes = [];
if( $instance['media'] ) {
  $banner_classes[] = 'img-grad-overlay';
} else {
  $banner_classes[] = $instance['select'];
}?>

<div class="banner <?php echo implode(" ", $banner_classes);?>">
  <div class="viewport flex middle center">
    <?php
    if( $instance['media'] ) {?>
      <img src="<?php echo wp_get_attachment_url($instance['media']); ?>" class="bg-img" alt="banner-img">
      <div class="banner-con">
        <h1>
          <?php echo wp_kses_post($instance['text']);
          if( $instance['btn_placement'] == 'inline' ) {?>
            <a href="<?php echo wp_kses_post($instance['btn_url']); ?>" class="tc-btn tc-btn-default tc-btn-md seperation-l-sm">
              <?php echo wp_kses_post($instance['btn_text']); ?>
            </a>
          <?php } ?>
        </h1>
        <?php if( $instance['btn_placement'] == 'bottom' ) {?>
          <div class="action seperation-t-sm-alt flex center">
            <span class="btn-wrapper">
              <?php if ( !empty($instance['btn_url']) ) : ?>
              <a href="<?php echo wp_kses_post($instance['btn_url']); ?>" class="tc-btn tc-btn-default tc-btn-md">
                <?php echo wp_kses_post($instance['btn_text']); ?>
              </a>
              <?php endif; ?>
              <?php if ( !empty($instance['btn_url2']) ) : ?>
              <!--<span class="btn-spacer" style="margin: 0 23px;"></span>-->
              <a href="<?php echo wp_kses_post($instance['btn_url2']); ?>" class="tc-btn tc-btn-default tc-btn-md">
                <?php echo wp_kses_post($instance['btn_text2']); ?>
              </a>
              <?php endif; ?>
            </span>
          </div>
        <?php } ?>
      </div>
    <?php } else {?>
      <h1><?php echo wp_kses_post($instance['text']); ?></h1>
    <?php } ?>
  </div>
</div>
