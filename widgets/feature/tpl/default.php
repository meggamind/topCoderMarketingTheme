<?php
$is_carousel = $instance['type'] == 'carousel';
?>

<div class="full-width-feature-wrap">
  <div class="text-block-wrap text-block-default text-block-primary">
    <div class="header">
        <?php echo wp_kses_post($instance['title']); ?>
    </div>
    <div class="body">
      <?php echo wp_kses_post($instance['description']); ?>
    </div>
    <?php if( $instance['btn_text'] ) {?>
      <div class="footer">
        <a href="<?php echo wp_kses_post($instance['btn_url']); ?>" class="tc-btn tc-btn-md tc-btn-default">
          <?php echo wp_kses_post($instance['btn_text']); ?>
        </a>
      </div>
    <?php } ?>
  </div>
  <div class="feature-container<?php echo $is_carousel ? ' feature-container-2' : ''; ?>">
    <?php if ( ! empty( $instance['statistics'] ) && !$is_carousel ) {
      $repeater_items = $instance['statistics']; ?>
      <div class="left-panel">
        <div class="feature-info">
          <?php foreach( $repeater_items as $index => $repeater_item ) {?>
            <div class="feature-item">
              <div class="graphic">
                  <span class="ic <?php echo $repeater_item['icon_size']. ' ' .$repeater_item['icon']; ?>"></span>
              </div>
              <div class="info">
                  <div class="info-number"><?php echo wp_kses_post($repeater_item['title']); ?></div>
                  <div class="info-text"><?php echo wp_kses_post($repeater_item['content']); ?></div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php } else if( ! empty( $instance['carousel'] ) && $is_carousel ) {
      $repeater_items = $instance['carousel']; ?>
      <div class="carousel-wrap">
        <ul class="carousel-slider">
          <?php foreach( $repeater_items as $index => $repeater_item ) {?>
            <li class="carousel-slider-item<?php echo $index == 0 ? ' current' : ''; ?>">
              <div class="carousel-slider-item-wrap">
                  <div class="left-panel">
                      <div class="feature-info">
                          <?php echo wp_kses_post($repeater_item['content']); ?>
                      </div>
                      <div class="carousel-navigation">
                          <div class="prev"></div>
                          <div class="page"><?php echo ($index+1). '/' .count($repeater_items); ?></div>
                          <div class="next"></div>
                      </div>
                  </div>
              </div>
            </li>
          <?php } ?>
      </ul>
    <?php } ?>
      <div class="right-panel">
        <?php if( $instance['thumbnail'] ) {?>
          <div class="ytplayer image-container" data-video-id="<?php echo $instance['youtube']; ?>">
            <img src="<?php echo wp_get_attachment_url($instance['thumbnail']); ?>" class="media" alt="Community Hero">
            <div class="icon ic ic-xl ic-play-icon"></div>
          </div>
        <?php } else { ?>
          <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $instance['youtube']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
        <?php } ?>
      </div>
      <?php if( ! empty( $instance['carousel'] ) && $is_carousel ) {?>
        </div>
      <?php } ?>
  </div>
</div>
