<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Topcoder_2_Marketing
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header class="main-header">
	  <div class="nav-bar-wrap">
		  <a href="<?php echo get_home_url(); ?>" class="logo-wrap">
	      <img class="logo" src="<?php echo get_theme_mod( 'site_logos_header' ); ?>" alt="Topcoder">
		  </a>

			<div class="nav-menu">
				<?php
					wp_nav_menu(array(
						'items_wrap' => '%3$s',
						'walker' => new TC_Primary_Menu_Walker(),
						'container' => false,
						'menu_class' => '',
						'theme_location' => 'menu-1',
						'fallback_cb' => false
					) );
				?>
		  </div>

		  <div class="btns-wrap <?php echo is_user_logged_in()? 'is-logged':''; ?>">
	      <a class="ic ic-search ic-s search-link"></a>
	      <button class="tc-btn tc-btn-secondary off-logged">Log In</button>
	      <button class="tc-btn tc-btn-primary off-logged">Join Topcoder</button>
	      <a class="logger on-logged" href="#">
		      <?php echo get_avatar( get_current_user_id() ); ?>
	      </a>
	      <a class="toggle-link"></a>
		  </div>

		  <div class="nav-mobile <?php echo is_user_logged_in()? 'is-logged':''; ?>">
        <div class="btns-wrap">
          <button class="tc-btn tc-btn-default off-logged">Log In</button>
          <button class="tc-btn tc-btn-primary off-logged">Join Topcoder</button>
        </div>
        <form class="search-wrap" action="<?php echo get_home_url(); ?>">
          <a class="ic ic-search ic-s search-link"></a>
          <input type="search" placeholder="Search" class="text-ctrl" name="s" id="search-query-mobile" autocomplete="off"/>
          <div class="search-clear"></div>
        </form>
        <div class="nav-menu">
          <?php

            wp_nav_menu(array(
              'items_wrap' => '%3$s',
              'walker' => new TC_Mobile_Menu_Walker(),
              'container' => false,
              'menu_class' => '',
              'theme_location' => 'menu-1',
              'fallback_cb' => false
            ) );
          ?>
        </div>
      </div>
	  </div>
	  <div class="search-bar-wrap">
		  <form class="search-bar-con flex middle center" action="<?php echo get_home_url(); ?>">
	      <label class="q-lbl" for="q">Search Topcoder</label>
	      <div class="search-input">
		      <input type="search" placeholder="Enter search term" class="text-ctrl" name="s" id="search-query" />
	      </div>
	      <button class="tc-btn tc-btn-md tc-btn-default">Search</button>
		  </form>
	  </div>

	</header>
	<!-- /.main-header -->

	<div id="content" class="site-content">
