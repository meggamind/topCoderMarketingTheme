<?php
require_once(dirname(__FILE__).'/../_shared/icons.php');
require_once(dirname(__FILE__).'/../_shared/icon_sizes.php');
/*
Widget Name: TC Solution
Description: TC Solution widget
Author: Topcoder
*/

class TC_Solution extends SiteOrigin_Widget {

  function __construct() {
    //Call the parent constructor with the required arguments.
    parent::__construct(
        // The unique id for your widget.
        'tc-solution-widget',
        // The name of the widget for display purposes.
        __('TC Solution', 'topcoder2marketing'),

        // The $widget_options array, which is passed through to WP_Widget.
        // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
        array(
          'description' => __('TC Solution widget', 'topcoder2marketing'),
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
            'default' => 'small',
            'options' => array(
              'small' => __( 'Small', 'topcoder2marketing' ),
              'large' => __( 'Large', 'topcoder2marketing' ),
            )
          ),
          'has_shadow' => array(
            'type' => 'checkbox',
            'label' => __( 'Add box shadow?', 'widget-form-fields-text-domain' ),
            'default' => true,
          ),
          'is_card' => array(
            'type' => 'checkbox',
            'label' => __( 'Is card?', 'widget-form-fields-text-domain' ),
            'default' => false,
          ),
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
          'duration' => array(
            'type' => 'text',
            'label' => __( 'Duration', 'topcoder2marketing' ),
            'state_handler' => array(
              'type[large]' => array('show'),
              'type[small]' => array('hide'),
            ),
          ),
          'deliverables' => array(
            'type' => 'tinymce',
            'label' => __( 'Deliverables', 'topcoder2marketing' ),
            'state_handler' => array(
              'type[large]' => array('show'),
              'type[small]' => array('hide'),
            ),
          ),
          'pdf' => array(
            'type' => 'media',
            'label' => __( 'PDF File', 'topcoder2marketing' ),
            'choose' => __( 'Choose file', 'topcoder2marketing' ),
            'update' => __( 'Set file', 'topcoder2marketing' ),
            'library' => 'file',
            'fallback' => false,
            'state_handler' => array(
              'type[large]' => array('show'),
              'type[small]' => array('hide'),
            ),
          ),
          'youtube' => array(
            'type' => 'text',
            'label' => __( 'Youtube ID', 'topcoder2marketing' ),
            'state_handler' => array(
              'type[large]' => array('show'),
              'type[small]' => array('hide'),
            ),
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

siteorigin_widget_register('tc-solution-widget', __FILE__, 'TC_Solution');
