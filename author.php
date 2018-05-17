<?php
/**
 * The template for displaying author archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#author
 *
 * @package Topcoder_2_Marketing
 */
global $wp_query;

get_header();
?>

	<main id="main" class="main">
    <div class="content-box-featured content-box-profile">
      <div class="viewport flex middle">
        <div class="bar-blog-author-profile">
          <figure class="fig">
            <div class="avatar avatar-265">
              <?php echo get_avatar( get_current_user_id() ); ?>
            </div>
          </figure>
          <div class="bar-profile-details">
            <h3 class="typo-heading-medium-large light"><?php the_author(); ?></h3>
            <div class="role typo-body-large"><?php the_field('user_role_work', 'user_'.get_the_author_meta('ID')); ?></div>
            <div class="short-bio typo-label-lg lh-md seperation-t-xs"><?php the_author_meta('user_description'); ?></div>
						<?php
						if( have_rows('user_links', 'user_'.get_the_author_meta('ID')) ):?>
							<h5 class="typo-body-large">Links</h5>
							<div class="link-list seperation-t-xs">
								<?php
								while ( have_rows('user_links', 'user_'.get_the_author_meta('ID')) ) : the_row();?>
					        <a href="<?php the_sub_field('url'); ?>" class="link-item"></a>
						    <?php endwhile;?>
							</div>
						<?php endif; ?>
          </div>
          <!-- /.bar-profile-details -->
        </div>
      </div>
    </div>
    <div class="seperation-pad-t-md">
      <div class="viewport">
        <header>
          <h1 class="alt flex center">My Posts</h1>
          <div class="description"></div>
        </header>

        <div class="section-content seperation-t-sm-alt seperation-pad-b">
          <div class="section-row story-list flex wrap flex-start load-more-insert">
            <?php
            $post_idx = 0;
            $styles = array(
              '',
              'gradient-style-2',
              'gradient-style-3',
              'gradient-style-4'
            );
						while ( have_posts() ) :

							the_post();
              $thumbnail_url = get_the_post_thumbnail_url();
							require( dirname(__FILE__).'/template-parts/blog-card.php' );

	            $post_idx++;
	            if ($post_idx > 3) {
	              $post_idx = 0;
	            }
            endwhile; ?>
          </div>
        </div>
				<!-- /.section-content -->
				<?php
				if (  $wp_query->max_num_pages > 1 ) {?>
					<div class="action flex center">
						<a href="javascript:;" class="tc-btn tc-btn-secondary tc-btn-loadmore">Load More Articles</a>
					</div>
				<?php } ?>
      </div>
    </div>
		<div class="seperation-t"></div>

	</main><!-- #main -->

<?php
get_footer();
