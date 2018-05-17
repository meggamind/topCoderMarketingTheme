<?php
/*
Widget Name: TC ColorHeading
Description: TC ColorHeading widget
Author: Topcoder
*/

class TC_ColorHeading extends SiteOrigin_Widget {

  function __construct() {
    //Call the parent constructor with the required arguments.
    parent::__construct(
        // The unique id for your widget.
        'tc-colorheading-widget',
        // The name of the widget for display purposes.
        __('TC Color Heading', 'topcoder2marketing'),

        // The $widget_options array, which is passed through to WP_Widget.
        // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
        array(
          'description' => __('TC Color Heading widget', 'topcoder2marketing'),
        ),

        //The $control_options array, which is passed through to WP_Widget
        array(
        ),

        //The $form_options array, which describes the form fields used to configure SiteOrigin widgets.
        array(
          'value' => array(
            'type' => 'text',
            'label' => __('Value Heading', 'topcoder2marketing'),
          ),
          'text' => array(
            'type' => 'tinymce',
            'label' => __('Text Heading', 'topcoder2marketing'),
          ),
          'theme' => array(
            'type' => 'select',
            'label' => __( 'Theme color', 'topcoder2marketing' ),
            'default' => 'theme-red',
            'options' => array(
              'theme-red' => __( 'Red', 'topcoder2marketing' ),
              'theme-orange' => __( 'Orange', 'topcoder2marketing' ),
              'theme-blue' => __( 'Blue', 'topcoder2marketing' ),
              'theme-green' => __( 'Green', 'topcoder2marketing' ),
            )
          ),
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

siteorigin_widget_register('tc-colorheading-widget', __FILE__, 'TC_ColorHeading');
