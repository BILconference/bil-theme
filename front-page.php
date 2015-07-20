<?php get_header(); ?>

	<?php

	// check if the repeater field has rows of data
	if( have_rows('modules') ):

	 	// loop through the rows of data
	    while ( have_rows('modules') ) : the_row();

	        // display a sub field value
	        $module = get_sub_field('module');
	        get_template_part( 'modules/', $module->post_name );

	    endwhile;

	else :

	    // no rows found

	endif;

	?>
<?php get_footer(); ?>