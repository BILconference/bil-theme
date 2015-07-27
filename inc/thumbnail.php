<?php

// Add Image Sizes

add_image_size( '600x600', 600, 600, true);
add_image_size( '600x150', 600, 150, true );
add_image_size( '300x100', 300, 100, true );
add_image_size( '300x300', 300, 300, true );
add_image_size( '200x200', 200, 200, true );
add_image_size( '1000x400', 1000, 400, false );
add_image_size( 'full-width', 1920, 1050, true );



// Make the image size slugs, pretty for end users.

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        '600x150' => __('600px by 150px'),
        '300x100' => __('300px by 100px'),
        'full-width' => __('1920px by 1050pxxx')
    ) );
}

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );