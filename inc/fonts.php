<?php 

function bones_fonts() {
  wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
}

function bil_fonts() {

}

add_action('wp_enqueue_scripts', 'bones_fonts');
add_action('wp_enqueue_scripts', 'bil_fonts');