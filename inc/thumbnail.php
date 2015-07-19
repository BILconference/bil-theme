<?php

// Add Image Sizes

add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );



// Make the image size slugs, pretty for end users.

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bones-thumb-600' => __('600px by 150px'),
        'bones-thumb-300' => __('300px by 100px'),
    ) );
}

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );