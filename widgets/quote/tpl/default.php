<?php
switch ($instance['type']) {
  case 'carousel':?>
    <div class="quote-wrap">
      <div class="image image-container">
        <img src="<?php echo wp_get_attachment_url($instance['quote_image']); ?>" alt="quote-img">
      </div>
      <div class="content-wrap">
        <div class="carousel-wrap">
          <ul class="carousel-slider">
            <?php
            if ( ! empty( $instance['a_repeater'] ) ) {
              $repeater_items = $instance['a_repeater'];
              foreach( $repeater_items as $index => $repeater_item ) {?>
                <li class="carousel-slider-item <?php echo !$index ? 'current' : '';?>">
                  <div class="item-header">
                     <?php echo wp_kses_post($repeater_item['cname']); ?>
                  </div>
                  <div class="item-content">
                    <em><?php echo wp_kses_post($repeater_item['quote']); ?></em>
                  </div>
                  <div class="user">
                    <div class="user-info">
                      <div class="name"><?php echo wp_kses_post($repeater_item['pname']); ?></div>
                      <div class="role"><?php echo wp_kses_post($repeater_item['prole']); ?></div>
                    </div>
                    <?php if( $repeater_item['pavatar'] ) {?>
                      <img src="<?php echo wp_get_attachment_url($repeater_item['pavatar']); ?>" alt="user-avatar" class="user-avatar">
                    <?php } ?>
                  </div>
                </li>
              <?php }
            }?>
          </ul>
          <div class="carousel-navigation">
            <div class="prev"></div>
            <div class="page">1/<?php echo count($instance['a_repeater']);?></div>
            <div class="next"></div>
          </div>
        </div>
      </div>
    </div>
  <?php
  break;
  case 'full':?>
    <div class="quote-wrap-2">
      <?php if( $instance['pavatar'] ) {?>
        <div class="user-avatar">
            <img src="<?php echo wp_get_attachment_url($instance['pavatar']); ?>" alt="user-avatar">
        </div>
      <?php } ?>
        <div class="content-wrap">
            <div class="text">
                <?php echo wp_kses_post($instance['quote']); ?>
            </div>
            <div class="user-info">
                <span class="name"><?php echo wp_kses_post($instance['pname']); ?></span>
                <span class="role"><?php echo wp_kses_post($instance['prole']); ?> at the <?php echo wp_kses_post($instance['cname']); ?></span>
            </div>
        </div>
    </div>
  <?php
  break;
}
