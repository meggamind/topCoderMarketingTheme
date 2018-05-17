<?php
/*
Widget Name: TC Hero
Description: TC Hero widget
Author: Topcoder
*/

class TC_Hero extends SiteOrigin_Widget {

  function __construct() {
    //Call the parent constructor with the required arguments.
    parent::__construct(
        // The unique id for your widget.
        'tc-hero-widget',
        // The name of the widget for display purposes.
        __('TC Hero', 'topcoder2marketing'),

        // The $widget_options array, which is passed through to WP_Widget.
        // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
        array(
          'description' => __('TC Hero widget', 'topcoder2marketing'),
        ),

        //The $control_options array, which is passed through to WP_Widget
        array(
        ),

        //The $form_options array, which describes the form fields used to configure SiteOrigin widgets.
        array(
          'hero_select' => array(
            'type' => 'select',
            'label' => __( 'Choose a layout', 'topcoder2marketing' ),
            'default' => 'featured',
            'options' => array(
              'featured' => __( 'Featured', 'topcoder2marketing' ),
              'big_centered' => __( 'Big Centered', 'topcoder2marketing' ),
              'small_centered' => __( 'Small Centered', 'topcoder2marketing' ),
            ),
            'state_emitter' => array(
              'callback' => 'select',
              'args' => array( 'hero_select' )
            ),
          ),
          'hero_title' => array(
            'type' => 'text',
            'label' => __('Title', 'topcoder2marketing'),
          ),
          'hero_desc' => array(
            'type' => 'tinymce',
            'label' => __('Description', 'topcoder2marketing'),
          ),
          'hero_btn_text' => array(
            'type' => 'text',
            'label' => __('Button Text', 'topcoder2marketing'),
            'default' => 'Start a Project',
            'state_handler' => array(
              'hero_select[featured]' => array('show'),
              'hero_select[big_centered]' => array('hide'),
              'hero_select[small_centered]' => array('hide'),
            ),
          ),
          'hero_btn_url' => array(
            'type' => 'link',
            'label' => __('Button URL', 'topcoder2marketing'),
            'state_handler' => array(
              'hero_select[featured]' => array('show'),
              'hero_select[big_centered]' => array('hide'),
              'hero_select[small_centered]' => array('hide'),
            ),
          ),
          'hero_media' => array(
            'type' => 'media',
            'label' => __( 'Hero media', 'topcoder2marketing' ),
            'choose' => __( 'Choose image', 'topcoder2marketing' ),
            'update' => __( 'Set image', 'topcoder2marketing' ),
            'library' => 'image',
            'fallback' => false
          )
        ),

        //The $base_folder path string.
        plugin_dir_path(__FILE__)
    );
  }

  function get_template_name($instance) {
    return 'default';
  }

  function get_style_name($instance) {
    return '';
  }
}

siteorigin_widget_register('tc-hero-widget', __FILE__, 'TC_Hero');
