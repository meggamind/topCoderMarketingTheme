<div class="search-card">
  <h3 class="search-card-title">
    <a class="title-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
  </h3>
  <div class="desc"><?php the_excerpt(); ?></div>
  <div class="actions">
    <a class="target-link" href="<?php the_permalink(); ?>">
      <?php the_permalink(); ?>
    </a>
  </div>
</div>
