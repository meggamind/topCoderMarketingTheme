<?php
/*
Widget Name: TC Timeline
Description: TC Timeline widget
Author: Topcoder
*/

class TC_Timeline extends SiteOrigin_Widget {

  function __construct() {
    //Call the parent constructor with the required arguments.
    parent::__construct(
        // The unique id for your widget.
        'tc-timeline-widget',
        // The name of the widget for display purposes.
        __('TC Timeline', 'topcoder2marketing'),

        // The $widget_options array, which is passed through to WP_Widget.
        // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
        array(
          'description' => __('TC Timeline widget', 'topcoder2marketing'),
        ),

        //The $control_options array, which is passed through to WP_Widget
        array(
        ),

        //The $form_options array, which describes the form fields used to configure SiteOrigin widgets.
        array(
          'a_repeater' => array(
            'type' => 'repeater',
            'label' => __( 'Timeline items' , 'topcoder2marketing' ),
            'item_name'  => __( 'Timeline item', 'topcoder2marketing' ),
            'fields' => array(
              'year' => array(
                'type' => 'text',
                'label' => __( 'Year', 'topcoder2marketing' )
              ),
              'content' => array(
                'type' => 'tinymce',
                'label' => __( 'Content', 'topcoder2marketing' )
              )
            )
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

siteorigin_widget_register('tc-timeline-widget', __FILE__, 'TC_Timeline');
