<?php
/*
Widget Name: TC Quote
Description: TC Quote widget
Author: Topcoder
*/

class TC_Quote extends SiteOrigin_Widget {

  function __construct() {
    //Call the parent constructor with the required arguments.
    parent::__construct(
        // The unique id for your widget.
        'tc-quote-widget',
        // The name of the widget for display purposes.
        __('TC Quote', 'topcoder2marketing'),

        // The $widget_options array, which is passed through to WP_Widget.
        // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
        array(
          'description' => __('TC Quote widget', 'topcoder2marketing'),
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
            'default' => 'carousel',
            'options' => array(
              'carousel' => __( 'Carousel', 'topcoder2marketing' ),
              'full' => __( 'Full', 'topcoder2marketing' ),
            )
          ),
          'quote_image' => array(
            'type' => 'media',
            'label' => __( 'Quote image', 'topcoder2marketing' ),
            'choose' => __( 'Choose image', 'topcoder2marketing' ),
            'update' => __( 'Set image', 'topcoder2marketing' ),
            'library' => 'image',
            'fallback' => false,
            'state_handler' => array(
              'type[carousel]' => array('show'),
              'type[full]' => array('hide'),
            ),
          ),
          'a_repeater' => array(
            'type' => 'repeater',
            'label' => __( 'Quote items' , 'topcoder2marketing' ),
            'item_name'  => __( 'Quote item', 'topcoder2marketing' ),
            'state_handler' => array(
              'type[carousel]' => array('show'),
              'type[full]' => array('hide'),
            ),
            'fields' => array(
              'cname' => array(
                'type' => 'text',
                'label' => __( 'Company name', 'topcoder2marketing' )
              ),
              'quote' => array(
                'type' => 'tinymce',
                'label' => __( 'Quote', 'topcoder2marketing' )
              ),
              'pname' => array(
                'type' => 'text',
                'label' => __( 'Person name', 'topcoder2marketing' )
              ),
              'prole' => array(
                'type' => 'text',
                'label' => __( 'Person role', 'topcoder2marketing' )
              ),
              'pavatar' => array(
                'type' => 'media',
                'label' => __( 'Person avatar', 'topcoder2marketing' ),
                'choose' => __( 'Choose image', 'topcoder2marketing' ),
                'update' => __( 'Set image', 'topcoder2marketing' ),
                'library' => 'image',
                'fallback' => false
              )
            )
          ),
          'cname' => array(
            'type' => 'text',
            'label' => __( 'Company name', 'topcoder2marketing' ),
            'state_handler' => array(
              'type[carousel]' => array('hide'),
              'type[full]' => array('show'),
            ),
          ),
          'quote' => array(
            'type' => 'tinymce',
            'label' => __( 'Quote', 'topcoder2marketing' ),
            'state_handler' => array(
              'type[carousel]' => array('hide'),
              'type[full]' => array('show'),
            ),
          ),
          'pname' => array(
            'type' => 'text',
            'label' => __( 'Person name', 'topcoder2marketing' ),
            'state_handler' => array(
              'type[carousel]' => array('hide'),
              'type[full]' => array('show'),
            ),
          ),
          'prole' => array(
            'type' => 'text',
            'label' => __( 'Person role', 'topcoder2marketing' ),
            'state_handler' => array(
              'type[carousel]' => array('hide'),
              'type[full]' => array('show'),
            ),
          ),
          'pavatar' => array(
            'type' => 'media',
            'label' => __( 'Person avatar', 'topcoder2marketing' ),
            'choose' => __( 'Choose image', 'topcoder2marketing' ),
            'update' => __( 'Set image', 'topcoder2marketing' ),
            'library' => 'image',
            'fallback' => false,
            'state_handler' => array(
              'type[carousel]' => array('hide'),
              'type[full]' => array('show'),
            ),
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

siteorigin_widget_register('tc-quote-widget', __FILE__, 'TC_Quote');
