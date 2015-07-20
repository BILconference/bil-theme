<?php 

function group_taxonomy() {  
    register_taxonomy(  
        'group',  	//The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'speaker',	//post type name
        array(
			'hierarchical' => true,
			'label' => 'Speaker Groups',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'group',		// This controls the base slug that will display before each term
                'with_front' => false 	// Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'group_taxonomy');