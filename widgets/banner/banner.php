<?php
/*
Widget Name: TC Banner
Description: TC Banner widget
Author: Topcoder
*/

class TC_Banner extends SiteOrigin_Widget {

  function __construct() {
    //Call the parent constructor with the required arguments.
    parent::__construct(
        // The unique id for your widget.
        'tc-banner-widget',
        // The name of the widget for display purposes.
        __('TC Banner', 'topcoder2marketing'),

        // The $widget_options array, which is passed through to WP_Widget.
        // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
        array(
          'description' => __('TC Banner widget', 'topcoder2marketing'),
        ),

        //The $control_options array, which is passed through to WP_Widget
        array(
        ),

        //The $form_options array, which describes the form fields used to configure SiteOrigin widgets.
        array(
          'select' => array(
            'type' => 'select',
            'label' => __( 'Choose a style', 'topcoder2marketing' ),
            'default' => 'gradient-style-1',
            'options' => array(
              'gradient-style-1' => __( 'Style 1', 'topcoder2marketing' ),
              'gradient-style-2' => __( 'Style 2', 'topcoder2marketing' ),
              'gradient-style-3' => __( 'Style 3', 'topcoder2marketing' ),
              'gradient-style-4' => __( 'Style 4', 'topcoder2marketing' ),
            )
          ),
          'text' => array(
            'type' => 'tinymce',
            'label' => __('Text', 'topcoder2marketing'),
          ),
          'btn_text' => array(
            'type' => 'text',
            'label' => __('Button Text', 'topcoder2marketing'),
            'default' => 'Join Topcoder'
          ),
          'btn_url' => array(
            'type' => 'link',
            'label' => __('Button URL', 'topcoder2marketing'),
          ),
          'btn_placement' => array(
            'type' => 'select',
            'label' => __( 'Choose button placement', 'topcoder2marketing' ),
            'default' => 'bottom',
            'options' => array(
              'bottom' => __( 'Bottom', 'topcoder2marketing' ),
              'inline' => __( 'Inline', 'topcoder2marketing' ),
            )
          ),
          'btn_text2' => array(
            'type' => 'text',
            'label' => __('Button Text', 'topcoder2marketing'),
            'default' => 'Let\'s Talk'
          ),
          'btn_url2' => array(
            'type' => 'link',
            'label' => __('Button URL', 'topcoder2marketing'),
          ),
          'media' => array(
            'type' => 'media',
            'label' => __( 'Banner media', 'topcoder2marketing' ),
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

siteorigin_widget_register('tc-banner-widget', __FILE__, 'TC_Banner');
