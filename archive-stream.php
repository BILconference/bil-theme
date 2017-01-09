<?php get_header(); ?>

<?php 
	$page = get_posts(
				    array(
				        'name'      => 'global',
				        'post_type' => 'page'
				    ) );
	if ( $page )
	{
	    echo $page[0]->post_content;
	}

?>

<?php get_footer(); ?>