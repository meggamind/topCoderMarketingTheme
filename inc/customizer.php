<?php
/**
 * Topcoder 2 Marketing Theme Customizer
 *
 * @package Topcoder_2_Marketing
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function topcoder2marketing_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'topcoder2marketing_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'topcoder2marketing_customize_partial_blogdescription',
		) );
	}

	$wp_customize->add_section( 'tc_site_logos' , array(
    'title'      => __( 'Site Logos', 'topcoder2marketing' ),
    'priority'   => 30,
  ) );
	$wp_customize->add_setting('site_logos_header');
	$wp_customize->add_setting('site_logos_footer');
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'logo-header',
      array(
       'label'      => __( 'Upload Header Logo', 'topcoder2marketing' ),
       'section'    => 'tc_site_logos',
       'settings'   => 'site_logos_header'
      )
    )
  );
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'logo-footer',
      array(
       'label'      => __( 'Upload Footer Logo', 'topcoder2marketing' ),
       'section'    => 'tc_site_logos',
       'settings'   => 'site_logos_footer'
      )
    )
  );
	$wp_customize->add_section( 'tc_api_keys' , array(
    'title'      => __( 'API Keys', 'topcoder2marketing' ),
    'priority'   => 30,
  ) );
	$wp_customize->add_setting('api_keys_addthis');
	$wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'addthis-key',
      array(
       'label'      => __( 'Add This Key', 'topcoder2marketing' ),
       'section'    => 'tc_api_keys',
       'settings'   => 'api_keys_addthis'
      )
    )
  );

}
add_action( 'customize_register', 'topcoder2marketing_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function topcoder2marketing_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function topcoder2marketing_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function topcoder2marketing_customize_preview_js() {
	wp_enqueue_script( 'topcoder2marketing-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'topcoder2marketing_customize_preview_js' );
