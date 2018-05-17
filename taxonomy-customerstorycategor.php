<?php
/**
 * Post Type Template
 *
 * @link https://codex.wordpress.org/Post_Type_Templates
 *
 * @package Topcoder_2_Marketing
 */

get_header();
?>

	<main id="main" class="main">
    <?php
    dynamic_sidebar( 'customer-stories-archive-header' );
    dynamic_sidebar( 'customer-stories-archive-tabs' );
		require( dirname(__FILE__).'/template-parts/customer-stories-list.php' );
    dynamic_sidebar( 'customer-stories-archive-bottom-banner' );
		?>
    <div class="seperation-t"></div>
	</main><!-- #main -->

<?php
get_footer();
