<?php

//************************************************************************
//
// These are for modifying the queries on the archive pages. These have
// to be done before the page template loads, hence why they are being
// called in from functions.php
//
// Resource: https://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts
//
//************************************************************************



// Speaker Archive

function cpt_archive_speaker($query) {
    if ($query->is_main_query() && $query->is_post_type_archive('speaker') && !is_admin())
        $taxquery = array(
			array(
				'taxonomy' => 'group',
				'field' => 'id',
				'terms' => 4
			)
		);

		$query->set('tax_query', $taxquery );
		$query->set('posts_per_page', -1);
}
 
add_action('pre_get_posts', 'cpt_archive_speaker');



// Event Archive

function cpt_archive_event($query) {
    if ($query->is_main_query() && $query->is_post_type_archive('event') && !is_admin())
        $query->set('posts_per_page', -1);
}
 
add_action('pre_get_posts', 'cpt_archive_event');



// Talk Archive

function cpt_archive_talk($query) {
    if ($query->is_main_query() && $query->is_post_type_archive('talk') && !is_admin())
        $query->set('posts_per_page', -1);
}
 
add_action('pre_get_posts', 'cpt_archive_talk');