<div class="tc-body">
  <?php
  if ( ! empty( $instance['a_repeater'] ) ) {
    $repeater_items = $instance['a_repeater'];
    foreach( $repeater_items as $index => $repeater_item ) {?>
      <div class="show-hide-card">
        <div class="que typo-body-large"><?php echo wp_kses_post($repeater_item['title']); ?> <a href="javascript:;" class="toggle-arrow"></a></div>
        <div class="reply tc-label-lg"><?php echo wp_kses_post($repeater_item['content']); ?></div>
      </div>
    <?php }
  }?>
</div>
