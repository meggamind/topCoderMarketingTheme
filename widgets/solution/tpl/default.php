<?php
$has_icon = $instance['icon'] && $instance['icon'] != 'none';
$box_classes = [];
if( $instance['has_shadow'] ) {
  $box_classes[] = 'has-shadow';
}
if( $instance['is_card'] ) {
  $box_classes[] = 'is-card';
}
switch ($instance['type']) {
  case 'small':?>
    <div class="solution-wrap solution-small <?php echo implode(' ', $box_classes); ?>">
      <?php if( $has_icon ) {?>
        <div class="icon">
          <span class="ic <?php echo $instance['icon_size']. ' ' .$instance['icon']; ?>"></span>
        </div>
      <?php } ?>
      <div class="solution-content">
        <div class="header"><?php echo wp_kses_post($instance['title']); ?></div>
        <div class="description"><?php echo wp_kses_post($instance['description']); ?></div>
        <?php if( $instance['btn_text'] ) {?>
          <div class="footer">
            <a href="<?php echo wp_kses_post($instance['btn_url']); ?>" class="tc-btn tc-btn-primary">
              <?php echo wp_kses_post($instance['btn_text']); ?>
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  <?php
  break;
  case 'large':?>
    <div class="section-col flex center">
      <div class="solution-wrap light <?php echo implode(' ', $box_classes); ?>">
        <div class="solution-col solution-col-1">
          <?php if( $has_icon ) {?>
            <div class="icon">
              <span class="ic <?php echo $instance['icon_size']. ' ' .$instance['icon']; ?>"></span>
            </div>
          <?php } ?>
          <div class="solution-content">
            <div class="header"><?php echo wp_kses_post($instance['title']); ?></div>
            <div class="description"><?php echo wp_kses_post($instance['description']); ?></div>
            <?php if( $instance['btn_text'] ) {?>
              <div class="footer">
                <a href="<?php echo wp_kses_post($instance['btn_url']); ?>" class="tc-btn tc-btn-primary">
                  <?php echo wp_kses_post($instance['btn_text']); ?>
                </a>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="solution-col solution-col-2">
          <div class="solution-sub-row">
            <div class="icon">
              <span class="ic ic-m ic-duration"></span>
            </div>
            <div class="text">
              <strong>Duration:</strong> <?php echo wp_kses_post($instance['duration']); ?>
            </div>
          </div>
          <div class="solution-sub-row">
            <div class="icon">
              <span class="ic ic-m ic-product"></span>
            </div>
            <div class="text">
              <strong>Deliverables</strong>
              <div class="description">
                <?php echo wp_kses_post($instance['deliverables']); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="solution-col solution-col-3">
          <?php if( $instance['pdf'] ) :?>
            <div class="solution-sub-row">
              <a href="<?php echo wp_get_attachment_url($instance['pdf']); ?>" class="flex middle">
                <div class="icon">
                  <span class="ic ic-pdf-file-icon"></span>
                </div>
                <div class="text">
                  <strong>View Product PDF</strong>
                </div>
              </a>
            </div>
          <?php endif; ?>
          <?php if( $instance['youtube'] ) :?>
            <div class="solution-sub-row">
              <a href="#<?php echo $instance['youtube']; ?>" class="flex middle btn-show-modal">
                <div class="icon">
                  <span class="ic ic-play-icon-2"></span>
                </div>
                <div class="text">
                  <strong>Watch Video</strong>
                </div>
              </a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php
  break;
}
