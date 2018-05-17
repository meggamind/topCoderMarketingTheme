<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Topcoder_2_Marketing
 */
// Reirect to news URL for inTheNews custom posts
if( is_singular('inthenews') ) {
	$news_url = get_field('in_the_news_external_url');
	if( $news_url ) {
		header('Location: '.$news_url);
		exit();
	}
}
get_header();
$thumbnail_url = get_the_post_thumbnail_url();
?>

	<main id="main" class="main">

		<article class="blog-article">
			<?php
			if ($thumbnail_url) {?>
				<header class="blog-header seperation-t">
	        <div class="viewport">
            <div class="cover flex center middle noshadow">
	            <img src="<?php echo $thumbnail_url; ?>" class="bg-img" alt="">
	          </div>
	        </div>
	      </header>
			<?php } ?>
			<div class="blog-con seperation-t">
				<div class="viewport">
					<?php
					$addthis_key = get_theme_mod( 'api_keys_addthis' );
					if( $addthis_key ) {?>
						<div class="link-share typo-label-md">
	            <a class="addthis_counter addthis_bubble_style"></a>
	            <h6 class="typo-label-md">
	              <strong>Share</strong>
									<!-- AddThis Button BEGIN -->
									<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
										<a class="addthis_button_preferred_1"></a>
									  <a class="addthis_button_preferred_2"></a>
									  <a class="addthis_button_preferred_3"></a>
									  <a class="addthis_button_preferred_4"></a>
									  <a class="addthis_button_compact"></a>
									</div>
									<!-- Go to www.addthis.com/dashboard to customize your tools -->
									<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=<?php echo $addthis_key; ?>"></script>
									<!-- AddThis Button END -->
	            </h6>
	          </div>
					<?php } ?>
					<div class="blog-con-text post-article tc-body">
						<div class="category category-sm">
               <span>By </span>
							  <?php wp_list_authors('style=none'); ?> in
								<?php
								if( is_singular('customerstory') ) {
	                the_terms( get_the_ID(), 'customerstorycategor', '', ", ", '' );
	              } else {
	                the_category( ', ' );
								}?>
							  <span class="posted-on typo-label-md "><?php echo get_the_date(); ?></span>
            </div>
						<?php
						while ( have_posts() ) :

							the_post();
							the_content();

						endwhile; // End of the loop.
						?>
					</div>
					<?php
					if( have_rows('customer_story_analytic_items') ):?>
						<div class="viewport seperation-t-md">
	            <div class="duration-info-card">
								<?php while ( have_rows('customer_story_analytic_items') ) : the_row(); ?>
		              <div class="info-el">
		                <h6 class=" tc-heading"><?php the_sub_field('title'); ?></h6>
		                <div class="value typo-heading-extra-large"><?php the_sub_field('value'); ?></div>
		              </div>
								<?php endwhile; ?>
	            </div>
	            <!-- /.duration-info-card -->
	          </div>
					<?php endif; ?>
				</div>
			</div>

    </article>

		<div class="related-blogs seperation-t-md seperation-pad-t">
	    <div class="viewport">
				<?php
				if ( function_exists( 'get_crp_posts_id' ) ) {
					global $post;
					$scores = get_crp_posts_id( array(
						'postid' => $post->ID,
						'limit' => 3
					) );
					$posts = wp_list_pluck( (array) $scores, 'ID' );
					$args = array(
						'post__in' => $posts,
						'posts_per_page' => 3,
						'ignore_sticky_posts' => 1
					);
					if( is_singular('customerstory') ) {
						$args['post_type'] = 'customerstory';
					}
					$my_query = new WP_Query( $args );
					if ( $my_query->have_posts() ) {?>
						<header>
			        <h1 class="alt flex center">Related Post</h1>
			        <div class="description"></div>
			      </header>

			      <div class="section-content seperation-t seperation-pad-b">
			        <div class="section-row story-list flex wrap flex-start">
								<?php
								$post_idx = 0;
		            $styles = array(
		              '',
		              'gradient-style-2',
		              'gradient-style-3',
		              'gradient-style-4'
		            );
								while ( $my_query->have_posts() ) {
									$my_query->the_post();
									$thumbnail_url = get_the_post_thumbnail_url();
									require( dirname(__FILE__).'/template-parts/blog-card.php' );

			            $post_idx++;
			            if ($post_idx > 3) {
			              $post_idx = 0;
			            }
									wp_reset_postdata();
								}?>
							</div>
					 </div>
					<?php }
					wp_reset_query();
				}?>
	    </div>
    </div>

	</main><!-- #main -->

<?php
get_footer();
