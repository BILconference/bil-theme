<?php 

function bil_fonts() {
	wp_enqueue_style('hind', 'https://fonts.googleapis.com/css?family=Hind:700,400,300');
	wp_enqueue_style('opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700,300');
}

add_action('wp_enqueue_scripts', 'bil_fonts');