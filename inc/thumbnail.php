<?php

// Add Image Sizes

add_image_size( '600x150', 600, 150, true );
add_image_size( '300x100', 300, 100, true );
add_image_size( '1920x1050', 1920, 1050, true );


// Make the image size slugs, pretty for end users.

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        '600x150' => __('600px by 150px'),
        '300x100' => __('300px by 100px'),
        '1920x1050' => __('1920px by 1050px'),
    ) );
}

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );