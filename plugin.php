<?php
/* 
Plugin Name: JDesrosiers Quotes
Plugin URI: 
Description: A plugin to manage Quotes using custom post types
Author: Julien Desrosiers
Version: 1.0 
Author URI: http://www.juliendesrosiers.com
*/

define('JDQT_VERSION', '1.0');
define('JDQT_NAME', 'JDesrosiers Quotes');
define('JDQT_PATH', dirname(__FILE__));
define('JDQT_URL', WP_PLUGIN_URL . '/' . plugin_basename(JDQT_PATH) . '/');

// Functions:
// -----------------------------------------------------------------------

function jdqt_get_random_quote() {
  global $post;
  $quote = '<div class="jdqt-quote">';
  $query = "orderby=rand&posts_per_page=1&post_type=" . JDQT_CPT_TYPE;
  // Support for JDesrosiers Multilingual plugin:
  if (function_exists('jdml_get_current_language_slug')) {
    $query .= '&language='.jdml_get_current_language_slug();
  }
  // END JDesrosiers Multilingual
  $the_query = new WP_Query( $query );
  if ($the_query->have_posts()) : $the_query->the_post();  
    $quote .= '<blockquote class="">' . $post->post_content 
      . '<span>&mdash; ' . $post->post_title . '</span></blockquote>';
  endif; 
  wp_reset_postdata();  
  $quote .= '</div>';
  
  return $quote; 
}

// the template tag equivalent:
function jdqt_random_quote($quote_slug = '') {
  print jdqt_get_random_quote($quote_slug);
}

// Includes:
// -----------------------------------------------------------------------
require_once(JDQT_PATH . '/quote-type.php');

// Actions:
// -----------------------------------------------------------------------

// Shortcodes:
// -----------------------------------------------------------------------

