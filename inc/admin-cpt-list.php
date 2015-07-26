<?php

function bil_event_table_head( $defaults ) {
	$defaults['event_date']  	= 'Event Date (Start)';
	$defaults['venue'] 			= 'Venue';
	$defaults['author']			= 'Added By';
	return $defaults;
}

add_filter('manage_event_posts_columns', 'bil_event_table_head');



function bil_event_table_content( $column_name, $post_id ) {
	if ($column_name == 'event_date') {
		if (get_field('start_date')) { 
			$start_date = DateTime::createFromFormat('Ymd', get_field('start_date'));
			echo $start_date->format('F jS, Y');
		} else {
			echo '-';
		}
	}

	// if ($column_name == 'ticket_status') {
	// 	$status = get_post_meta( $post_id, '_bs_meta_event_ticket_status', true );
	// 	echo $status;
	// }

	// if ($column_name == 'venue') {
	// 	echo get_post_meta( $post_id, '_bs_meta_event_venue', true );
	// }

}

add_action( 'manage_event_posts_custom_column', 'bil_event_table_content', 10, 2 );