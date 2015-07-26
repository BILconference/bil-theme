<?php

//************************************************************************
//
// Event CPT Listing
//
//************************************************************************

function bil_event_table_head( $defaults ) {
	$defaults = array(); // to clear out the original order

	$defaults['title'] 				= 'Event Name';
	$defaults['event_date']  		= 'Event Date (Start)';
	$defaults['general_location']	= 'General Location';
	$defaults['author'] 			= 'Added By';
	$defaults['date']				= 'Added On';

	return $defaults;
}

add_filter('manage_event_posts_columns', 'bil_event_table_head');



function bil_event_table_content( $column_name, $post_id ) {

	if ($column_name == 'event_date') {
		if (get_field('start_date', $post_id)) {
			$ugly_date = get_field('start_date', $post_id);
			$start_date = DateTime::createFromFormat('Ymd', $ugly_date);
			echo $start_date->format('F jS, Y');
		} else {
			echo '-';
		}
	}

	if ($column_name == 'general_location') {
		if (get_field('general_location', $post_id)) {
			echo get_field('general_location', $post_id);
		} else {
			echo '-';
		}
	}

}

add_action( 'manage_event_posts_custom_column', 'bil_event_table_content', 10, 2 );



//************************************************************************
//
// Talk CPT Listing
//
//************************************************************************

function bil_talk_table_head( $defaults ) {
	$defaults = array(); // to clear out the original order

	$defaults['title'] 				= 'Talk Title';
	$defaults['speaker']			= 'Speaker';
	$defaults['event']				= 'Event';
	$defaults['author'] 			= 'Added By';
	$defaults['date']				= 'Added On';

	return $defaults;
}

add_filter('manage_talk_posts_columns', 'bil_talk_table_head');



function bil_talk_table_content( $column_name, $post_id ) {

	if ($column_name == 'speaker') {
		if (get_field('speaker', $post_id)) {
			$speaker = get_field('speaker', $post_id);
			echo $speaker->post_title;
		} else {
			echo '-';
		}
	}

	if ($column_name == 'event') {
		if (get_field('event', $post_id)) {
			$event = get_field('event', $post_id);
			echo $speaker->post_title;
		} else {
			echo '-';
		}

	}
}

add_action( 'manage_talk_posts_custom_column', 'bil_talk_table_content', 10, 2 );