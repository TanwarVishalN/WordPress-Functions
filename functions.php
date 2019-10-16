<?php 
/*--------------------------------------------------------------------------
  ----------Remove Type Attribute from wp_localized_script Start------------
  --------------------------------------------------------------------------*/
  
add_action('wp_loaded', 'prefix_output_buffer_start');
function prefix_output_buffer_start() { 
    ob_start("prefix_output_callback"); 
}

add_action('shutdown', 'prefix_output_buffer_end');
function prefix_output_buffer_end() { 
    ob_end_flush(); 
}

function prefix_output_callback($buffer) {
    return preg_replace( "%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer );
}
/*--------------------------------------------------------------------------
  -----------Remove Type Attribute from wp_localized_script End-------------
  --------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------
  -----------Remove Type Attribute from wp_enqueue_script Start-------------
  --------------------------------------------------------------------------*/
  
add_filter('style_loader_tag', 'ckwebsiteDesign_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'ckwebsiteDesign_remove_type_attr', 10, 2);

function ckwebsiteDesign_remove_type_attr($tag, $handle) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}

/*--------------------------------------------------------------------------
  ------------Remove Type Attribute from wp_enqueue_script End--------------
  --------------------------------------------------------------------------*/

