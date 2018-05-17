<?php
function tc_loadmore_ajax_handler(){

	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
	$post_idx = 0;
	$styles = array(
		'',
		'gradient-style-2',
		'gradient-style-3',
		'gradient-style-4'
	);

  // it is always better to use WP_Query but not here
	query_posts( $args );
  if( have_posts() ) :

		// run the loop
		while( have_posts() ): the_post();
    $thumbnail_url = get_the_post_thumbnail_url();

    if( is_category() ) {
      require( dirname(__FILE__).'/../template-parts/category-card.php' );
		} else if( is_search() && !is_archive() ) {
			require( dirname(__FILE__).'/../template-parts/search-card.php' );
		} else {
			require( dirname(__FILE__).'/../template-parts/blog-card.php' );
		}

		$post_idx++;
		if ($post_idx > 3) {
			$post_idx = 0;
		}
		endwhile;

	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}

add_action('wp_ajax_loadmore', 'tc_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'tc_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}
