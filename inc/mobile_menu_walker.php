<?php
/**
 * Topcoder 2 Marketing Theme Mobile Menu Walker
 *
 * @package Topcoder_2_Marketing
 */
 class TC_Mobile_Menu_Walker extends Walker_Nav_Menu {
   private $curItem;

  /**
  * Starts the list before the elements are added.
  *
  * Adds classes to the unordered list sub-menus.
  *
  * @param string $output Passed by reference. Used to append additional content.
  * @param int    $depth  Depth of menu item. Used for padding.
  * @param array  $args   An array of arguments. @see wp_nav_menu()
  */
  function start_lvl( &$output, $depth = 0, $args = array() ) {
     $output .= "\n";
  }

  /**
   * Ends the list of after the elements are added.
   *
   * The $args parameter holds additional values that may be used with the child
   * class methods. This method finishes the list at the end of output of the elements.
   *
   * @since 2.1.0
   * @abstract
   *
   * @param string $output Used to append additional content (passed by reference).
   * @param int    $depth  Depth of the item.
   * @param array  $args   An array of additional arguments.
   */
  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $output .= "\n";
  }

  /**
   * Start the element output.
   *
   * The $args parameter holds additional values that may be used with the child
   * class methods. Includes the element output also.
   *
   * @param string $output            Used to append additional content (passed by reference).
   * @param object $item              The data object.
   * @param int    $depth             Depth of the item.
   * @param array  $args              An array of additional arguments.
   * @param int    $current_object_id ID of the current item.
   */
 	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    $this->curItem = $item;
 		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

 		$class_names = $value = '';

 		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
    if( $depth === 0 ) {
      $classes[] = 'nav-menu-item';
    }
    if( $this->is_active($classes) ){
      $classes[] = 'active';
    }

 		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
 		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

 		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
 		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

 		$output .= $indent . '';

 		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
 		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
 		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
 		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    if( $args->walker->has_children ) {
      $attributes .= 'data-submenu="'. 'submenu-'. $item->ID .'"';
    }

 		$item_output = $args->before;
    
    if ( $depth==0 ) {
      $item_output .= '<a'. $class_names . $attributes .'>';
      $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      $item_output .= '</a>';
    }
    
 		$item_output .= $args->after;

 		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
 	}

  /**
  * Ends the element output, if needed.
  *
  * The $args parameter holds additional values that may be used with the child class methods.
  *
  * @param string $output Used to append additional content (passed by reference).
  * @param object $item The data object.
  * @param int    $depth  Depth of the item.
  * @param array  $args   An array of additional arguments.
  */
 	function end_el( &$output, $item, $depth = 0, $args = array() ) {
 		$output .= "\n";
 	}

  /**
   * Is current menu item active check
   * @param  {array}  $classes The item classes
   * @return boolean Result
   */
  function is_active($classes) {
    return (in_array('current-menu-item', $classes) ||
      in_array('current-menu-ancestor', $classes) ||
      in_array('current-menu-page', $classes) ||
      (in_array('current_page_parent', $classes) && !is_singular() && !is_search() && !is_post_type_archive()) ||
      (in_array('current_page_parent', $classes) && is_single()));
  }
}
