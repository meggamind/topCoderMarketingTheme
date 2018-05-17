<?php
if( !empty( $instance['video_id'] ) ) :?>
  <div class="<?php echo $instance['margin'] ? 'seperation-t-alt-md' : ''; ?>">
    <div class="viewport flex center">
      <div class="content-box-wrap content-box-featured-video">

        <div class="featured-video video-embedder" data-videoid="<?php echo wp_kses_post($instance['video_id']); ?>">
          <div id="ytplayer"></div>
        </div>

      </div>
    </div>
  </div>
<?php endif;
