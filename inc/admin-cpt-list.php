<?php

function bil_event_table_head( $defaults ) {
    $defaults['event_date']  	= 'Event Date';
    $defaults['venue'] 			= 'Venue';
    $defaults['author']			= 'Added By';
    return $defaults;
}

add_filter('manage_event_posts_columns', 'bil_event_table_head');