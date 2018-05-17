<?php
$box_classes = [];
$btn_class = '';
if( $instance['type'] == 'gradient-back' || $instance['type'] == 'featured' ) {
  $btn_class = 'tc-btn-default';
} else {
  $btn_class = 'tc-btn-primary';
}
if( $instance['type'] == 'gradient-back' || $instance['type'] == 'gradient-top' ) {
  $box_classes[] = $instance['gradient-style'];
  if($instance['type'] == 'gradient-top') {
    $box_classes[] = 'bar';
  }
} else if( $instance['type'] == 'solid-top' ) {
  $box_classes[] = 'bar';
  $box_classes[] = $instance['solid-style'];
} else {
  $box_classes[] = $instance['gradient-style'];
  $box_classes[] = 'featured image-container';
}
?>
<div class="story-wrap <?php echo implode(' ', $box_classes); ?>">
  <?php if( $instance['image'] && $instance['type'] == 'featured' ) {?>
    <img src="<?php echo wp_get_attachment_url($instance['image']); ?>" class="story-cover-image" alt="Sample Story">
  <?php } ?>
  <div class="story-container">
    <?php if( $instance['image'] && $instance['type'] != 'featured' ) {?>
      <div class="story-image image-container">
        <img src="<?php echo wp_get_attachment_url($instance['image']); ?>" alt="box-image" />
      </div>
    <?php } ?>
    <div class="story-content">
      <h2 class="story-header">
        <?php echo wp_kses_post($instance['title']); ?>
      </h2>
      <div class="story-body">
        <?php echo wp_kses_post($instance['text']); ?>
      </div>
      <div class="story-footer">
        <?php if( $instance['footer_text'] ) {?>
          <div class="story-date">
            <?php echo wp_kses_post($instance['footer_text']); ?>
          </div>
        <?php }
        if( $instance['footer_link_text'] ) {?>
          <div class="story-term">
            <a href="<?php echo wp_kses_post($instance['footer_link']); ?>">
              <?php echo wp_kses_post($instance['footer_link_text']); ?>
            </a>
          </div>
        <?php } ?>
        <?php if( $instance['btn_text'] ) {?>
          <div class="story-btns">
            <a href="<?php echo wp_kses_post($instance['btn_url']); ?>" class="tc-btn tc-btn-md <?php echo $btn_class; ?>">
              <?php echo wp_kses_post($instance['btn_text']); ?>
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
