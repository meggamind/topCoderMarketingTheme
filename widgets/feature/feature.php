<?php
require_once(dirname(__FILE__).'/../_shared/icons.php');
require_once(dirname(__FILE__).'/../_shared/icon_sizes.php');
/*
Widget Name: TC Feature
Description: TC Feature widget
Author: Topcoder
*/

class TC_Feature extends SiteOrigin_Widget {

  function __construct() {
    //Call the parent constructor with the required arguments.
    parent::__construct(
        // The unique id for your widget.
        'tc-feature-widget',
        // The name of the widget for display purposes.
        __('TC Feature', 'topcoder2marketing'),

        // The $widget_options array, which is passed through to WP_Widget.
        // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
        array(
          'description' => __('TC Feature widget', 'topcoder2marketing'),
        ),

        //The $control_options array, which is passed through to WP_Widget
        array(
        ),

        //The $form_options array, which describes the form fields used to configure SiteOrigin widgets.
        array(
          'title' => array(
            'type' => 'text',
            'label' => __( 'Title', 'topcoder2marketing' ),
          ),
          'description' => array(
            'type' => 'tinymce',
            'label' => __( 'Description', 'topcoder2marketing' ),
          ),
          'btn_text' => array(
            'type' => 'text',
            'label' => __('Button Text', 'topcoder2marketing'),
            'default' => 'Learn More',
          ),
          'btn_url' => array(
            'type' => 'link',
            'label' => __('Button URL', 'topcoder2marketing'),
          ),
          'youtube' => array(
            'type' => 'text',
            'label' => __( 'Youtube ID', 'topcoder2marketing' ),
          ),
          'thumbnail' => array(
            'type' => 'media',
            'label' => __( 'Thumbnail media', 'topcoder2marketing' ),
            'choose' => __( 'Choose image', 'topcoder2marketing' ),
            'update' => __( 'Set image', 'topcoder2marketing' ),
            'library' => 'image',
            'fallback' => false
          ),
          'type' => array(
            'type' => 'select',
            'label' => __( 'Choose a layout', 'topcoder2marketing' ),
            'state_emitter' => array(
              'callback' => 'select',
              'args' => array( 'type' )
            ),
            'default' => 'statistics',
            'options' => array(
              'statistics' => __( 'Statistics', 'topcoder2marketing' ),
              'carousel' => __( 'Carousel', 'topcoder2marketing' ),
            )
          ),
          'statistics' => array(
            'type' => 'repeater',
            'label' => __( 'Statistics items' , 'topcoder2marketing' ),
            'item_name'  => __( 'Statistic item', 'topcoder2marketing' ),
            'state_handler' => array(
              'type[statistics]' => array('show'),
              'type[carousel]' => array('hide'),
            ),
            'fields' => array(
              'icon' => array(
                'type' => 'select',
                'label' => __('Select an icon', 'topcoder2marketing'),
                'default' => 'none',
                'options' => TC_ICONS
              ),
              'icon_size' => array(
                'type' => 'select',
                'label' => __('Select size', 'topcoder2marketing'),
                'default' => 'ic-s',
                'options' => TC_ICONS_SIZES,
              ),
              'title' => array(
                'type' => 'text',
                'label' => __( 'Title', 'topcoder2marketing' )
              ),
              'content' => array(
                'type' => 'tinymce',
                'label' => __( 'Content', 'topcoder2marketing' )
              )
            )
          ),
          'carousel' => array(
            'type' => 'repeater',
            'label' => __( 'Carousel items' , 'topcoder2marketing' ),
            'item_name'  => __( 'Carousel item', 'topcoder2marketing' ),
            'state_handler' => array(
              'type[statistics]' => array('hide'),
              'type[carousel]' => array('show'),
            ),
            'fields' => array(
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

siteorigin_widget_register('tc-feature-widget', __FILE__, 'TC_Feature');
