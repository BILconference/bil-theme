<?php

function cpt_archive_speaker($query) {
    if ($query->is_main_query() && $query->is_post_type_archive('speaker') && !is_admin())
        $query->set('posts_per_page', -1);
}
 
add_action('pre_get_posts', 'cpt_archive_speaker');


function cpt_archive_event($query) {
    if ($query->is_main_query() && $query->is_post_type_archive('event') && !is_admin())
        $query->set('posts_per_page', -1);
}
 
add_action('pre_get_posts', 'cpt_archive_event');