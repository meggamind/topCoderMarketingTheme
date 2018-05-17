<?php
switch ($instance['hero_select']) {
  case 'featured':?>
    <div class="content-box-featured hero">
      <div class="viewport flex middle space-between">
        <div class="content-box-card align-left">
        <h1><?php echo wp_kses_post($instance['hero_title']); ?></h1>
        <p class="description"><?php echo wp_kses_post($instance['hero_desc']); ?></p>
        <div class="actions">
          <a href="<?php echo wp_kses_post($instance['hero_btn_url']); ?>" class="tc-btn tc-btn-lg tc-btn-primary">
            <?php echo wp_kses_post($instance['hero_btn_text']); ?>
          </a>
        </div>
        </div>
        <img src="<?php echo wp_get_attachment_url($instance['hero_media']); ?>" alt="" class="featured-home-img">
      </div>
    </div>
  <?php
  break;
  case 'big_centered':?>
    <div class="content-box-featured content-box-hero">
      <div style="background-image: url(<?php echo wp_get_attachment_url($instance['hero_media']); ?>)" class="bg-img"></div>
      <div class="viewport flex middle center">
        <div class="content-box-card color-light">
          <h1 class="alt"><?php echo wp_kses_post($instance['hero_title']); ?></h1>
          <div class="description"><?php echo wp_kses_post($instance['hero_desc']); ?></div>
        </div>
      </div>
    </div>
  <?php
  break;
  case 'small_centered':?>
    <div class="content-box-featured content-box-hero content-box-shorter">
      <div style="background-image: url(<?php echo wp_get_attachment_url($instance['hero_media']); ?>)" class="bg-img"></div>
      <div class="viewport flex middle center">
        <div class="content-box-card color-light">
          <h1 class="alt"><?php echo wp_kses_post($instance['hero_title']); ?></h1>
          <div class="description"><?php echo wp_kses_post($instance['hero_desc']); ?></div>
        </div>
      </div>
    </div>
  <?php
  break;
}
