<?php
switch ($instance['type']) {
  case 'content-box-full-image':
  case 'content-box-half-image':
    $box_classes = [];
    if( $instance['type'] == 'content-box-half-image' ) {
      $box_classes[] = 'content-box-half-image';
    }
    if( $instance['has_shadow'] ) {
      $box_classes[] = 'has-shadow';
    }
    if( $instance['rounded'] ) {
      $box_classes[] = 'rounded';
    }
  ?>
    <div class="content-box-wrap <?php echo implode(' ', $box_classes); ?>">
        <?php if( $instance['image'] ) {?>
          <div class="content-box-image image-container">
            <img src="<?php echo wp_get_attachment_url($instance['image']); ?>" alt="box-image" />
            <?php if( $instance['image_mask'] ) {?>
              <div class="content-box-image-mask image-mask <?php echo $instance['mask_style']; ?>"></div>
            <?php } ?>
          </div>
        <?php } ?>
        <div class="content-box-content">
          <div class="text-block-wrap <?php echo $instance['type'] == 'content-box-full-image' ? 'text-block-secondary' : ''; ?>">
            <div class="header">
              <?php echo wp_kses_post($instance['title']); ?>
            </div>
            <div class="body">
              <?php echo wp_kses_post($instance['text']); ?>
            </div>
            <?php if( $instance['btn_text'] ) {?>
              <div class="footer">
                <a href="<?php echo wp_kses_post($instance['btn_url']); ?>" class="tc-btn tc-btn-md tc-btn-default">
                  <?php echo wp_kses_post($instance['btn_text']); ?>
                </a>
              </div>
            <?php } ?>
          </div>
        </div>
    </div>
  <?php
  break;
  case '6-column':
  case '4-column':
    $box_classes = [];
    if( $instance['type'] == '6-column' ) {
      $box_classes[] = 'big-style';
      if( $instance['color_bar'] ){
        $box_classes[] = 'solid-bar';
      }
    } else {
      $box_classes[] = 'small-style';
      if( $instance['color_bar'] ){
        $box_classes[] = 'solid-bar';
      }
    }
    if( $instance['has_shadow'] ) {
      $box_classes[] = 'has-shadow';
    }
    if( $instance['rounded'] ) {
      $box_classes[] = 'rounded';
    }
  ?>
    <div class="content-box-wrap content-box-column <?php echo implode(' ', $box_classes); ?> ">
      <?php if( $instance['image'] ) {?>
        <div class="content-box-image image-container flex middle center themed">
          <img src="<?php echo wp_get_attachment_url($instance['image']); ?>" alt="box-image" class="auto" />
          <?php if( $instance['image_mask'] ) {?>
            <div class="content-box-image-mask image-mask <?php echo $instance['mask_style']; ?>"></div>
          <?php } ?>
        </div>
      <?php } ?>
      <div class="content-box-content">
        <div class="text-block-wrap">
          <div class="header">
            <?php echo wp_kses_post($instance['title']); ?>
          </div>
          <div class="body">
            <?php echo wp_kses_post($instance['text']); ?>
          </div>
          <?php if( $instance['btn_text'] ) {?>
            <div class="footer">
              <a href="<?php echo wp_kses_post($instance['btn_url']); ?>" class="tc-btn tc-btn-primary <?php echo $instance['type'] == '6-column' ? '' : 'tc-btn-md';?>">
                <?php echo wp_kses_post($instance['btn_text']); ?>
              </a>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  <?php
  break;
  case 'content-icon':
   $has_icon = $instance['icon'] && $instance['icon'] != 'none';
   if ($has_icon && $instance['step_flow']) {?>
     <div class="content-box-steps">
   <?php } ?>
    <div class="content-box-wrap content-box-column ex-small-style <?php echo $has_icon ? '' : 'align-left';?>">
      <div class="content-box-content">
        <div class="text-block-wrap">
          <?php
          if( $has_icon ) {?>
            <div class="content-box-image">
              <span class="ic <?php echo $instance['icon_size']. ' ' .$instance['icon']; ?>"></span>
            </div>
          <?php } ?>
          <div class="header">
            <?php echo wp_kses_post($instance['title']); ?>
          </div>
          <div class="body">
            <?php echo wp_kses_post($instance['text']); ?>
          </div>
          <?php if( $instance['btn_text'] ) {?>
            <footer class="footer action seperation-t">
              <a href="<?php echo wp_kses_post($instance['btn_url']); ?>" class="tc-btn tc-btn-primary tc-btn-md">
                <?php echo wp_kses_post($instance['btn_text']); ?>
              </a>
            </footer>
          <?php } ?>
        </div>
      </div>
    </div>
    <?php
    if ($has_icon && $instance['step_flow']) {?>
      </div>
    <?php }
  break;
}
