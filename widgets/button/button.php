<?php
/*
Widget Name: TC Button
Description: TC Button widget
Author: Topcoder
*/

class TC_Button extends SiteOrigin_Widget {

  function __construct() {
    //Call the parent constructor with the required arguments.
    parent::__construct(
        // The unique id for your widget.
        'tc-button-widget',
        // The name of the widget for display purposes.
        __('TC Button', 'topcoder2marketing'),

        // The $widget_options array, which is passed through to WP_Widget.
        // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
        array(
          'description' => __('TC Button widget', 'topcoder2marketing'),
        ),

        //The $control_options array, which is passed through to WP_Widget
        array(
        ),

        //The $form_options array, which describes the form fields used to configure SiteOrigin widgets.
        array(
          'btn_select' => array(
            'type' => 'select',
            'label' => __( 'Choose button type', 'topcoder2marketing' ),
            'default' => 'primary',
            'options' => array(
              'tc-btn-primary' => __( 'Primary', 'topcoder2marketing' ),
              'tc-btn-default' => __( 'Default', 'topcoder2marketing' ),
            )
          ),
          'btn_size' => array(
            'type' => 'select',
            'label' => __( 'Choose button size', 'topcoder2marketing' ),
            'default' => '',
            'options' => array(
              '' => __( 'Normal', 'topcoder2marketing' ),
              'tc-btn-md' => __( 'Middle', 'topcoder2marketing' ),
              'tc-btn-lg' => __( 'Large', 'topcoder2marketing' ),
            )
          ),
          'btn_text' => array(
            'type' => 'text',
            'label' => __('Button Text', 'topcoder2marketing'),
            'default' => 'Start a Project'
          ),
          'btn_url' => array(
            'type' => 'link',
            'label' => __('Button URL', 'topcoder2marketing'),
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

siteorigin_widget_register('tc-button-widget', __FILE__, 'TC_Button');
