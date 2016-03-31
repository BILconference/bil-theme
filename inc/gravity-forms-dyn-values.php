<?php

//************************************************************************
//
// Event Contact Email or Default to Site Admin Email (info@)
//
//************************************************************************

function gfdv_event_email($value) {
	global $post;

	if (get_field('contact_email')) {
		return get_field('contact_email', $post->ID);
	} else {
		return get_option('admin_email');
	}
}

add_filter('gform_field_value_event_email', 'gfdv_event_email');



//************************************************************************
//
// Event Name from the_title() so we know what event
//
//************************************************************************

function gfdv_event_name($value) {
	global $post;

	return $post->post_title;
}

add_filter('gform_field_value_event_name', 'gfdv_event_name');