<?php

define('JDQT_CPT_NAME', 'Quotes');
define('JDQT_CPT_SINGLE', 'Quote');
define('JDQT_CPT_TYPE', 'quote');

function jdqt_register_cpt() {
  register_post_type(JDQT_CPT_TYPE, array(
    'label' => __(JDQT_CPT_NAME),  
    'singular_label' => __(JDQT_CPT_SINGLE),  
    'public' => true,  
    'show_ui' => true,  
    'capability_type' => 'post',  
    'hierarchical' => false,  
    'rewrite' => true,  
    'supports' => array('title', 'editor')
  ));
}

add_action('init', 'jdqt_register_cpt');

