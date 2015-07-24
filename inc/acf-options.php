<?php 

if( function_exists('acf_add_options_sub_page') ) {

    acf_add_options_sub_page(array(
        'title' => 'Options',
        'menu' => 'Press Options',
        'parent' => 'edit.php?post_type=press',
        'slug' => 'press_options',
        'capability' => 'manage_options'
    ));

}