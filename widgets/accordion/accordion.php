<?php
/*
Widget Name: TC Accordion
Description: TC Accordion widget
Author: Topcoder
*/

class TC_Accordion extends SiteOrigin_Widget {

  function __construct() {
    //Call the parent constructor with the required arguments.
    parent::__construct(
        // The unique id for your widget.
        'tc-accordion-widget',
        // The name of the widget for display purposes.
        __('TC Accordion', 'topcoder2marketing'),

        // The $widget_options array, which is passed through to WP_Widget.
        // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
        array(
          'description' => __('TC Accordion widget', 'topcoder2marketing'),
        ),

        //The $control_options array, which is passed through to WP_Widget
        array(
        ),

        //The $form_options array, which describes the form fields used to configure SiteOrigin widgets.
        array(
          'a_repeater' => array(
            'type' => 'repeater',
            'label' => __( 'Accordion items' , 'topcoder2marketing' ),
            'item_name'  => __( 'Accordion item', 'topcoder2marketing' ),
            'fields' => array(
              'title' => array(
                'type' => 'text',
                'label' => __( 'Title', 'topcoder2marketing' )
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

siteorigin_widget_register('tc-accordion-widget', __FILE__, 'TC_Accordion');
