<?php
/*
Widget Name: TC Story Box
Description: TC Story Box widget
Author: Topcoder
*/

class TC_StoryBox extends SiteOrigin_Widget {

  function __construct() {
    //Call the parent constructor with the required arguments.
    parent::__construct(
        // The unique id for your widget.
        'tc-story-widget',
        // The name of the widget for display purposes.
        __('TC Story Box', 'topcoder2marketing'),

        // The $widget_options array, which is passed through to WP_Widget.
        // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
        array(
          'description' => __('TC Story Box widget', 'topcoder2marketing'),
        ),

        //The $control_options array, which is passed through to WP_Widget
        array(
        ),

        //The $form_options array, which describes the form fields used to configure SiteOrigin widgets.
        array(
          'type' => array(
            'type' => 'select',
            'label' => __( 'Choose a layout', 'topcoder2marketing' ),
            'state_emitter' => array(
              'callback' => 'select',
              'args' => array( 'type' )
            ),
            'default' => 'gradient-back',
            'options' => array(
              'gradient-back' => __( 'Gradient Background', 'topcoder2marketing' ),
              'gradient-top' => __( 'Gradient Top Bar', 'topcoder2marketing' ),
              'solid-top' => __( 'Solid Top Bar', 'topcoder2marketing' ),
              'featured'  => __( 'Featured', 'topcoder2marketing' ),
            )
          ),
          'gradient-style' => array(
            'type' => 'select',
            'label' => __( 'Choose a gradient style', 'topcoder2marketing' ),
            'default' => 'gradient-back',
            'options' => array(
              '' => __( 'Style 1', 'topcoder2marketing' ),
              'gradient-style-2' => __( 'Style 2', 'topcoder2marketing' ),
              'gradient-style-3' => __( 'Style 3', 'topcoder2marketing' ),
              'gradient-style-4' => __( 'Style 4', 'topcoder2marketing' ),
            ),
            'state_handler' => array(
              'type[gradient-back]' => array('show'),
              'type[gradient-top]' => array('show'),
              'type[solid-top]' => array('hide'),
              'type[featured]' => array('show'),
            ),
          ),
          'solid-style' => array(
            'type' => 'select',
            'label' => __( 'Choose a solid style', 'topcoder2marketing' ),
            'default' => 'gradient-back',
            'options' => array(
              'solid-color-1' => __( 'Style 1', 'topcoder2marketing' ),
              'solid-color-2' => __( 'Style 2', 'topcoder2marketing' ),
              'solid-color-3' => __( 'Style 3', 'topcoder2marketing' ),
              'solid-color-4' => __( 'Style 4', 'topcoder2marketing' ),
              'solid-color-5' => __( 'Style 5', 'topcoder2marketing' ),
              'solid-color-6' => __( 'Style 6', 'topcoder2marketing' ),
              'solid-color-7' => __( 'Style 7', 'topcoder2marketing' ),
              'solid-color-8' => __( 'Style 8', 'topcoder2marketing' ),
            ),
            'state_handler' => array(
              'type[gradient-back]' => array('hide'),
              'type[gradient-top]' => array('hide'),
              'type[solid-top]' => array('show'),
              'type[featured]' => array('hide'),
            ),
          ),
          'image' => array(
            'type' => 'media',
            'label' => __( 'Story Box image', 'topcoder2marketing' ),
            'choose' => __( 'Choose image', 'topcoder2marketing' ),
            'update' => __( 'Set image', 'topcoder2marketing' ),
            'library' => 'image',
            'fallback' => false,
          ),
          'title' => array(
            'type' => 'text',
            'label' => __('Title', 'topcoder2marketing'),
          ),
          'text' => array(
            'type' => 'tinymce',
            'label' => __('Text', 'topcoder2marketing'),
          ),
          'btn_text' => array(
            'type' => 'text',
            'label' => __('Button Text', 'topcoder2marketing'),
            'default' => 'Read More',
          ),
          'btn_url' => array(
            'type' => 'link',
            'label' => __('Button URL', 'topcoder2marketing'),
          ),
          'footer_text' => array(
            'type' => 'text',
            'label' => __('Footer Text', 'topcoder2marketing'),
          ),
          'footer_link' => array(
            'type' => 'link',
            'label' => __('Footer Link', 'topcoder2marketing'),
          ),
          'footer_link_text' => array(
            'type' => 'text',
            'label' => __('Footer Link Text', 'topcoder2marketing'),
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

siteorigin_widget_register('tc-story-widget', __FILE__, 'TC_StoryBox');
