<div class="short-history seperation-t-md seperation-pad-b">
  <div class="history-flow">
    <div class="history-tree">
      <?php
      if ( ! empty( $instance['a_repeater'] ) ) {
        $repeater_items = $instance['a_repeater'];
        foreach( $repeater_items as $index => $repeater_item ) {?>
          <section class="milestone">
            <h4 class="typo-body-lg"><?php echo wp_kses_post($repeater_item['year']); ?></h4>
            <div class="event tc-body seperation-t-xs">
              <?php echo wp_kses_post($repeater_item['content']); ?>
            </div>
          </section>
        <?php }
      }?>
    </div>
  </div>
</div>
