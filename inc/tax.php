<?php 

function speaker_group_taxonomy() {  
    register_taxonomy(  
        'group',  	//The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'speaker',	//post type name
        array(
			'hierarchical'      => true,
			'label'             => 'Speaker Groups',  //Display name
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array(
                'slug'          => 'group',		// This controls the base slug that will display before each term
                'with_front'    => false 	// Don't display the category base before
            )
        )  
    );  
}  
add_action( 'init', 'speaker_group_taxonomy');

function talk_subject_taxonomy() {  
    register_taxonomy(  
        'subject',    //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'talk',  //post type name
        array(
            'hierarchical'      => true,
            'label'             => 'Talk Subjects',  //Display name
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array(
                'slug'          => 'subject',   // This controls the base slug that will display before each term
                'with_front'    => false        // Don't display the category base before
            )
        )  
    );  
}  
add_action( 'init', 'talk_subject_taxonomy');