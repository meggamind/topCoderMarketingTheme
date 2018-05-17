<?php
require_once(dirname(__FILE__).'/../_shared/icons.php');
require_once(dirname(__FILE__).'/../_shared/icon_sizes.php');
/*
Widget Name: TC Content Box
Description: TC Content Box widget
Author: Topcoder
*/

class TC_ContentBox extends SiteOrigin_Widget {

  function __construct() {
    //Call the parent constructor with the required arguments.
    parent::__construct(
        // The unique id for your widget.
        'tc-content-widget',
        // The name of the widget for display purposes.
        __('TC Content Box', 'topcoder2marketing'),

        // The $widget_options array, which is passed through to WP_Widget.
        // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
        array(
          'description' => __('TC Content Box widget', 'topcoder2marketing'),
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
            'default' => 'content-box-full-image',
            'options' => array(
              'content-box-full-image' => __( 'Full Width - Wide Image', 'topcoder2marketing' ),
              'content-box-half-image' => __( 'Full Width - Half Image', 'topcoder2marketing' ),
              '6-column' => __( '6 column', 'topcoder2marketing' ),
              '4-column'  => __( '4 column', 'topcoder2marketing' ),
              'content-icon'  => __( 'Content with/without Icon', 'topcoder2marketing' ),
            )
          ),
          'has_shadow' => array(
            'type' => 'checkbox',
            'label' => __( 'Add box shadow?', 'widget-form-fields-text-domain' ),
            'default' => true,
            'state_handler' => array(
              'type[content-box-full-image]' => array('show'),
              'type[content-box-half-image]' => array('show'),
              'type[6-column]' => array('show'),
              'type[4-column]' => array('show'),
              'type[content-icon]' => array('hide'),
            ),
          ),
          'rounded' => array(
            'type' => 'checkbox',
            'label' => __( 'Rounded?', 'widget-form-fields-text-domain' ),
            'default' => true,
            'state_handler' => array(
              'type[content-box-full-image]' => array('show'),
              'type[content-box-half-image]' => array('show'),
              'type[6-column]' => array('show'),
              'type[4-column]' => array('show'),
              'type[content-icon]' => array('hide'),
            ),
          ),
          'color_bar' => array(
            'type' => 'checkbox',
            'label' => __( 'Add solid color bar?', 'widget-form-fields-text-domain' ),
            'default' => true,
            'state_handler' => array(
              'type[content-box-full-image]' => array('hide'),
              'type[content-box-half-image]' => array('hide'),
              'type[6-column]' => array('show'),
              'type[4-column]' => array('show'),
              'type[content-icon]' => array('hide'),
            ),
          ),
          'image' => array(
            'type' => 'media',
            'label' => __( 'Content Box image', 'topcoder2marketing' ),
            'choose' => __( 'Choose image', 'topcoder2marketing' ),
            'update' => __( 'Set image', 'topcoder2marketing' ),
            'library' => 'image',
            'fallback' => false,
            'state_handler' => array(
              'type[content-box-full-image]' => array('show'),
              'type[content-box-half-image]' => array('show'),
              'type[6-column]' => array('show'),
              'type[4-column]' => array('show'),
              'type[content-icon]' => array('hide'),
            ),
          ),
          'image_mask' => array(
            'type' => 'checkbox',
            'label' => __( 'Add image mask?', 'widget-form-fields-text-domain' ),
            'default' => true,
            'state_handler' => array(
              'type[content-box-full-image]' => array('show'),
              'type[content-box-half-image]' => array('show'),
              'type[6-column]' => array('show'),
              'type[4-column]' => array('show'),
              'type[content-icon]' => array('hide'),
            ),
          ),
          'mask_style' => array(
            'type' => 'select',
            'label' => __( 'Choose a mask style', 'topcoder2marketing' ),
            'default' => 'style-1',
            'options' => array(
              'style-1' => __( 'Style 1', 'topcoder2marketing' ),
              'style-2' => __( 'Style 2', 'topcoder2marketing' ),
              'style-3' => __( 'Style 3', 'topcoder2marketing' ),
              'style-4' => __( 'Style 4', 'topcoder2marketing' ),
              'style-5' => __( 'Style 5', 'topcoder2marketing' ),
              'style-6' => __( 'Style 6', 'topcoder2marketing' ),
              'style-7' => __( 'Style 7', 'topcoder2marketing' ),
              'style-8' => __( 'Style 8', 'topcoder2marketing' ),
            ),
            'state_handler' => array(
              'type[content-box-full-image]' => array('show'),
              'type[content-box-half-image]' => array('show'),
              'type[6-column]' => array('show'),
              'type[4-column]' => array('show'),
              'type[content-icon]' => array('hide'),
            ),
          ),
          'icon' => array(
            'type' => 'select',
            'label' => __('Select an icon', 'topcoder2marketing'),
            'state_handler' => array(
              'type[content-box-full-image]' => array('hide'),
              'type[content-box-half-image]' => array('hide'),
              'type[6-column]' => array('hide'),
              'type[4-column]' => array('hide'),
              'type[content-icon]' => array('show'),
            ),
            'default' => 'none',
            'options' => TC_ICONS
          ),
          'icon_size' => array(
            'type' => 'select',
            'label' => __('Select size', 'topcoder2marketing'),
            'state_handler' => array(
              'type[content-box-full-image]' => array('hide'),
              'type[content-box-half-image]' => array('hide'),
              'type[6-column]' => array('hide'),
              'type[4-column]' => array('hide'),
              'type[content-icon]' => array('show'),
            ),
            'default' => 'ic-s',
            'options' => TC_ICONS_SIZES,
          ),
          'step_flow' => array(
            'type' => 'checkbox',
            'label' => __( 'Is step flow?', 'widget-form-fields-text-domain' ),
            'default' => false,
            'state_handler' => array(
              'type[content-box-full-image]' => array('hide'),
              'type[content-box-half-image]' => array('hide'),
              'type[6-column]' => array('hide'),
              'type[4-column]' => array('hide'),
              'type[content-icon]' => array('show'),
            ),
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
            'default' => 'Join Topcoder',
          ),
          'btn_url' => array(
            'type' => 'link',
            'label' => __('Button URL', 'topcoder2marketing'),
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

siteorigin_widget_register('tc-content-widget', __FILE__, 'TC_ContentBox');
