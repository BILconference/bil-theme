<?php

// Add Image Sizes
add_image_size( 'bil-full-width', 1920, 1050, true );


// Make the image size slugs, pretty for end users.

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        '600x150' => __('600px by 150px'),
        '300x100' => __('300px by 100px'),
        '1920x1050' => __('1920px by 1050px'),
    ) );
}

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );