<?php
/*
Widget Name: TC InTheNews
Description: TC InTheNews widget
Author: Topcoder
*/

class TC_InTheNews extends SiteOrigin_Widget {

  function __construct() {
    $taxes = get_terms(array(
      'taxonomy' => 'inthenewscat'
    ));
    $taxes = empty( $taxes ) ? array() : (array) $taxes;
    $wp_tax_select = [];
    foreach ($taxes as $key => $value) {
      $wp_tax_select[$value->term_id] = $value->name;
    }

    //Call the parent constructor with the required arguments.
    parent::__construct(
        // The unique id for your widget.
        'tc-inthenews-widget',
        // The name of the widget for display purposes.
        __('TC In The News', 'topcoder2marketing'),

        // The $widget_options array, which is passed through to WP_Widget.
        // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
        array(
          'description' => __('TC In The News widget', 'topcoder2marketing'),
        ),

        //The $control_options array, which is passed through to WP_Widget
        array(
        ),

        //The $form_options array, which describes the form fields used to configure SiteOrigin widgets.
        array(
          'tax_select' => array(
            'type' => 'select',
            'label' => __( 'Choose a taxonomy of the “In The News”', 'topcoder2marketing' ),
            'default' => empty($wp_tax_select) ? '' : array_keys($wp_tax_select)[0],
            'options' => $wp_tax_select
          ),
          'btn_text' => array(
            'type' => 'text',
            'label' => __('View All Button Text', 'topcoder2marketing'),
            'default' => 'View All'
          ),
          'btn_url' => array(
            'type' => 'link',
            'label' => __('Button URL', 'topcoder2marketing'),
            'sanitize' => 'url',
          ),
          'limit' => array(
            'type' => 'number',
            'label' => __('Limit', 'topcoder2marketing'),
            'default' => '-1'
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

siteorigin_widget_register('tc-inthenews-widget', __FILE__, 'TC_InTheNews');
