<?php
/*
Widget Name: TC Video
Description: TC Video widget
Author: Topcoder
*/

class TC_Video extends SiteOrigin_Widget {

  function __construct() {
    //Call the parent constructor with the required arguments.
    parent::__construct(
        // The unique id for your widget.
        'tc-video-widget',
        // The name of the widget for display purposes.
        __('TC Video', 'topcoder2marketing'),

        // The $widget_options array, which is passed through to WP_Widget.
        // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
        array(
          'description' => __('TC Video widget', 'topcoder2marketing'),
        ),

        //The $control_options array, which is passed through to WP_Widget
        array(
        ),

        //The $form_options array, which describes the form fields used to configure SiteOrigin widgets.
        array(
          'video_id' => array(
            'type' => 'text',
            'label' => __('Youtube Video ID', 'topcoder2marketing'),
          ),
          'margin' => array(
            'type' => 'checkbox',
            'label' => __( 'Implement offset margin top?', 'widget-form-fields-text-domain' ),
            'default' => true
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

siteorigin_widget_register('tc-video-widget', __FILE__, 'TC_Video');
