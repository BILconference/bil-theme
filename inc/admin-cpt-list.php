<?php

function bil_event_table_head( $defaults ) {
	$defaults['event_date']  		= 'Event Date (Start)';
	$defaults['general_location']	= 'General Location';
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