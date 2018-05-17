<?php
/*
Widget Name: TC Tabs
Description: TC Tabs widget
Author: Topcoder
*/

class TC_Tabs extends SiteOrigin_Widget {

  function __construct() {
    $wp_menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
    $wp_menus = empty( $wp_menus ) ? array() : (array) $wp_menus;
    $wp_menus_select = [];
    foreach ($wp_menus as $key => $value) {
      $wp_menus_select[$value->term_id] = $value->name;
    }
    //Call the parent constructor with the required arguments.
    parent::__construct(
        // The unique id for your widget.
        'tc-tabs-widget',
        // The name of the widget for display purposes.
        __('TC Tabs', 'topcoder2marketing'),

        // The $widget_options array, which is passed through to WP_Widget.
        // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
        array(
          'description' => __('TC Tabs widget', 'topcoder2marketing'),
        ),

        //The $control_options array, which is passed through to WP_Widget
        array(
        ),

        //The $form_options array, which describes the form fields used to configure SiteOrigin widgets.
        array(
          'menu_select' => array(
            'type' => 'select',
            'label' => __( 'Choose a menu', 'topcoder2marketing' ),
            'options' => $wp_menus_select
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

siteorigin_widget_register('tc-tabs-widget', __FILE__, 'TC_Tabs');
